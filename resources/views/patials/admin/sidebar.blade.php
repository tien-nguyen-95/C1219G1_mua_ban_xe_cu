<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="javascipt:;">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user-secret"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Quản lý</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>



            @can('boss')
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
                <a href="{{ route('tag.list') }}" class="nav-link collapsed" id="managar_cate">
                    <i class="fas fa-tags"></i>
                    <span>Quản lý thẻ</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('brands.index') }}" class="nav-link collapsed">
                    <i class="fas fa-copyright"></i>
                    <span>Quản lý thương Hiệu</span>
                </a>
            </li>
            @endcan
            @can('culi')
            <li class="nav-item">
                <a href="{{ route('guarantee.list') }}" class="nav-link collapsed" id="managar_cate">
                    <i class="fas fa-list"></i>
                    <span>Bảo hành</span>
                </a>
            </li>
            @endcan
            @can('confirm')
            <li class="nav-item">
                <a href="/products" class="nav-link collapsed">
                    <i class="fas fa-list"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('bill.list') }}" class="nav-link collapsed" id="managar_cate">
                    <i class="fas fa-list"></i>
                    <span>Quản lí hóa đơn</span>
                </a>
            </li>

            @endcan

            @can('admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-user-friends"></i>
                <span>Quản lý người dùng</span>
                </a>

                <div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('staff.list') }}"><i class="fas fa-user-tie"></i> Danh sách nhân viên</a>
                    @can('boss')
                    <a class="collapse-item" href="{{ route('user.list') }}"><i class="fas fa-user"></i> Danh sách tài khoản</a>
                    <a class="collapse-item" href="{{ route('position.list') }}"><i class="fas fa-user-secret"></i> Danh sách chức vụ</a>
                    @endcan
                </div>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('customer.list') }}" class="nav-link collapsed" id="managar_cate">
                    <i class="fas fa-users"></i>
                    <span>Quản lý khách hàng</span>
                </a>
            </li>
            @endcan
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
