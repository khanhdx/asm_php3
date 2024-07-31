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
                        <h5>Product</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Product</a> </li>
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
                                    <h5>Thêm mới </h5>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('sanpham.store') }}" method="post" enctype="multipart/form-data">
                                        {{-- csrf là cơ chế bảo mật trong form --}}
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tên sản phẩm:</label>
                                            <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập Tên sản phẩm">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Hình ảnh:</label>
                                            <input type="file" class="form-control" name="hinh_anh">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Số Lượng:</label>
                                            <input type="number" class="form-control" min="1" name="so_luong" placeholder="Nhập số lượng">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Giá sản phẩm:</label>
                                            <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Giá khuyến mại:</label>
                                            <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mại">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Ngày nhập:</label>
                                            <input type="date" class="form-control" name="ngay_nhap">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mô tả:</label>
                                            <textarea class="form-control" rows="3" name="mo_ta" placeholder="Nhập mô tả sản phẩm"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Danh mục:</label>
                                            <select class="form-select" name="danh_muc_id">
                                                @foreach ($danh_mucs as $item)
                                                <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Trạng thái:</label>
                                            <input type="test" class="form-control" name="trang_thai" placeholder="Nhập trạng thái">
                                        </div>
                                        <div class="mb-3 d-flex justify-content-center">
                                            <button class="btn btn-success">Thêm mới</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


    <div class="card">
        <h4 class="card-header">Thêm sản phẩm</h4>
        <div class="card-body">
            
        </div>
    </div>
@endsection
