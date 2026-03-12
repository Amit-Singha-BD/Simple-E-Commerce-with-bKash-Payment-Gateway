@extends('Frontend.Layout.Master-Layout')
@section('Content')

    <section id="products" class="container py-5">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title bangla-text">
                    আমাদের <span class="text-primary-gradient">প্রোডাক্টসমূহ</span>
                </h2>
                <div class="title-underline mx-auto"></div>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="product-card-modern">
                        <div class="badge-wrapper">
                            <span class="modern-badge">{{ $product->badge }}</span>
                        </div>

                        <div class="image-container">
                            <img src="{{ asset('Assets/photos/'.$product->photos_path) }}"
                                alt="Product" class="img-fluid">
                            <div class="image-overlay d-none d-lg-flex">
                                <div class="quick-view-btn"><i class="fas fa-eye"></i></div>
                            </div>
                        </div>

                        <div class="product-details">
                            <h3 class="product-title bangla-text">{{ $product->name }}</h3>
                            <p class="product-subtitle bangla-text text-muted">{{ $product->title }}</p>

                            <div class="price-section mb-4">
                                <span class="old-price">৳ {{ $product->price }}</span>
                                <span class="new-price">৳ {{ $product->previous_price }}</span>
                            </div>

                            <div class="action-buttons-group">
                                <a href="{{ route('single.product.view', $product->id) }}" class="btn-modern-secondary text-decoration-none">
                                    <i class="fas fa-list me-2"></i>বিস্তারিত
                                </a>
                                <a href="{{ route('product.order.view', $product->id) }}" class="btn-modern-primary text-decoration-none">
                                    <i class="fas fa-shopping-basket me-2"></i>অর্ডার করুন
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection