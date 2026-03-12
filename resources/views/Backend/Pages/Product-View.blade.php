@extends('Backend.Layout.Master-Layout')
@section('Content')
    <div class="container py-4">
        <div class="ov-container-modern">
            <div class="ov-card shadow-sm">

                <!-- Product Header -->
                <div class="ov-header d-flex flex-wrap justify-content-between align-items-center p-4">
                    <div>
                        <h4 class="fw-bold mb-1">পণ্যের নাম:
                            <span class="text-primary-gradient">{{ $product->name }}</span>
                        </h4>
                        <span class="text-muted small">ক্যাটাগরি: {{ $product->category }}</span>
                    </div>

                    <div class="mt-3 mt-md-0">
                        <span class="badge bg-success">{{ $product->stock_status }}</span>
                    </div>
                </div>

                <!-- Product Body -->
                <div class="ov-body p-4 p-md-5">
                    <div class="row g-5">

                        <!-- Product Image -->
                        <div class="col-md-5">
                            <div class="ov-product-image text-center">
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600"
                                    class="img-fluid rounded-4 shadow-sm" alt="Product">
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="col-md-7">
                            <h5 class="fw-bold mb-3">পণ্যের শিরোনাম</h5>
                            <p class="text-muted">
                                {{ $product->title }}
                            </p>

                            <div class="mb-4">
                                <span class="badge bg-warning text-dark me-2">{{ $product->badge }}</span>
                            </div>

                            <div class="ov-summary mt-4">

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">ক্যাটাগরি</span>
                                    <span class="fw-bold">{{ $product->category }}</span>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">আগের মূল্য</span>
                                    <span class="text-decoration-line-through text-danger">
                                        ৳ {{ $product->previous_price }}
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">বর্তমান মূল্য</span>
                                    <span class="fw-bold text-success fs-5">
                                        ৳ {{ $product->price }}
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">স্টক স্ট্যাটাস</span>
                                    <span class="badge bg-success">{{ $product->stock_status }}</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-5">
                        <h5 class="fw-bold mb-3">পণ্যের বর্ণনা</h5>
                        <p class="text-muted">
                            {{ $product->description }}
                        </p>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
