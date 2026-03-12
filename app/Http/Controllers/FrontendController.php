<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller {
    public function products(){
        $products = Product::all();
        return view('Frontend.Pages.Products', compact('products'));
    }

    public function productsCreateView(){
        return view('Frontend.Pages.Product-Create');
    }

    public function singleProductView($productId){
        $product = Product::where('id', $productId)->first();
        return view('Frontend.Pages.Product-View', compact('product'));
    }

    public function productOrderView($productId){
        $product = Product::where('id', $productId)->first();
        return view('Frontend.Pages.Product-Order', compact('product'));
    }

    public function orderSubmit(OrderRequest $request){
        $validate = $request->validated();
        Session::forget('validData');
        Session::put('validData', $validate);
        return redirect()->route('bkash.createPayment');
    }
}
