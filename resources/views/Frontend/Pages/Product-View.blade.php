@extends('Frontend.Layout.Master-Layout')
@section('Content')

    <div class="container main-wrapper py-5">
        <div class="product-view-card product-reveal">
            <div class="row g-0">

                <div class="col-lg-6 image-side">
                    <div class="badge-float">
                        <span class="modern-badge">{{ $product->badge }}</span>
                    </div>

                    <div class="main-img-container">
                        <img src="{{ asset('Assets/photos/' . $product->photos_path) }}"
                            alt="পণ্যের ছবি" class="product-main-img img-fluid">
                    </div>
                </div>

                <div class="col-lg-6 info-side">
                    <div class="content-wrapper p-4 p-lg-5">
                        <span class="cat-label text-uppercase">{{ $product->category }}</span>

                        <h1 class="p-name bangla-text mt-2">{{ $product->name }}</h1>
                        <p class="p-title text-muted">{{ $product->title }}</p>

                        <div class="price-tag my-4">
                            <span class="new-price">৳ {{ $product->price }}</span>
                            <span class="old-price">৳ {{ $product->previous_price }}</span>
                        </div>

                        <div class="stock-pill in-stock mb-4">
                            <i class="fas fa-check-circle me-2"></i> {{ $product->stock_status }}
                        </div>

                        <a href="{{ route('product.order.view', $product->id) }}" class="order-btn-large text-decoration-none mb-4">
                            <i class="fas fa-bolt me-2"></i> এখনই অর্ডার করুন
                        </a>

                        <div class="desc-section">
                            <h5 class="desc-title">পণ্যের বিবরণ:</h5>
                            <p class="desc-text text-muted">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection