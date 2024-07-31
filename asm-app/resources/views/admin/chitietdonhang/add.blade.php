{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')
    <div class="card">
        <h4 class="card-header">Thêm sản phẩm</h4>
        <div class="card-body">
            <form action="{{ route('chitietdonhang.store') }}" method="post" enctype="multipart/form-data">
                {{-- csrf là cơ chế bảo mật trong form --}}
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">ID đơn hàng:</label>
                    <select class="form-select" name="don_hang_id">
                        @foreach ($don_hangs as $item)
                        <option value="{{ $item->id }}">{{ $item->ma_don_hang }}</option>      
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">ID sản phẩm:</label>
                    <select class="form-select" name="san_pham_id">
                        @foreach ($san_phams as $item)
                        <option value="{{ $item->id }}">{{ $item->ten_san_pham }}</option>      
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Số lượng:</label>
                    <input type="number" class="form-control" min="1" name="so_luong"  placeholder="Nhập Số lượng">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Gía:</label>
                    <input type="text" class="form-control" name="gia" placeholder="Nhập Gía">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Thành Tiền:</label>
                    <input type="text" class="form-control" name="thanh_tien" placeholder="Nhập Thành Tiền">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button class="btn btn-success">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
