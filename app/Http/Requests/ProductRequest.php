<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name'           => 'required|string|max:250',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'category'       => 'required|in:electronics,fashion,home,gadgets',
            'price'          => 'required|numeric|min:0',
            'previous_price' => 'nullable|numeric|min:0',
            'badge'          => 'nullable|string|max:50',
            'stock_status'   => 'required|in:in_stock,out_of_stock,pre_order',
            'photos_path'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages() {
        return [
            'name.required'        => 'প্রোডাক্টের নাম প্রদান করা বাধ্যতামূলক।',
            'name.max'             => 'প্রোডাক্টের নাম ২৫০ অক্ষরের বেশি হতে পারবে না।',

            'title.required'       => 'প্রোডাক্টের শিরোনাম প্রদান করা বাধ্যতামূলক।',
            'title.max'            => 'শিরোনাম ২৫৫ অক্ষরের বেশি হতে পারবে না।',

            'description.required' => 'প্রোডাক্টের বর্ণনা প্রদান করা বাধ্যতামূলক।',

            'category.required'    => 'ক্যাটাগরি নির্বাচন করা বাধ্যতামূলক।',
            'category.in'          => 'নির্বাচিত ক্যাটাগরি সঠিক নয়।',

            'price.required'       => 'মূল্য প্রদান করা বাধ্যতামূলক।',
            'price.numeric'        => 'মূল্য অবশ্যই একটি সংখ্যা হতে হবে।',
            'price.min'            => 'মূল্য শূন্যের কম হতে পারবে না।',

            'previous_price.numeric' => 'আগের মূল্য অবশ্যই একটি সংখ্যা হতে হবে।',
            'previous_price.min'     => 'আগের মূল্য শূন্যের কম হতে পারবে না।',

            'badge.max'            => 'ব্যাজের টেক্সট ৫০ অক্ষরের বেশি হতে পারবে না।',

            'stock_status.required' => 'স্টক স্ট্যাটাস নির্বাচন করা বাধ্যতামূলক।',
            'stock_status.in'       => 'স্টক স্ট্যাটাস সঠিক নয়।',

            'photos_path.required'  => 'একটি প্রোডাক্ট ছবি প্রদান করা বাধ্যতামূলক।',
            'photos_path.image'     => 'ফাইলটি অবশ্যই একটি বৈধ ছবি হতে হবে।',
            'photos_path.mimes'     => 'শুধুমাত্র JPG, JPEG, PNG বা WEBP ফরম্যাট অনুমোদিত।',
            'photos_path.max'       => 'ইমেজের সাইজ ২ এমবি এর বেশি হতে পারবে না।',
        ];
    }
}
