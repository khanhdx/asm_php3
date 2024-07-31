<nav class="navbar bg-body-tertiary">
    <form class="container-fluid justify-content-start">
        <a href="{{ route('sanpham.index') }}">
            <button class="btn btn-sm btn-outline-secondary me-2" type="button">Quản lý sản phẩm</button>
        </a>
        <a href="{{ route('danhmuc.index') }}">
            <button class="btn btn-sm btn-outline-secondary me-2" type="button">Quản lý danh mục</button>
        </a>
        <a href="{{ route('user.index') }}">
            <button class="btn btn-sm btn-outline-secondary me-2" type="button">Quản lý tài khoản</button>
        </a>
        <a href="{{ route('donhang.index') }}">
            <button class="btn btn-sm btn-outline-secondary me-2" type="button">Quản lý đơn hàng</button>
        </a>
        <a href="{{ route('chitietdonhang.index') }}">
            <button class="btn btn-sm btn-outline-secondary me-2" type="button">Quản lý chi tiết đơn hàng</button>
        </a>
        <a href="{{ route('trangthaidonhang.index') }}">
            <button class="btn btn-sm btn-outline-secondary me-2" type="button">Quản lý trạng thái đơn hàng</button>
        </a>
        <a href="">
            <button class="btn btn-sm btn-outline-secondary me-2" type="button">Quản lý bình luận</button>
        </a>
    </form>
</nav>
