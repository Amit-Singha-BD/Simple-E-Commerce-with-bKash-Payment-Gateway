@extends('Bkash.Layout.Master-Layout')
@section('Content')

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="ps-card-modern text-center">
            <div class="ps-icon-wrapper">
                <div class="ps-icon-circle success-glow">
                    <i class="fas fa-check"></i>
                </div>
            </div>

            <div class="ps-content pt-4">
                <h1 class="ps-title bangla-text fw-bold">পেমেন্ট <span class="text-success-gradient">সফল হয়েছে!</span></h1>
                <p class="text-muted bangla-text px-3">আপনার লেনদেনটি সফলভাবে সম্পন্ন হয়েছে। আমাদের সাথে থাকার জন্য
                    ধন্যবাদ।</p>

                @if(isset($response))
                    <div class="ps-info-box-modern mx-auto my-4">
                        <div class="ps-label">bKash Transaction ID</div>
                        <div class="ps-value fw-bold text-dark mt-1">{{ $response }}</div>
                        <button class="btn btn-sm text-primary p-0 mt-1" onclick="copyTrx('{{ $response }}')">
                            <i class="far fa-copy me-1"></i> কপি করুন
                        </button>
                    </div>
                @endif

                <div class="ps-action-stack mt-4">
                    <a href="/" class="ps-btn-home-modern text-decoration-none">
                        <i class="fas fa-home me-2"></i> হোম পেজে ফিরে যান
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection