{{-- extends chỉ định layout được sử dụng --}}
@extends('layout.admin');

{{-- section: định nghĩa nội dung của section --}}
@section('content')

<h2 class="fw-bold">Quản lý danh mục</h2>
    <div class="card">
        <h4 class="card-header">Danh sách danh mục</h4>
        <div class="card-body">
            <a href="{{ route('danhmuc.create') }}"><button class="btn btn-success">Thêm danh mục</button></a>
            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Hành động </th>
                </thead>
                <tbody>
                    @foreach ($danh_mucs as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ Storage::url($item->hinh_anh) }}" width="100" height="100" alt="">
                            </td>
                            <td>{{ $item->ten_danh_muc }}</td>
                            <td>{{ $item->mo_ta }}</td>
                            <td>
                                <a href="{{ route('danhmuc.edit', $item->id) }}">
                                    <button class="btn btn-warning">Sửa</button>
                                </a>
                                <form action="{{ route('danhmuc.destroy', $item->id) }}" method="post">
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




