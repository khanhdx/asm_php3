{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')
    <div class="card">
        <h4 class="card-header">Thêm Trạng thái đơn hàng</h4>
        <div class="card-body">
            <form action="{{ route('trangthaidonhang.store') }}" method="post" enctype="multipart/form-data">
                {{-- csrf là cơ chế bảo mật trong form --}}
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Tên trang thái:</label>
                    <input type="text" class="form-control" name="ten_trang_thai" placeholder="Nhập Tên trang thái">
                </div>     
                <div class="mb-3 d-flex justify-content-center">
                    <button class="btn btn-success">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
