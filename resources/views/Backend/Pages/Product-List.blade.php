@extends('Backend.Layout.Master-Layout')
@section('Content')
    <div class="tab-pane fade show active" id="productList">
        <div class="d-flex align-items-center justify-content-center mb-4">
            <div class="p-icon-box-small me-3">
                <i class="fas fa-box"></i>
            </div>
            <h4 class="fw-bold mb-0 bangla-text">পণ্য <span class="text-primary-gradient">তালিকা</span></h4>
        </div>

        <div class="card ot-card-modern border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table ot-table mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>ক্র.নং</th>
                                <th>পণ্য নাম</th>
                                <th>ক্যাটাগরি</th>
                                <th>স্ট্যাটাস</th>
                                <th>মূল্য</th>
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="text-center">
                                    <td data-label="ক্র.নং">
                                        <span class="d-block fw-bold text-dark">{{ $loop->iteration }}</span>
                                    </td>
                                    <td data-label="পণ্য নাম">
                                        <div class="d-flex align-items-center">
                                            <div class="ot-img-container me-3">
                                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100"
                                                    alt="product">
                                            </div>
                                            <div>
                                                <span class="fw-600 text-secondary">{{ $product->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="ক্যাটাগরি">
                                        <span class="fw-bold text-secondary">{{ $product->category }}</span>
                                    </td>
                                    <td data-label="স্ট্যাটাস">
                                        <span class="ot-badge status-success">{{ $product->stock_status }}</span>
                                    </td>
                                    <td data-label="মূল্য">
                                        <span class="ot-badge">{{ $product->price }}</span>
                                    </td>
                                    <td data-label="অ্যাকশন">
                                        <a href="{{ route('product.view', $product->id) }}" class="ot-btn-view" title="View">
                                            <i class="fas fa-eye me-1"></i>
                                        </a>
                                        <a href="{{ route('product.edit', $product->id) }}" class="ot-btn-edit" title="Edit">
                                            <i class="fa-solid fa-pen-to-square me-1"></i>
                                        </a>
                                        <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ot-btn-delete" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                        </form>
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
