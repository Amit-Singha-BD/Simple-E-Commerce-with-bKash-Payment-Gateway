@extends('Backend.Layout.Master-Layout')
@section('Content')
<div class="container py-4">
    <div class="ov-container-modern">
        <div class="ov-card shadow-sm">

            <!-- Header -->
            <div class="ov-header d-flex justify-content-between align-items-center p-4">
                <div>
                    <h4 class="fw-bold bangla-text">অর্ডার আইডি: <span
                            class="text-primary-gradient">#{{ $refund->order->id }}</span></h4>
                    <span class="text-muted small"><i class="far fa-calendar-alt me-1"></i> অর্ডারের তারিখ:
                        {{ $refund->order->created_at->format('d M, Y | h:i A') }}</span>
                </div>
                <div>
                    <div class="ov-status-pill {{ $refund->order->status === 'delivered' ? 'delivered' : 'processing' }}">
                        {{ ucfirst($refund->order->status) }}
                    </div>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="ov-body p-4 p-md-5">
                <div class="row g-5">

                    <div class="col-md-6">
                        <h5 class="ov-section-title mb-4"><i class="fas fa-user-circle me-2"></i> গ্রাহকের তথ্য</h5>
                        <div class="ov-info-box h-100">
                            <div class="ov-info-item">
                                <span class="ov-label">নাম</span>
                                <span class="ov-value fw-bold">{{ $refund->order->customer_name }}</span>
                            </div>
                            <div class="ov-info-item">
                                <span class="ov-label">ফোন নম্বর</span>
                                <span class="ov-value">{{ $refund->order->phone }}</span>
                            </div>
                            <div class="ov-info-item">
                                <span class="ov-label">ডেলিভারি ঠিকানা</span>
                                <span class="ov-value">{{ $refund->order->division }}, {{ $refund->order->district }},
                                    {{ $refund->order->upazila }}, {{ $refund->order->post_office }}, {{ $refund->order->village }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Order & Refund Info -->
                    <div class="col-md-6">
                        <h5 class="ov-section-title mb-4"><i class="fas fa-shopping-cart me-2"></i> অর্ডার ও রিফান্ড
                            বিবরণ</h5>
                        <div class="ov-info-box">

                            <!-- Product -->
                            <div class="ov-product-display d-flex align-items-center mb-4 p-3 bg-light rounded-4">
                                <div class="ov-p-img me-3">
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=200"
                                        alt="Product">
                                </div>
                                <div class="ov-p-meta">
                                    <h6 class="mb-1 fw-bold">{{ $refund->order->product_name }}</h6>
                                    <span class="badge bg-white text-dark border rounded-pill">পরিমাণ:
                                        {{ $refund->order->quantity }} টি</span>
                                </div>
                            </div>

                            <!-- Order Summary -->
                            <div class="ov-summary mt-4">
                                <div class="ov-summary-row d-flex justify-content-between mb-2">
                                    <span class="text-muted">পণ্যের দাম</span>
                                    <span class="fw-bold">৳ {{ number_format($refund->order->total_price) }}</span>
                                </div>
                                <div class="ov-summary-row d-flex justify-content-between mb-2">
                                    <span class="text-muted">ডেলিভারি চার্জ</span>
                                    <span class="fw-bold">৳ {{ number_format($refund->order->delivery_fee) }}</span>
                                </div>
                                <hr class="my-3 opacity-10">
                                <div class="ov-summary-row total d-flex justify-content-between">
                                    <span class="fw-bold h5 mb-0">সর্বমোট</span>
                                    <span class="fw-bold h5 mb-0 text-primary-gradient">৳
                                        {{ number_format($refund->order->total_price + $refund->order->delivery_fee) }}</span>
                                </div>
                            </div>

                            <!-- Refund Info -->
                            <div class="ov-refund mt-4 p-3 bg-light rounded-4">
                                <h6 class="fw-bold mb-2">রিফান্ড তথ্য</h6>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-bold">রিফান্ড পরিমাণ:</span>
                                    <span class="fw-bold text-danger">৳
                                        {{ number_format($refund->refund_amount) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-bold">রিফান্ড ট্রানজেকশন আইডি:</span>
                                    <span>{{ $refund->trx_id }}</span>
                                </div>
                                <div class="mb-1">
                                    <span class="fw-bold">রিফান্ড কারণ:</span>
                                    <p class="mb-0">{{ $refund->refund_reason }}</p>
                                </div>
                                <div class="text-muted small">
                                    <span>রিফান্ড তারিখ: {{ $refund->created_at->format('d M, Y | h:i A') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection