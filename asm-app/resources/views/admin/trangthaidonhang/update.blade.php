{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')
    <div class="card">
        <h4 class="card-header">Thêm trạng thái</h4>
        <div class="card-body">
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
@endsection
