<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BkashController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Frontend Route
Route::get('/', [FrontendController::class, 'products'])->name('products');
Route::get('/product/create/view', [FrontendController::class, 'productsCreateView'])->name('product.create.view');
Route::get('/single/product/view/{productId}', [FrontendController::class, 'singleProductView'])->name('single.product.view');
Route::get('/product/order/view/{productId}', [FrontendController::class, 'productOrderView'])->name('product.order.view');
Route::post('/order/submit', [FrontendController::class, 'orderSubmit'])->name('order.submit');

// Authentication Route
Route::get('/login/view', [AuthenticationController::class, 'loginView'])->name('login.view');
Route::post('/login/submit', [AuthenticationController::class, 'loginSubmit'])->name('login.submit');
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login.view')->with('success', 'সফলভাবে লগআউট সম্পন্ন হয়েছে।');
})->name('logout');

// Backend Route
Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');
Route::get('/product/list', [BackendController::class, 'productList'])->name('product.list');
Route::get('/product/view/{id}', [BackendController::class, 'productView'])->name('product.view');
Route::get('/product/edit/{id}', [BackendController::class, 'productEdit'])->name('product.edit');
Route::put('/product/update/{id}', [BackendController::class, 'productUpdate'])->name('product.update');
Route::delete('/product/delete/{id}', [BackendController::class, 'productDelete'])->name('product.delete');
Route::get('/create/product', [BackendController::class, 'createProduct'])->name('create.product');
Route::post('/create/product/submit', [BackendController::class, 'createProductSubmit'])->name('create.product.submit');
Route::get('/order/list', [BackendController::class, 'orderList'])->name('order.list');
Route::get('/order/view/{id}', [BackendController::class, 'orderView'])->name('order.view');
Route::patch('/update/delivery/status/{id}', [BackendController::class, 'updateDeliveryStatus'])->name('update.delivery.status');
Route::get('/delivery/list', [BackendController::class, 'deliveryList'])->name('delivery.list');
Route::get('/refund/list', [BackendController::class, 'refundList'])->name('refund.list');
Route::get('/refund/view/{id}', [BackendController::class, 'refundView'])->name('refund.View');



// Bkash Payment Route
Route::get('/create/payment', [BkashController::class, 'createPayment'])->name('bkash.createPayment');
Route::get('/bkash/callback', [BkashController::class, 'callback'])->name('bkash.callback');
Route::get('/bkash/refund/view/{orderId}', [BkashController::class, 'getRefund'])->name('bkash.getRefund');
Route::post('/bkash/refund/{orderId}', [BkashController::class, 'refundPayment'])->name('bkash.refundPayment');
Route::get('/payment/success', [BkashController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/failed', [BkashController::class, 'paymentFailed'])->name('payment.failed');
Route::get('/payment/refund', [BkashController::class, 'paymentRefund'])->name('payment.refund');
Route::get('/refund/success', [BkashController::class, 'refundSuccess'])->name('refund.success');