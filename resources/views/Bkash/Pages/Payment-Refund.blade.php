@extends('Bkash.Layout.Master-Layout')
@section('Content')

    <div class="container d-flex align-items-center justify-content-center min-vh-100 py-5">
        <div class="rf-card-modern">
            <div class="rf-header text-center">
                <div class="rf-icon-holder-wrapper">
                    <div class="rf-icon-holder">
                        <i class="fas fa-undo-alt"></i>
                    </div>
                </div>
                <h1 class="rf-title bangla-text fw-bold">বিকাশ <span class="text-primary-gradient">রিফান্ড অনুরোধ</span></h1>
                <p class="rf-subtitle text-muted bangla-text small">প্রয়োজনীয় তথ্য দিয়ে আপনার রিফান্ড ফর্মটি পূরণ করুন</p>
            </div>

            <div class="form-body mt-4">
                <form action="{{ route('bkash.refundPayment', $orderData->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $orderData->id }}">
                    <input type="hidden" name="payment_id" value="{{ $orderData->payment_id }}">
                    <input type="hidden" name="trx_id" value="{{ $orderData->trx_id }}">
                    <input type="hidden" name="refund_amount" value="{{ $orderData->total_price }}">

                    <div class="order-mini-badge d-flex justify-content-between mb-4">
                        <span>অর্ডার আইডি: <strong>#{{ $orderData->id }}</strong></span>
                        <span>পরিমাণ: <strong class="text-success">৳{{ $orderData->total_price }}</strong></span>
                    </div>

                    <div class="form-floating mb-4">
                        <textarea id="refundReason" name="refund_reason" class="form-control" 
                            placeholder="রিফান্ডের কারণ লিখুন" style="height: 120px" required></textarea>
                        <label for="refundReason" class="text-muted small">রিফান্ডের সঠিক কারণ লিখুন</label>
                    </div>

                    <button type="submit" name="submit" class="rf-btn-submit-modern w-100">
                        <i class="fas fa-paper-plane me-2"></i> সাবমিট রিফান্ড
                    </button>
                </form>

                @if(isset($response))
                    <div class="rf-response-box mt-4 p-3 rounded-4 bg-light border">
                        <div class="small">
                            <i class="fas fa-info-circle me-1 text-primary"></i>
                            <strong class="bangla-text">সার্ভার রেসপন্স:</strong>
                            <div class="text-break mt-1 text-muted">{{ $response }}</div>
                        </div>
                    </div>
                @endif

                <div class="text-center mt-4">
                    <a href="/" class="rf-home-link-modern text-decoration-none">
                        <i class="fas fa-arrow-left me-1"></i> হোমে ফিরে যান
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection