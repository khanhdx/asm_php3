{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')
    <div class="card">
        <h4 class="card-header">Thêm sản phẩm</h4>
        <div class="card-body">
            <form action="{{ route('donhang.store') }}" method="post" enctype="multipart/form-data">
                {{-- csrf là cơ chế bảo mật trong form --}}
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Mã đơn hàng:</label>
                    <input type="text" class="form-control" name="ma_don_hang" placeholder="Nhập mã đơn hàng">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tên người nhận:</label>
                    <input type="text" class="form-control" name="ten_nguoi_nhan" placeholder="Nhập Tên người nhận">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email người nhận:</label>
                    <input type="email" class="form-control" name="email_nguoi_nhan" placeholder="Nhập Email người nhận">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Số điện thoại người nhận:</label>
                    <input type="text" class="form-control" name="so_dien_thoai_nguoi_nhan" placeholder="Nhập Số điện thoại người nhận">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Địa chỉ người nhận:</label>
                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan" placeholder="Nhập Địa chỉ người nhận">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ngày đặt:</label>
                    <input type="date" class="form-control" name="ngay_dat">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tổng tiền:</label>
                    <input type="text" class="form-control" name="tong_tien" placeholder="Nhập Tổng tiền">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ghi chú:</label>
                    <textarea class="form-control" rows="3" name="ghi_chu" placeholder="Nhập ghi chú"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Trạng thái đơn hàng:</label>
                    <select class="form-select" name="trang_thai_id">
                        @foreach ($trang_thai_don_hangs as $item)
                        <option value="{{ $item->id }}">{{ $item->ten_trang_thai }}</option>      
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button class="btn btn-success">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
