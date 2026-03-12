<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest {

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'name'           => 'required|string|max:255',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'category'       => 'required|string|max:100',
            'price'          => 'required|numeric|min:0',
            'previous_price' => 'nullable|numeric|min:0',
            'badge'          => 'nullable|string|max:50',
            'stock_status'   => 'required|string|max:50',
            'photos_path'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(){
        return [
            'name.required'           => 'পণ্যের নাম লেখা বাধ্যতামূলক।',
            'name.string'             => 'পণ্যের নাম অবশ্যই সঠিক বর্ণমালায় হতে হবে।',
            'name.max'                => 'পণ্যের নাম ২৫৫ অক্ষরের বেশি হওয়া যাবে না।',

            'title.required'          => 'পণ্যের একটি শিরোনাম দেওয়া আবশ্যক।',
            'title.string'            => 'শিরোনামটি সঠিক ফরম্যাটে লিখুন।',
            'title.max'               => 'শিরোনাম ২৫৫ অক্ষরের বেশি হওয়া যাবে না।',

            'description.required'    => 'পণ্যের বিস্তারিত বিবরণ প্রদান করুন।',

            'category.required'       => 'অনুগ্রহ করে পণ্যের ক্যাটাগরি নির্বাচন করুন।',
            'category.max'            => 'ক্যাটাগরির নাম ১০০ অক্ষরের বেশি হওয়া যাবে না।',

            'price.required'          => 'পণ্যের বর্তমান মূল্য অবশ্যই দিতে হবে।',
            'price.numeric'           => 'মূল্য অবশ্যই সংখ্যায় (Number) হতে হবে।',
            'price.min'               => 'পণ্যের মূল্য ০ বা তার বেশি হতে হবে।',

            'previous_price.numeric'  => 'পূর্বের মূল্য অবশ্যই সংখ্যায় হতে হবে।',
            'previous_price.min'      => 'পূর্বের মূল্য ০ বা তার বেশি হতে হবে।',

            'badge.max'               => 'ব্যাজ টেক্সট ৫০ অক্ষরের বেশি হওয়া যাবে না।',

            'stock_status.required'   => 'স্টকের অবস্থা (In Stock/Out of Stock) নির্বাচন করুন।',

            'photos_path.image'       => 'আপলোড করা ফাইলটি অবশ্যই একটি ছবি হতে হবে।',
            'photos_path.mimes'       => 'ছবিটি শুধুমাত্র jpeg, png, jpg অথবা webp ফরম্যাটে হতে হবে।',
            'photos_path.max'         => 'ছবির সাইজ ২ মেগাবাইটের (2048 KB) বেশি হওয়া যাবে না।',
        ];
    }
}
