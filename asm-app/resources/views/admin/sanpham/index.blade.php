{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')

<h2 class="fw-bold">Quản lý sản phẩm</h2>
    <div class="card">
        <h4 class="card-header">Danh sách sản phẩm</h4>
        <div class="card-body">
            <a href="{{ route('sanpham.create') }}"><button class="btn btn-success">Thêm sản phẩm</button></a>
            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Giá Khuyến mại</th>
                    <th>Ngày nhập</th>
                    <th>Mô tả</th>
                    <th>Danh mục</th>
                    <th>Trạng thái </th>
                    <th>Hành động </th>
                </thead>
                <tbody>
                    @foreach ($san_phams as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->ten_san_pham }}</td>
                            <td>
                                <img src="{{ Storage::url($item->hinh_anh) }}" width="100" height="100" alt="">
                            </td>
                            <td>{{ $item->so_luong }}</td>
                            <td>{{ $item->gia_san_pham }}</td>
                            <td>{{ $item->gia_khuyen_mai }}</td>
                            <td>{{ $item->ngay_nhap }}</td>
                            <td>{{ $item->mo_ta }}</td>
                            <td>{{ $item->ten_danh_muc }}</td>
                            <td>{{ $item->trang_thai }}</td>
                            <td>
                                <a href="{{ route('sanpham.edit', $item->id) }}">
                                    <button class="btn btn-warning">Sửa</button>
                                </a>
                                <form action="{{ route('sanpham.destroy', $item->id) }}" method="post">
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




