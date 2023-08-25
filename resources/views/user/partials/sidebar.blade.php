<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-1   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header d-flex flex-column" style="height: 27rem">
        <div>
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <img src="{{ asset('user/assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Trang cá nhân</span>
            </a>
        </div>
        <div class="ps-3 pe-3">
            <img class="rounded-circle" style="height: 210px" alt="avatar1" src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" />
        </div>
        

        <div class="ps-3 pe-3 mt-3 mb-3">
            <a class="btn btn-success w-100" style="text-transform: none" href="{{ route('portal.ot') }}">Đăng ký OT</a>
            <a class="btn btn-warning w-100" style="text-transform: none" href="{{ route('portal.nghi') }}">Đăng ký nghỉ</a>
        </div>

    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('portal/information') ? 'active bg-gradient-primary' : ''}}" href="{{ route('portal.infomation') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Thông tin chung</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('portal/month-labours') ? 'active bg-gradient-primary' : ''}}" href="{{ route('portal.labour') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Bảng công tháng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('portal/salary') ? 'active bg-gradient-primary' : ''}}" href="{{ route('portal.salary')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Bảng lương tháng</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
