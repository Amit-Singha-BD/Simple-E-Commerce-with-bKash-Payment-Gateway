<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {

    public function run(): void {
        $products = [
            [
                'name' => 'স্মার্ট ওয়াচ',
                'title' => 'প্রিমিয়াম স্মার্ট ওয়াচ',
                'description' => 'স্টাইলিশ ও আধুনিক স্মার্ট ওয়াচ',
                'category' => 'ইলেকট্রনিক্স',
                'price' => '2500',
                'previous_price' => '3000',
                'badge' => 'নতুন',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Smartwatch.jpg',
            ],
            [
                'name' => 'ওয়্যারলেস হেডফোন',
                'title' => 'নয়েজ ক্যানসেলিং হেডফোন',
                'description' => 'উচ্চ মানের সাউন্ড কোয়ালিটি',
                'category' => 'ইলেকট্রনিক্স',
                'price' => '1800',
                'previous_price' => '2200',
                'badge' => 'হট',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Hadephone.jpg',
            ],
            [
                'name' => 'রানিং জুতা',
                'title' => 'আরামদায়ক রানিং জুতা',
                'description' => 'দীর্ঘ সময় ব্যবহারের জন্য উপযোগী',
                'category' => 'ফ্যাশন',
                'price' => '3200',
                'previous_price' => '3800',
                'badge' => 'ছাড়',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Shoes.jpg',
            ],
            [
                'name' => 'ব্যাকপ্যাক',
                'title' => 'ভ্রমণ ব্যাকপ্যাক',
                'description' => 'ভ্রমণের জন্য টেকসই ব্যাগ',
                'category' => 'অ্যাক্সেসরিজ',
                'price' => '1500',
                'previous_price' => '1900',
                'badge' => 'জনপ্রিয়',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Bag.jpg',
            ],
            [
                'name' => 'ব্লুটুথ স্পিকার',
                'title' => 'পোর্টেবল ব্লুটুথ স্পিকার',
                'description' => 'জোরালো সাউন্ড ও লং ব্যাটারি',
                'category' => 'ইলেকট্রনিক্স',
                'price' => '2100',
                'previous_price' => '2600',
                'badge' => 'নতুন',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Spekar.jpg',
            ],
            [
                'name' => 'সানগ্লাস',
                'title' => 'ইউভি প্রোটেকশন সানগ্লাস',
                'description' => 'চোখের সুরক্ষায় স্টাইলিশ চশমা',
                'category' => 'ফ্যাশন',
                'price' => '900',
                'previous_price' => '1200',
                'badge' => 'ট্রেন্ডিং',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Sunglass.jpg',
            ],
            [
                'name' => 'চামড়ার মানিব্যাগ',
                'title' => 'জেনুইন লেদার মানিব্যাগ',
                'description' => 'টেকসই ও প্রিমিয়াম মানের মানিব্যাগ',
                'category' => 'অ্যাক্সেসরিজ',
                'price' => '700',
                'previous_price' => '1000',
                'badge' => 'সেরা',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Monybag.jpg',
            ],
            [
                'name' => 'অফিস চেয়ার',
                'title' => 'আরামদায়ক অফিস চেয়ার',
                'description' => 'দীর্ঘ সময় বসার জন্য উপযুক্ত চেয়ার',
                'category' => 'ফার্নিচার',
                'price' => '5500',
                'previous_price' => '6500',
                'badge' => 'হট',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Chear.jpeg',
            ],
            [
                'name' => 'মোবাইল কভার',
                'title' => 'শকপ্রুফ মোবাইল কভার',
                'description' => 'মোবাইল সুরক্ষার জন্য শক্ত কভার',
                'category' => 'অ্যাক্সেসরিজ',
                'price' => '350',
                'previous_price' => '500',
                'badge' => 'ছাড়',
                'stock_status' => 'স্টকে আছে',
                'photos_path' => 'Cover.jpg',
            ],
        ];

        DB::table('products')->insert($products);
    }
}
