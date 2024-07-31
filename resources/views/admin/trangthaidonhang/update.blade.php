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
                        <h5>Trạng thái đơn hàng</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('trangthaidonhang.index') }}">Trạng thái đơn hàng</a> </li>
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
                                    <h5>Cập nhật </h5>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('trangthaidonhang.update', $trangThaiDonHang->id) }}" method="POST" enctype="multipart/form-data">
                                        {{-- csrf là cơ chế bảo mật trong form --}}
                                        @method('put')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tên trạng thái:</label>
                                            <input type="text" class="form-control" name="ten_danh_muc" value="{{$trangThaiDonHang->ten_trang_thai}}" placeholder="Nhập Tên trạng thái">
                                        </div>
                                        <div class="mb-3 d-flex justify-content-center">
                                            <button class="btn btn-success">Cập nhật</button>
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
@endsection
