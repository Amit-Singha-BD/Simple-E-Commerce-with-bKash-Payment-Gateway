<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefundRequest;
use App\Models\Order;
use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class BkashController extends Controller {
    private string $base_url;

    public function __construct(){
        // bKash API Base URL
        // Sandbox: https://tokenized.sandbox.bka.sh/v1.2.0-beta
        // Live: https://tokenized.pay.bka.sh/v1.2.0-beta
        $this->base_url = ''; 
    }

    public function authHeaders(): array{
        return [
            'Content-Type: application/json',
            'Authorization:' . $this->grant(),
            'X-APP-Key: ', // Your bKash App Key provided from bKash Merchant Panel
        ];
    }

    private function curlWithBody(string $url, array $header, string $method, string $body_data_json): string{
        $curl = curl_init($this->base_url . $url);

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $body_data_json,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response ?: '';
    }

    private function grant(): string{

        $header = [
            'Content-Type:application/json',
            'username:' . '', // bKash API username (provided by bKash)
            'password:' . '', // bKash API password (provided by bKash)
        ];

        $body_data = [
            'app_key' => '', // bKash App Key (Merchant credential)
            'app_secret' => '', // bKash App Secret (Merchant credential)
        ];

        $body_data_json = json_encode($body_data);
        $response = $this->curlWithBody('/tokenized/checkout/token/grant', $header, 'POST', $body_data_json);
        return json_decode($response)->id_token ?? '';
    }

    public function createPayment(){
        $validData = Session::get('validData');
        $amount = $validData['total_price'];
        if (!$amount || $amount < 1) {
            return redirect()->back();
        }

        $header = $this->authHeaders();
        $website_url = URL::to('/');

        $body_data = [
            'mode' => '0011',
            'payerReference' => '1122',
            'callbackURL' => $website_url . '/bkash/callback',
            'amount' => $amount,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => 'Inv' . Str::random(8),
        ];

        $body_data_json = json_encode($body_data);
        $response = $this->curlWithBody('/tokenized/checkout/create', $header, 'POST', $body_data_json);

        return redirect(json_decode($response)->bkashURL);
    }

    public function executePayment(string $paymentID): string{
        $header = $this->authHeaders();
        $body_data = ['paymentID' => $paymentID];
        return $this->curlWithBody('/tokenized/checkout/execute', $header, 'POST', json_encode($body_data));
    }

    public function queryPayment(string $paymentID): string{
        $header = $this->authHeaders();
        $body_data = ['paymentID' => $paymentID];
        $response = $this->curlWithBody('/tokenized/checkout/payment/status', $header, 'POST', json_encode($body_data));

        $res_array = json_decode($response, true);
        if(isset($res_array['trxID'])){
            // Database insert logic
        }

        return $response;
    }

    public function callback(Request $request){
        $allRequest = $request->all();
        $status = $allRequest['status'] ?? '';

        if($status === 'failure'){
            return redirect()->route('payment.failed')->with(['response' => 'Payment Failed !!']);
        } elseif($status === 'cancel'){
            return redirect()->route('payment.failed')->with(['response' => 'Payment Cancelled !!']);
        }

        $paymentID = $allRequest['paymentID'] ?? '';
        $response = $this->executePayment($paymentID);
        $res_array = json_decode($response, true);

        if(isset($res_array['statusCode']) && $res_array['statusCode'] != '0000'){
            return redirect()->route('payment.failed')->with(['response' => $res_array['statusMessage']]);
        }

        if(Session::has('validData') && (isset($res_array['trxID']) || isset($res_array['message']))){
            $orderData = Session::get('validData');

            $orderData['payment_id'] = $paymentID;
            $orderData['trx_id']     = $res_array['trxID'] ?? null;

            Order::create($orderData);
            Session::forget('validData');
        }

        if(isset($res_array['message'])){
            sleep(1);
            $query = $this->queryPayment($paymentID);
            return redirect()->route('payment.success')->with(['response' => $query]);
        }

        return redirect()->route('payment.success')->with(['response' => $res_array['trxID'] ?? '']);
    }

    public function getRefund($orderId) {
        $orderData = Order::where('id', $orderId)->first();
        return view('Bkash.Pages.Payment-Refund', compact('orderData'));
    }

    public function refundPayment(RefundRequest $request, $orderId) {
        $validate = $request->validated();

        $header = $this->authHeaders();

        $orderData = Order::find($orderId);

        if (!$orderData) {
            return redirect()->back()->with('error', 'অর্ডারটি খুঁজে পাওয়া যায়নি!');
        }

        $refundAmount = $orderData->total_price - ($orderData->division === 'Dhaka' ? 60 : 120);

        $body_data = [
            'paymentID' => $orderData->payment_id,
            'amount'    => $refundAmount,
            'trxID'     => $orderData->trx_id,
            'sku'       => 'sku',
            'reason'    => $validate['refund_reason'],
        ];

        try {
            $response = $this->curlWithBody('/tokenized/checkout/payment/refund', $header, 'POST', json_encode($body_data));
            $res_array = json_decode($response, true);

            if (isset($res_array['refundTrxID'])) {
                Refund::create([
                    'order_id'      => $orderData->id,
                    'payment_id'    => $orderData->payment_id,
                    'trx_id'        => $res_array['refundTrxID'],
                    'refund_amount' => $refundAmount,
                    'refund_reason' => $validate['refund_reason'],
                ]);

                $orderData->status = 'refunded';
                $orderData->save();

                return redirect()->route('refund.success')
                                ->with('success', "রিফান্ড সফল হয়েছে। ট্রানজেকশন আইডি: {$res_array['refundTrxID']}");
            }

            return redirect()->back()
                            ->with('error', $res_array['statusMessage'] ?? 'রিফান্ড ব্যর্থ হয়েছে!');

        } catch (\Exception $e) {
            // Exception Handling
            return redirect()->back()
                            ->with('error', 'রিফান্ডের সময় সমস্যা হয়েছে: ' . $e->getMessage());
        }
    }

    public function paymentSuccess(){
        return view('Bkash.Pages.Payment-Success');
    }

    public function paymentFailed(){
        return view('Bkash.Pages.Payment-Failed');
    }

    public function paymentRefund(){
        return view('Bkash.Pages.Payment-Refund');
    }

    public function refundSuccess(){
        return view('Bkash.Pages.Refund-Success');
    }
}
