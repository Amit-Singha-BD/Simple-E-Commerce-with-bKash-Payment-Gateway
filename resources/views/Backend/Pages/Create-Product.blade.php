@extends('Backend.Layout.Master-Layout')
@section('Content')

    <div class="p-form-section py-5 min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-form-card-modern">

                        <div class="p-form-header text-center mb-5">
                            <div class="p-form-icon-holder mx-auto mb-3">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <h2 class="fw-bold bangla-text">নতুন <span class="text-primary-gradient">প্রোডাক্ট যোগ
                                    করুন</span></h2>
                            <p class="text-muted small">সঠিক তথ্য দিয়ে ইনভেন্টরিতে নতুন পণ্য যুক্ত করুন</p>
                        </div>

                        <form action="{{ route('create.product.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating p-form-group">
                                        <input type="text" name="name" class="form-control" id="prodName" placeholder="Name"
                                            required>
                                        <label for="prodName" class="text-muted"><i class="fas fa-tag me-2"></i>Product
                                            Name</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating p-form-group">
                                        <input type="text" name="title" class="form-control" id="prodTitle"
                                            placeholder="Title" required>
                                        <label for="prodTitle" class="text-muted"><i class="fas fa-heading me-2"></i>Product
                                            Title</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating p-form-group">
                                        <textarea name="description" class="form-control" id="prodDesc"
                                            placeholder="Description" style="height: 120px" required></textarea>
                                        <label for="prodDesc" class="text-muted"><i
                                                class="fas fa-align-left me-2"></i>Product Description</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating p-form-group">
                                        <select name="category" class="form-select" id="prodCat" required>
                                            <option value="" selected disabled>Select Category</option>
                                            <option value="electronics">Electronics</option>
                                            <option value="fashion">Fashion</option>
                                            <option value="home">Home & Living</option>
                                            <option value="gadgets">Gadgets</option>
                                        </select>
                                        <label for="prodCat" class="text-muted">Category</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating p-form-group">
                                        <input type="text" name="badge" class="form-control" id="prodBadge"
                                            placeholder="Badge">
                                        <label for="prodBadge" class="text-muted">Badge (New/Sale)</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating p-form-group">
                                        <select name="stock_status" class="form-select" id="prodStock" required>
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="in_stock">In Stock</option>
                                            <option value="out_of_stock">Out of Stock</option>
                                            <option value="pre_order">Pre-Order</option>
                                        </select>
                                        <label for="prodStock" class="text-muted">Stock Status</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating p-form-group">
                                        <input type="number" name="price" class="form-control" id="prodPrice"
                                            placeholder="Price" required>
                                        <label for="prodPrice" class="text-muted"><i
                                                class="fas fa-money-bill-wave me-2"></i>Current Price (৳)</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating p-form-group">
                                        <input type="number" name="previous_price" class="form-control" id="prodOldPrice"
                                            placeholder="Old Price">
                                        <label for="prodOldPrice" class="text-muted"><i
                                                class="fas fa-history me-2"></i>Previous Price (৳)</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="p-photo-upload-box">
                                        <label class="form-label small fw-bold text-primary-gradient mb-2">
                                            <i class="fas fa-image me-1"></i> Product Display Photo
                                        </label>
                                        <input type="file" name="photos_path" class="form-control custom-file-input"
                                            id="prodPhoto">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" name="submit" class="p-form-btn-modern w-100">
                                    <i class="fas fa-cloud-upload-alt me-2"></i> Create Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection