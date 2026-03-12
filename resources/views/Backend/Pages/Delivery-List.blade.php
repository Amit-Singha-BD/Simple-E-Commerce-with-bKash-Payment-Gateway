@extends('Backend.Layout.Master-Layout')
@section('Content')
    <div class="tab-pane fade show active" id="productList">
        <div class="d-flex align-items-center justify-content-center mb-4">
            <div class="p-icon-box-small me-3">
                <i class="fas fa-box-open"></i>
            </div>
            <h4 class="fw-bold mb-0 bangla-text">ডেলিভারি <span class="text-primary-gradient">তালিকা</span></h4>
        </div>

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
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="text-center">
                                    <td>
                                        <span class="fw-600 text-secondary">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="ot-img-container me-3">
                                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100"
                                                    alt="product">
                                            </div>
                                            <div>
                                                <span class="d-block fw-bold text-dark">{{ $order->product_name }}</span>
                                                <small class="text-muted">ID: #ORD-1001</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-600 text-secondary">{{ $order->customer_name }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">{{ $order->phone }}</span>
                                    </td>
                                    <td>
                                        <span class="ot-badge status-success">{{ $order->total_price }}</span>
                                    </td>
                                    <td class="text-muted small">
                                        {{ \Carbon\Carbon::parse($order->updated_at)->format('d M, Y') }}
                                    </td>
                                    <td>
                                        <a href="#" class="ot-btn-view" title="View">
                                            <i class="fas fa-eye me-1"></i>
                                        </a>
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
