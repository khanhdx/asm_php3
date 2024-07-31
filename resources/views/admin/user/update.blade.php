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
                        <h5>User</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a> </li>
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
                                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                        {{-- csrf là cơ chế bảo mật trong form --}}
                                        @method('put')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Họ tên:</label>
                                            <input type="text" class="form-control" name="ho_ten" value="{{$user->name}}" placeholder="Nhập Họ tên">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email:</label>
                                            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Nhập Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mật khẩu:</label>
                                            <input type="password" class="form-control" name="password" value="{{$user->password}}" placeholder="Nhập Mật khẩu">
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


    <div class="card">
        <h4 class="card-header">Thêm tài khoản</h4>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                {{-- csrf là cơ chế bảo mật trong form --}}
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Họ tên:</label>
                    <input type="text" class="form-control" name="ho_ten" value="{{$user->name}}" placeholder="Nhập Họ tên">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Nhập Email">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu:</label>
                    <input type="password" class="form-control" name="password" value="{{$user->password}}" placeholder="Nhập Mật khẩu">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
