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
                                    <h5>Thêm mới</h5>
                                </div>
                                <div class="card-block">
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
