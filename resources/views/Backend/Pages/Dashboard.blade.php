@extends('Backend.Layout.Master-Layout')
@section('Content')
    <div class="dashboard-home">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold bangla-text"><span class="text-primary-gradient">ড্যাশবোর্ড</span></h3>
                <p class="text-muted small">ব্যবসার আপডেট এবং পরিসংখ্যান দেখুন</p>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card-modern">
                    <div class="stat-icon bg-soft-primary">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-info">
                        <span class="text-muted small d-block">মোট পণ্য</span>
                        <h4 class="fw-bold mb-0">{{ $productCount }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card-modern">
                    <div class="stat-icon bg-soft-purple">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-info">
                        <span class="text-muted small d-block">মোট অর্ডার</span>
                        <h4 class="fw-bold mb-0">{{ $pendingOrderCount }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card-modern">
                    <div class="stat-icon bg-soft-info">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <div class="stat-info">
                        <span class="text-muted small d-block">ডেলিভারি সম্পন্ন</span>
                        <h4 class="fw-bold mb-0">{{ $deliveredOrderCount }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card-modern">
                    <div class="stat-icon bg-soft-danger">
                        <i class="fas fa-undo-alt"></i>
                    </div>
                    <div class="stat-info">
                        <span class="text-muted small d-block">রিফান্ড সম্পন্ন</span>
                        <h4 class="fw-bold mb-0">{{ $refundCount }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="fw-bold text-center bangla-text"><span class="text-primary-gradient">অর্ডার তালিকা</span></h3>
        <div class="card ot-card-modern border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table ot-table mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>ক্র.নং</th>
                                <th class="ps-4">পণ্যের বিবরণ</th>
                                <th>ক্রেতা</th>
                                <th>ফোন নাম্বার</th>
                                <th>পরিমাণ/মূল্য</th>
                                <th>অর্ডারের তারিখ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestOrders as $order)
                                <tr class="text-center">
                                    <td>
                                        <span class="fw-600 text-dark">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="ot-img-container me-3">
                                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100"
                                                    alt="product">
                                            </div>
                                            <div>
                                                <span class="d-block fw-bold text-dark">{{ $order->product_name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-600 text-secondary">{{ $order->customer_name }}</span>
                                    </td>
                                    <td>
                                        <span class="ot-badge status-warning">{{ $order->phone }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-secondary">৳
                                            {{ number_format($order->total_price) }}</span>
                                    </td>
                                    <td class="text-muted small">
                                        {{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
