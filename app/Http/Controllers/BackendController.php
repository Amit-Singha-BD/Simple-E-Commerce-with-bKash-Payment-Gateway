<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackendController extends Controller {

    public function dashboard(){
        $productCount = Product::count();
        $pendingOrderCount   = Order::where('status', 'pending')->count();
        $deliveredOrderCount = Order::where('status', 'delivered')->count();
        $refundCount         = Refund::count();

        $latestOrders = Order::latest()->take(5)->get();

        return view('Backend.Pages.Dashboard', compact('productCount', 'pendingOrderCount', 'deliveredOrderCount', 'refundCount', 'latestOrders'));
    }
    
    public function productList(){
        $products = Product::paginate(10);
        return view('Backend.Pages.Product-List', compact('products'));
    }

    public function productView($id){
        $product = Product::findOrFail($id);
        return view('Backend.Pages.Product-View', compact('product'));
    }

    public function productEdit($id){
        $product = Product::findOrFail($id);
        return view('Backend.Pages.Product-Edit', compact('product'));
    }

    public function productUpdate(ProductUpdateRequest $request, $id){
        $validatedData = $request->validated();
        $product = Product::findOrFail($id);

        if($request->hasFile('photos_path')){
            if ($product->photos_path && Storage::disk('public')->exists('products/' . $product->photos_path)) {
                Storage::disk('public')->delete('products/' . $product->photos_path);
            }
            $image = $request->file('photos_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image = $image->storeAs('products', $imageName, 'public');
            $validatedData['photos_path'] = $imageName;
        }
        $product->update($validatedData);

        return redirect()->route('product.list')->with('success', 'পণ্য সফলভাবে আপডেট হয়েছে');
    }

    public function productDelete($id){
        $product = Product::findOrFail($id);

        if($product->photos_path && Storage::disk('public')->exists('products/' . $product->photos_path)){
            Storage::disk('public')->delete('products/' . $product->photos_path);
        }

        $product->delete();

        return redirect()->back()->with('success', 'প্রোডাক্ট সফলভাবে মুছে ফেলা হয়েছে।');
    }
    
    public function orderList(){
        $orders = Order::where('status', 'pending')->paginate(10);
        return view('Backend.Pages.Orders-List', compact('orders'));
    }

    public function orderView($orderId){
        $order = Order::where('id', $orderId)->first();
        return view('Backend.Pages.Order-View', compact('order'));
    }

    public function createProduct(){
        return view('Backend.Pages.Create-Product');
    }

    public function createProductSubmit(ProductRequest $request){
        $validate = $request->validated();

        if($request->hasFile('photos_path')){
            $image = $request->file('photos_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image = $image->storeAs('products', $imageName, 'public');
            $validatedData['photos_path'] = $imageName;
        }

        if(Product::create($validate)){
            return redirect()->back()->with('success', 'প্রোডাক্ট সফলভাবে যুক্ত করা হয়েছে।');
        }
        return redirect()->back()->with('error', 'দুঃখিত! প্রোডাক্ট যুক্ত করা সম্ভব হয়নি। আবার চেষ্টা করুন।');
    }

    public function deliveryList(){
        $orders = Order::where('status', 'delivered')->paginate(10);
        return view('Backend.Pages.Delivery-List', compact('orders'));
    }

    public function updateDeliveryStatus($id){
        $order = Order::findOrFail($id);

        $order->status = 'delivered';
        $order->save();

        return redirect()->route('order.list')->with('success', 'অর্ডার সফলভাবে ডেলিভারি হিসেবে আপডেট হয়েছে।');
    }

    public function refundList(){
        $refunds = Refund::with('order')->latest()->paginate(10);
        return view('Backend.Pages.Refund-List', compact('refunds'));
    }

    public function refundView($id){
        $refund = Refund::with('order')->findOrFail($id);

        return view('Backend.Pages.Refund-View', compact('refund'));
    }
}
