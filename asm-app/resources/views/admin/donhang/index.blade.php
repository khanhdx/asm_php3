{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')

<h2 class="fw-bold">Quản lý đơn hàng</h2>
    <div class="card">
        <h4 class="card-header">Danh sách đơn hàng</h4>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <a href="{{ route('donhang.create') }}" class="btn btn-success mb-3">Thêm đơn hàng</a>
                <form action="{{ route('donhang.index') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <select name="searchTrangThai" class="form-select">
                            <option value="" selected>Chọn trạng thái</option>
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                        <input type="text" class="form-control" name="search" placeholder="Tìm hiếm....">
                        <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
    {{--  --}}
    
    {{-- Hiển thị thông báo --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên người nhận</th>
                    <th>Email người nhận</th>
                    <th>Số điện thoại người nhận</th>
                    <th>Địa chỉ người nhận</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái </th>
                    <th>Hành động </th>
                </thead>
                <tbody>
                    @foreach ($don_hangs as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->ma_don_hang }}</td>
                            <td>{{ $item->ten_nguoi_nhan }}</td>
                            <td>{{ $item->email_nguoi_nhan }}</td>
                            <td>{{ $item->so_dien_thoai_nguoi_nhan }}</td>
                            <td>{{ $item->dia_chi_nguoi_nhan }}</td>
                            <td>{{ $item->ngay_dat }}</td>
                            <td>{{ $item->tong_tien }}</td>
                            <td>{{ $item->ghi_chu }}</td>
                            <td>{{ $item->trangThaiDonHang->ten_trang_thai }}</td>
                            <td>
                                <a href="{{ route('donhang.edit', $item->id) }}">
                                    <button class="btn btn-warning">Sửa</button>
                                </a>
                                <form action="{{ route('donhang.destroy', $item->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('bạn có muốn xóa không?')"
                                        class="btn btn-danger">Xóa</button>
                                </form>
                                <a href="{{ route('chitietdonhang.index')}}">
                                    <button class="btn btn-warning">Chi tiết đơn hàng</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection




