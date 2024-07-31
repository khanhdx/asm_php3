{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')
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
