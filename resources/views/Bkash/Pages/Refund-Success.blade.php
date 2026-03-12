@extends('Bkash.Layout.Master-Layout')
@section('Content')

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="ps-card-modern text-center refund-card">
            <div class="ps-icon-wrapper">
                <div class="ps-icon-circle refund-success-glow">
                    <i class="fas fa-check-double"></i>
                </div>
            </div>

            <div class="ps-content pt-4">
                <h1 class="ps-title bangla-text fw-bold">রিফান্ড <span class="text-refund-gradient">সফল হয়েছে!</span></h1>
                <p class="text-muted bangla-text px-3">আপনার রিফান্ড অনুরোধটি সফলভাবে সম্পন্ন হয়েছে। টাকা আপনার অ্যাকাউন্টে
                    পাঠিয়ে দেওয়া হয়েছে।</p>

                @if(isset($response))
                    <div class="ps-info-box-modern refund-box mx-auto my-4">
                        <div class="ps-label refund-label">Refund Transaction ID</div>
                        <div class="ps-value fw-bold text-dark mt-1">{{ $response }}</div>
                        <button class="btn btn-sm text-info p-0 mt-1" onclick="copyTrx('{{ $response }}')">
                            <i class="far fa-copy me-1"></i> কপি করুন
                        </button>
                    </div>
                @endif

                <div class="ps-action-stack mt-4">
                    <a href="/" class="ps-btn-home-modern refund-btn text-decoration-none">
                        <i class="fas fa-house-chimney me-2"></i> হোম পেজে ফিরে যান
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection