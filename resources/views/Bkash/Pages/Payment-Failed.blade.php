@extends('Bkash.Layout.Master-Layout')
@section('Content')

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="pf-status-card text-center">
            <div class="pf-icon-holder-wrapper">
                <div class="pf-icon-holder fail-glow">
                    <i class="fas fa-times"></i>
                </div>
            </div>

            <div class="pf-content pt-4 px-3">
                <h1 class="pf-status-title bangla-text fw-bold">পেমেন্ট <span class="text-danger-gradient">ব্যর্থ
                        হয়েছে!</span></h1>
                <p class="pf-status-text text-muted bangla-text px-lg-4">
                    দুঃখিত, আপনার পেমেন্টটি প্রসেস করা সম্ভব হয়নি। অনুগ্রহ করে আপনার কার্ড বা অ্যাকাউন্টের তথ্য যাচাই করে
                    আবার চেষ্টা করুন।
                </p>

                @if(isset($response))
                    <div class="pf-error-details my-4">
                        <div class="error-box d-flex align-items-center justify-content-center">
                            <i class="fas fa-circle-exclamation me-2 text-danger"></i>
                            <span class="small"><strong>Error:</strong> {{ $response }}</span>
                        </div>
                    </div>
                @endif

                <div class="pf-button-stack d-flex flex-column gap-3 mt-4">
                    <a href="javascript:history.back()" class="pf-btn-primary-modern text-decoration-none">
                        <i class="fas fa-rotate-right me-2"></i> পুনরায় চেষ্টা করুন
                    </a>
                    <a href="{{ route('products') }}" class="pf-btn-outline-modern text-decoration-none">
                        <i class="fas fa-house me-2"></i> হোমে ফিরে যান
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection