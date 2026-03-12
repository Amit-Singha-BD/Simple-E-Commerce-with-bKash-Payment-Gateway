<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'product_name'   => 'required|string|max:255',
            'total_price'    => 'required|numeric|min:1',
            'customer_name'  => 'required|string|min:3|max:255',
            'phone'          => 'required|regex:/^01[3-9][0-9]{8}$/',
            'quantity'       => 'required|integer|min:1|max:100',
            'status'         => 'sometimes|in:pending,delivered',
            'division'       => 'required|string|max:100',
            'district'       => 'required|string|max:100',
            'upazila'        => 'required|string|max:100',
            'payment_id'     => 'nullable|string',
            'trx_id'         => 'nullable|string',
        ];
    }

    public function messages() {
        return [
            'product_name.required'  => 'প্রোডাক্টের নাম প্রদান করুন।',
            'product_name.string'    => 'প্রোডাক্টের নাম সঠিক ফরম্যাটে দিন।',
            'product_name.max'       => 'প্রোডাক্টের নাম ২৫৫ অক্ষরের বেশি হতে পারবে না।',

            'total_price.required'   => 'মোট মূল্য প্রদান করুন।',
            'total_price.numeric'    => 'মোট মূল্য অবশ্যই নাম্বার হতে হবে।',
            'total_price.min'        => 'মোট মূল্য কমপক্ষে ১ হতে হবে।',

            'customer_name.required' => 'ক্রেতার নাম প্রদান করুন।',
            'customer_name.string'   => 'ক্রেতার নাম সঠিক ফরম্যাটে দিন।',
            'customer_name.min'      => 'ক্রেতার নাম ন্যূনতম ৩ অক্ষরের হতে হবে।',
            'customer_name.max'      => 'ক্রেতার নাম ২৫৫ অক্ষরের বেশি হতে পারবে না।',

            'phone.required'         => 'মোবাইল নম্বর প্রদান করুন।',
            'phone.regex'            => 'সঠিক বিকাশ/বাংলাদেশি মোবাইল নম্বর প্রদান করুন।',

            'quantity.required'      => 'পরিমাণ প্রদান করুন।',
            'quantity.integer'       => 'পরিমাণ অবশ্যই সংখ্যা হতে হবে।',
            'quantity.min'           => 'পরিমাণ কমপক্ষে ১ হতে হবে।',
            'quantity.max'           => 'পরিমাণ সর্বোচ্চ ১০০ হতে পারে।',

            'status.in'              => 'স্ট্যাটাস অবশ্যই pending অথবা delivered হতে হবে।',

            'division.required'      => 'বিভাগের নাম প্রদান করুন।',
            'division.string'        => 'বিভাগের নাম সঠিক ফরম্যাটে দিন।',
            'division.max'           => 'বিভাগের নাম ১০০ অক্ষরের বেশি হতে পারবে না।',

            'district.required'      => 'জেলার নাম প্রদান করুন।',
            'district.string'        => 'জেলার নাম সঠিক ফরম্যাটে দিন।',
            'district.max'           => 'জেলার নাম ১০০ অক্ষরের বেশি হতে পারবে না।',

            'upazila.required'       => 'উপজেলার নাম প্রদান করুন।',
            'upazila.string'         => 'উপজেলার নাম সঠিক ফরম্যাটে দিন।',
            'upazila.max'            => 'উপজেলার নাম ১০০ অক্ষরের বেশি হতে পারবে না।',

            'payment_id.string'      => 'পেমেন্ট আইডি সঠিক ফরম্যাটে দিন।',
            'trx_id.string'          => 'লেনদেন নম্বর সঠিক ফরম্যাটে দিন।',
        ];
    }
}
