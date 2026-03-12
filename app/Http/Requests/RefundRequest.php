<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefundRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'order_id'      => 'required|integer|exists:orders,id',
            'payment_id'    => 'nullable|string|max:255',
            'trx_id'        => 'nullable|string|max:255',
            'refund_amount' => 'required|numeric|min:1',
            'refund_reason' => 'required|string|min:5|max:500',
        ];
    }

    public function messages()
    {
        return [
            'order_id.required'      => 'অর্ডার আইডি প্রদান করুন।',
            'order_id.integer'       => 'অর্ডার আইডি অবশ্যই সংখ্যা হতে হবে।',
            'order_id.exists'        => 'নির্দিষ্ট অর্ডার পাওয়া যায়নি।',

            'payment_id.string'      => 'পেমেন্ট আইডি সঠিক ফরম্যাটে দিন।',
            'payment_id.max'         => 'পেমেন্ট আইডি সর্বোচ্চ ২৫৫ অক্ষরের হতে পারে।',

            'trx_id.string'          => 'লেনদেন নম্বর সঠিক ফরম্যাটে দিন।',
            'trx_id.max'             => 'লেনদেন নম্বর সর্বোচ্চ ২৫৫ অক্ষরের হতে পারে।',

            'refund_amount.required' => 'রিফান্ডের পরিমাণ প্রদান করুন।',
            'refund_amount.numeric'  => 'রিফান্ডের পরিমাণ অবশ্যই সংখ্যা হতে হবে।',
            'refund_amount.min'      => 'রিফান্ডের পরিমাণ কমপক্ষে ১ হতে হবে।',

            'refund_reason.required' => 'রিফান্ডের কারণ লিখুন।',
            'refund_reason.string'   => 'রিফান্ডের কারণ সঠিক ফরম্যাটে দিন।',
            'refund_reason.min'      => 'রিফান্ডের কারণ ন্যূনতম ৫ অক্ষরের হতে হবে।',
            'refund_reason.max'      => 'রিফান্ডের কারণ সর্বোচ্চ ৫০০ অক্ষরের হতে পারে।',
        ];
    }
}
