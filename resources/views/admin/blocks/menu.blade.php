<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">App</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                <li class>
                    <a href="{{ route('user.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Quản lý User</span>
                    </a>
                </li>

                <li class>
                    <a href="{{ route('danhmuc.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Quản lý Danh mục</span>
                    </a>
                </li>

                <li class>
                    <a href="{{ route('sanpham.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Quản lý Sản phẩm</span>
                    </a>
                </li>

                <li class>
                    <a href="{{ route('donhang.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Quản lý hóa đơn</span>
                    </a>
                </li>

                <li class>
                    <a href="{{ route('chitietdonhang.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Quản lý chi tiết đơn hàng</span>
                    </a>
                </li>

                <li class>
                    <a href="{{ route('trangthaidonhang.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Quản lý trạng thái đơn hàng</span>
                    </a>
                </li>
                <li class>
                    <a href="" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Quản lý bình luận</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


{{-- <nav class="navbar bg-body-tertiary">
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
</nav> --}}