{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')
    <div class="card">
        <h4 class="card-header">Thêm danh mục</h4>
        <div class="card-body">
            <form action="{{ route('danhmuc.store') }}" method="post" enctype="multipart/form-data">
                {{-- csrf là cơ chế bảo mật trong form --}}
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" name="hinh_anh">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Tên danh mục:</label>
                    <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập Tên danh mục">
                </div>
                
                <div class="mb-3">
                    <label for="" class="form-label">Mô tả:</label>
                    <textarea class="form-control" rows="3" name="mo_ta" placeholder="Nhập mô tả danh mục"></textarea>
                </div>
                
                <div class="mb-3 d-flex justify-content-center">
                    <button class="btn btn-success">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
