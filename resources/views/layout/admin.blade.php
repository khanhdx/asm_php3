<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />
    @include('admin.blocks.header')
    <title>Admin</title>
</head>

<body>
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('admin.blocks.navbar')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('admin.blocks.menu')
                    <!-- Chỗ này để content của Page -->
                    @yield('content')
                    {{-- yield: chỉ định vùng hiển thị nội dung của section --}}
                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer>
        @include('admin.blocks.footer')
    </footer>
    {{-- Những thư viện hoặc file js dùng chung cho toàn bộ dự án mới được phép dùng ở đây --}}
</body>

</html>
