<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Nhân sự
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('organization/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('organization/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Tổ chức
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('organization/categories/*') ? 'menu-open' : '' }}">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="nav-icon fa fa-reorder"></i>
                                <p>Quản lý danh mục</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('organization.categories.chucdanh') }}" class="nav-link {{ Request::is('organization/categories/chucdanh') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Chức danh</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('organization.categories.loaihopdong') }}" class="nav-link {{ Request::is('organization/categories/loaihopdong') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Loại hợp đồng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('organization.categories.calamviec') }}" class="nav-link {{ Request::is('organization/categories/calamviec') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Ca làm việc</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('organization.categories.loaichamcong') }}" class="nav-link {{ Request::is('organization/categories/loaichamcong') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Loại chấm công</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('organization.departments.index') }}"
                                class="nav-link {{ Request::is('organization/departments') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý phòng ban</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('organization.positions.index') }}"
                                class="nav-link {{ Request::is('organization/positions') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý vị trí công việc</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Công lương
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('labour-salary.labour') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tổng hợp công</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labour-salary.time-keeping')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tổng hợp OT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labour-salary.total-on-leave')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tổng hợp phép</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labour-salary.on-leave')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tổng hợp nghỉ phép</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('labour-salary.salary')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bảng lương</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Quản trị
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="pages/UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Phân quyền người dùng</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('process.accept-process') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Xây dựng quy trình</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
