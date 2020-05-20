<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user-secret"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Quản lý</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>


            <!-- Nav Item - News -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('branch.list') }}" >
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Quản lý chi nhánh</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('category.list') }}" class="nav-link collapsed" id="managar_cate">
                    <i class="fas fa-list"></i>
                    <span>Quản lý danh mục</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('brands.index') }}" class="nav-link collapsed">
                    <i class="fas fa-copyright"></i>
                    <span>Quản lý thương Hiệu</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.list') }}" class="nav-link collapsed" >
                    <i class="fas fa-user"></i>
                    <span>Quản lí Người dùng</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('customer.list') }}" class="nav-link collapsed" id="managar_cate">
                    <i class="fas fa-users"></i>
                    <span>Quản lý khách hàng</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('tag.list') }}" class="nav-link collapsed" id="managar_cate">
                    <i class="fas fa-tags"></i>
                    <span>Quản lý thẻ</span>
                </a>
            </li>




            <!-- Nav Item - Log out -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="fas fa-arrow-circle-left"></i>
                <span>Đăng xuất</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
