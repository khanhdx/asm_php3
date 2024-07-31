{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')
    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Chi tiết hóa đơn</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('chitietdonhang.index') }}">chitiethoadon</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Chi tiết hóa đơn</h5>
                                        
                                        <form action="{{ route('chitietdonhang.index') }}" method="GET">
                                            @csrf
                                            <div class="input-group">
                                                <select name="searchTrangThai" class="form-select">
                                                    <option value="" selected>Chọn trạng thái</option>
                                                    <option value="1">Hiển thị</option>
                                                    <option value="0">Ẩn</option>
                                                </select>
                                                <input type="text" class="form-select" name="search"
                                                    placeholder="Tìm hiếm....">
                                                <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
                                            </div>
                                        </form>
                                        <a href="{{ route('chitietdonhang.create') }}" class="btn btn-info btn-sm">Tạo
                                            mới</a>
                                        <a href="" class="btn btn-info btn-sm">Quay lại</a>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Số lượng</th>
                                                        <th>Gía</th>
                                                        <th>Thành tiền</th>
                                                        <th>Hành động </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($chi_tiet_don_hangs as $index => $item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $item->donHang->ma_don_hang }}</td>
                                                            <td>{{ $item->sanPham->ten_san_pham }}</td>
                                                            <td>{{ $item->so_luong }}</td>
                                                            <td>{{ $item->gia }}</td>
                                                            <td>{{ $item->thanh_tien }}</td>
                                                            <td>
                                                                <a href="{{ route('chitietdonhang.edit', $item->id) }}">
                                                                    <button class="btn btn-warning">Sửa</button>
                                                                </a>
                                                                <form
                                                                    action="{{ route('chitietdonhang.destroy', $item->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        onclick="return confirm('bạn có muốn xóa không?')"
                                                                        class="btn btn-danger">Xóa</button>
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
