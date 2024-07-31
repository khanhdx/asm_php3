{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')

<h2 class="fw-bold">Quản lý trạng thái đơn hàng</h2>
<div class="card">
    <h4 class="card-header">Danh sách trạng thái đơn hàng</h4>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <a href="{{ route('trangthaidonhang.create') }}" class="btn btn-success mb-3">Thêm trạng thái đơn hàng</a>
            <form action="{{ route('trangthaidonhang.index') }}" method="GET">
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
                    <th>Tên trạng thái</th>
                    <th>Hành động </th>
                </thead>
                <tbody>
                    @foreach ($trang_thai_don_hangs as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>        
                            <td>{{ $item->ten_trang_thai }}</td>
                            <td>
                                <a href="{{ route('trangthaidonhang.edit', $item->id) }}">
                                    <button class="btn btn-warning">Sửa</button>
                                </a>
                                <form action="{{ route('trangthaidonhang.destroy', $item->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('bạn có muốn xóa không?')"
                                        class="btn btn-danger">Xóa</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection




