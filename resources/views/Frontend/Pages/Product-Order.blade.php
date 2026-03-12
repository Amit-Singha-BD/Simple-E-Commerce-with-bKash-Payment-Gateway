@extends('Frontend.Layout.Master-Layout')
@section('Content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="order-card-modern">

                    <div class="product-mini-header p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="mini-img-wrapper">
                                <img src="{{ asset('Assets/photos/' . $product->photos_path) }}" alt="প্রোডাক্ট"
                                    class="mini-img">
                            </div>
                            <div class="mini-info">
                                <h5 class="mb-1 fw-bold">{{ $product->name }}</h5>
                                <p class="price-text mb-0 text-muted">মূল্য: ৳ <span
                                        id="basePrice">{{ $product->price }}</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-body p-4 p-lg-5">
                        <h2 class="form-title bangla-text mb-4">ডেলিভারি তথ্য দিন</h2>

                        <form action="{{ route('order.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_name" value="{{ $product->name }}">
                            <input type="hidden" name="total_price" id="totalPriceInput" value="{{ old('total_price') }}">

                            <div class="form-floating mb-3">
                                <input type="text" name="customer_name"
                                    class="form-control @error('customer_name') is-invalid @enderror" id="cName"
                                    placeholder="নাম" value="{{ old('customer_name') }}" required>
                                <label for="cName"><i class="fas fa-user me-2"></i>আপনার পূর্ণ নাম</label>
                                @error('customer_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" id="cPhone"
                                    placeholder="ফোন" value="{{ old('phone') }}" required>
                                <label for="cPhone"><i class="fas fa-phone me-2"></i>মোবাইল নম্বর</label>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="number" name="quantity" id="quantity"
                                            class="form-control @error('quantity') is-invalid @enderror"
                                            value="{{ old('quantity', 1) }}" min="1">
                                        <label><i class="fas fa-layer-group me-2"></i>পরিমাণ</label>
                                        @error('quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-floating">
                                        <select name="division" id="division"
                                            class="form-select @error('division') is-invalid @enderror" required>
                                            <option value="">নির্বাচন করুন</option>
                                            @php
                                                $divisions = [
                                                    'Dhaka' => 'ঢাকা',
                                                    'Chattogram' => 'চট্টগ্রাম',
                                                    'Rajshahi' => 'রাজশাহী',
                                                    'Khulna' => 'খুলনা',
                                                    'Barishal' => 'বরিশাল',
                                                    'Sylhet' => 'সিলেট',
                                                    'Rangpur' => 'রংপুর',
                                                    'Mymensingh' => 'ময়মনসিংহ',
                                                ];
                                            @endphp
                                            @foreach ($divisions as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ old('division') == $value ? 'selected' : '' }}>{{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label>বিভাগ</label>
                                        @error('division')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="district"
                                            class="form-control @error('district') is-invalid @enderror" placeholder="জেলা"
                                            value="{{ old('district') }}" required>
                                        <label>জেলা</label>
                                        @error('district')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="upazila"
                                            class="form-control @error('upazila') is-invalid @enderror" placeholder="উপজেলা"
                                            value="{{ old('upazila') }}" required>
                                        <label>উপজেলা/থানা</label>
                                        @error('upazila')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="delivery-summary p-4 mb-4" style="background: #f8f9fa; border-radius: 12px;">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">ডেলিভারি চার্জ:</span>
                                    <span class="fw-bold">৳ <span id="deliveryChargeDisplay">0</span></span>
                                </div>
                                <div class="d-flex justify-content-between total-row pt-2 border-top">
                                    <span class="fw-bold">সর্বমোট:</span>
                                    <span class="total-price-text fw-bold text-primary">৳ <span
                                            id="totalPriceDisplay">0</span></span>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="order-confirm-btn w-100 btn btn-primary btn-lg">
                                <i class="fas fa-check-circle me-2"></i>অর্ডার নিশ্চিত করুন
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const divisionSelect = document.getElementById('division');
            const quantityInput = document.getElementById('quantity');
            const totalPriceInput = document.getElementById('totalPriceInput');
            const totalPriceDisplay = document.getElementById('totalPriceDisplay');
            const deliveryChargeDisplay = document.getElementById('deliveryChargeDisplay');
            const basePrice = parseFloat("{{ $product->price }}");

            function calculateTotal() {
                let quantity = parseInt(quantityInput.value) || 1;
                let deliveryCharge = 0;

                // Delivery Logic
                if (divisionSelect.value === 'Dhaka') {
                    deliveryCharge = 60;
                } else if (divisionSelect.value === '') {
                    deliveryCharge = 0;
                } else {
                    deliveryCharge = 120;
                }

                let subtotal = basePrice * quantity;
                let total = subtotal + deliveryCharge;

                // Update Display
                deliveryChargeDisplay.innerText = deliveryCharge;
                totalPriceDisplay.innerText = total;

                // Update Hidden Input
                totalPriceInput.value = total;
            }

            divisionSelect.addEventListener('change', calculateTotal);
            quantityInput.addEventListener('input', calculateTotal);

            // Run on page load to handle old values
            calculateTotal();
        });
    </script>
@endsection
