@extends('Backend.Layout.Master-Layout')
@section('Content')
    <div class="p-form-section py-5 min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-form-card-modern">

                        <div class="p-form-header text-center mb-5">
                            <div class="p-form-icon-holder mx-auto mb-3">
                                <i class="fas fa-pen-to-square"></i>
                            </div>
                            <h2 class="fw-bold bangla-text">প্রোডাক্ট <span class="text-primary-gradient">আপডেট করুন</span>
                            </h2>
                            <p class="text-muted small">পণ্যের তথ্য পরিবর্তন করতে নিচের ফর্মটি ব্যবহার করুন</p>
                        </div>

                        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating p-form-group">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="prodName" value="{{ old('name', $product->name) }}" required>
                                        <label for="prodName" class="text-muted"> <i class="fas fa-tag me-2"></i>পণ্যের নাম</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating p-form-group">
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="prodTitle" value="{{ old('title', $product->title) }}" required>
                                        <label for="prodTitle" class="text-muted"><i class="fas fa-heading me-2"></i>পণ্যের শিরোনাম</label>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating p-form-group">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="prodDesc" style="height:120px" required>{{ old('description', $product->description) }}</textarea>
                                        <label for="prodDesc" class="text-muted"><i class="fas fa-align-left me-2"></i>পণ্যের বর্ণনা</label>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating p-form-group">
                                        <select name="category" class="form-select @error('category') is-invalid @enderror" id="prodCat" required>
                                            @php $selectedCat = old('category', $product->category); @endphp
                                            <option value="electronics" {{ $selectedCat == 'electronics' ? 'selected' : '' }}>Electronics</option>
                                            <option value="fashion" {{ $selectedCat == 'fashion' ? 'selected' : '' }}>Fashion</option>
                                            <option value="home" {{ $selectedCat == 'home' ? 'selected' : '' }}>Home & Living</option>
                                            <option value="gadgets" {{ $selectedCat == 'gadgets' ? 'selected' : '' }}>Gadgets</option>
                                        </select>
                                        <label class="text-muted">ক্যাটাগরি</label>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating p-form-group">
                                        <input type="text" name="badge" class="form-control @error('badge') is-invalid @enderror" value="{{ old('badge', $product->badge) }}">
                                        <label class="text-muted">ব্যাজ (New / Sale)</label>
                                        @error('badge')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating p-form-group">
                                        <select name="stock_status"
                                            class="form-select @error('stock_status') is-invalid @enderror" required>
                                            @php $selectedStock = old('stock_status', $product->stock_status); @endphp
                                            <option value="in_stock" {{ $selectedStock == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                                            <option value="out_of_stock"{{ $selectedStock == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                                            <option value="pre_order"{{ $selectedStock == 'pre_order' ? 'selected' : '' }}>Pre Order</option>
                                        </select>
                                        <label class="text-muted">স্টক স্ট্যাটাস</label>
                                        @error('stock_status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating p-form-group">
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>
                                        <label class="text-muted"><i class="fas fa-money-bill-wave me-2"></i>বর্তমান মূল্য (৳)</label>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating p-form-group">
                                        <input type="number" name="previous_price" class="form-control @error('previous_price') is-invalid @enderror" value="{{ old('previous_price', $product->previous_price) }}">
                                        <label class="text-muted"><i class="fas fa-history me-2"></i>আগের মূল্য (৳)</label>
                                        @error('previous_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">বর্তমান ছবি</label><br>
                                        <img src="{{ asset($product->photos_path) }}" width="120" class="rounded shadow-sm">
                                    </div>

                                    <div class="p-photo-upload-box">
                                        <label class="form-label small fw-bold text-primary-gradient mb-2"><i class="fas fa-image me-1"></i> নতুন ছবি আপলোড করুন</label>
                                        <input type="file" name="photos_path" class="form-control @error('photos_path') is-invalid @enderror">
                                        @error('photos_path')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="mt-5">
                                <button type="submit" class="p-form-btn-modern w-100"><i class="fas fa-save me-2"></i> প্রোডাক্ট আপডেট করুন</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
