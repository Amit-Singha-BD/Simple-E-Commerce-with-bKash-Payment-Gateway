@extends('Backend.Layout.Master-Layout')
@section('Content')
    <div class="container py-4">
        <div class="ov-container-modern">
            <div class="ov-card shadow-sm">

                <div class="ov-header d-flex flex-wrap justify-content-between align-items-center p-4">
                    <div class="ov-id-section">
                        <h4 class="fw-bold mb-1 bangla-text">অর্ডার আইডি: <span
                                class="text-primary-gradient">#{{ $order->id }}</span></h4>
                        <span class="ov-date text-muted small">
                            <i class="far fa-calendar-alt me-1"></i> তারিখ:
                            {{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y | h:i A') }}
                        </span>
                    </div>
                    <div class="ov-status-section mt-3 mt-md-0">
                        <div class="ov-status-pill processing">
                            <i class="fas fa-circle-notch fa-spin me-2"></i> প্রসেসিং হচ্ছে
                        </div>
                    </div>
                </div>

                <div class="ov-body p-4 p-md-5">
                    <div class="row g-5">

                        <div class="col-md-6">
                            <h5 class="ov-section-title mb-4">
                                <i class="fas fa-user-circle me-2"></i> গ্রাহকের তথ্য
                            </h5>
                            <div class="ov-info-box h-100">
                                <div class="ov-info-item">
                                    <span class="ov-label">নাম</span>
                                    <span class="ov-value fw-bold">{{ $order->customer_name }}</span>
                                </div>
                                <div class="ov-info-item">
                                    <span class="ov-label">ফোন নম্বর</span>
                                    <span class="ov-value">{{ $order->phone }}</span>
                                </div>
                                <div class="ov-info-item">
                                    <span class="ov-label">ডেলিভারি ঠিকানা</span>
                                    <span class="ov-value">{{ $order->division }}, {{ $order->district }},
                                        {{ $order->upazila }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5 class="ov-section-title mb-4">
                                <i class="fas fa-shopping-cart me-2"></i> অর্ডারের বিবরণ
                            </h5>
                            <div class="ov-info-box">
                                <div class="ov-product-display d-flex align-items-center mb-4 p-3 bg-light rounded-4">
                                    <div class="ov-p-img me-3">
                                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=200"
                                            alt="Product">
                                    </div>
                                    <div class="ov-p-meta">
                                        <h6 class="mb-1 fw-bold">{{ $order->product_name }}</h6>
                                        <span class="badge bg-white text-dark border rounded-pill">পরিমাণ:
                                            {{ $order->quantity }} টি</span>
                                    </div>
                                </div>

                                <div class="ov-summary mt-4">
                                    <div class="ov-summary-row d-flex justify-content-between mb-2">
                                        <span class="text-muted">পণ্যের দাম</span>
                                        <span class="fw-bold">৳ {{ number_format($order->total_price) }}</span>
                                    </div>
                                    <div class="ov-summary-row d-flex justify-content-between mb-2">
                                        <span class="text-muted">ডেলিভারি চার্জ</span>
                                        <span class="fw-bold">৳ {{ number_format($order->delivery_fee) }}</span>
                                    </div>
                                    <hr class="my-3 opacity-10">
                                    <div class="ov-summary-row total d-flex justify-content-between">
                                        <span class="fw-bold h5 mb-0">সর্বমোট</span>
                                        <span class="fw-bold h5 mb-0 text-primary-gradient">৳
                                            {{ number_format($order->total_price + $order->delivery_fee) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="ov-footer p-4 bg-light d-flex flex-wrap gap-3 justify-content-end">
                    <a href="{{ route('bkash.getRefund', $order->id) }}" class="ov-btn-refund">
                        <i class="fas fa-rotate-left me-2"></i> পেমেন্ট ফেরত পাঠান
                    </a>
                    <form action="{{ route('update.delivery.status', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="ov-btn-back" title="Mark as Delivered" type="submit">
                            <i class="fas fa-check me-2"></i> ডেলিভারি করা হয়েছে
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
