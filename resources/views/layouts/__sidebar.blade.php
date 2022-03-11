<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <div class="brand-logo">
                        <img class="logo" src="{{ asset('assets/images/logo/logo.png') }}" alt="avatar"
                            width="50px" height="auto">
                        <title>icon</title>
                    </div>
                    <!-- <h2 class="brand-text mb-0">Frest</h2> -->
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i
                        class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary"
                        data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
            data-icon-style="lines">
            <li class=" navigation-header text-truncate"><span data-i18n="Apps">Trang chủ</span>
            </li>
            <li class=" nav-item"><a href="/home"><i class="fal fa-home"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Trang chủ</span></a>
            </li>
            <li class=" navigation-header text-truncate"><span data-i18n="Apps">Nhân sự</span>
            </li>
            <li class=" nav-item"><a href="{{ route('admin.position.index') }}"><i
                        class="fal fa-poll-people"></i><span class="menu-title text-truncate" data-i18n="Email">Quản lý
                        chức vụ</span></a>
            </li>
            <li class=" nav-item"><a href="/department"><i class="fal fa-users-class"></i><span
                        class="menu-title text-truncate" data-i18n="Chat">Quản lý phòng ban</span></a>
            </li>
            <li class=" nav-item"><a href="/employee"><i class="fal fa-users"></i><span
                        class="menu-title text-truncate" data-i18n="Todo">Quản lý nhân viên</span></a>
            </li>
            <li class=" navigation-header text-truncate"><span data-i18n="Apps">File</span>
            </li>
            <li class=" nav-item"><a href="{{ route('admin.file.index', 0) }}"><i
                        class="fal fa-folder-tree"></i><span class="menu-title text-truncate" data-i18n="Todo">Quản lý
                        file</span></a>
            </li>
            <li class=" navigation-header text-truncate"><span data-i18n="Apps">Lịch trình</span>
            </li>
            {{-- <li class=" nav-item"><a href="{{ route('admin.calendar.index', 0) }}"><i class="fal fa-calendar"></i><span
                        class="menu-title text-truncate" data-i18n="Todo">Quản lý lịch trình</span></a>
            </li> --}}
            <li class=" nav-item">
                <a href="javascript:void(0)">
                    <i class="fal fa-calendar"></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Quản lý lịch trình</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('admin.calendar.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate" data-i18n="Invoice List">Lịch trình</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('admin.calendar.type') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate" data-i18n="Invoice List">Loại lịch trình</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('admin.calendar.meeting') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate" data-i18n="Invoice List">Phòng họp</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header text-truncate"><span data-i18n="Apps">Công việc</span>
            </li>
            <!-- <li class=" nav-item"><a href="/project-type"><i class="fa-solid fa-bars-progress"></i><span
                        class="menu-title text-truncate" data-i18n="Todo">Quản lý loại dự án</span></a>
            </li> -->
            <li class=" nav-item"><a href="/project"><i class="fal fa-project-diagram"></i><span
                        class="menu-title text-truncate" data-i18n="Todo">Quản lý dự án</span></a>
            </li>
            <li class=" nav-item"><a href="/task"><i class="fal fa-briefcase"></i><span
                        class="menu-title text-truncate" data-i18n="Todo">Quản lý công việc</span></a>
            </li>
            <!-- <li class=" nav-item"><a href="/problem"><i class="fal fa-exclamation-square"></i><span
                        class="menu-title text-truncate" data-i18n="Todo">Quản lý vấn đề</span></a>
            </li> -->
            <li class=" navigation-header text-truncate"><span data-i18n="Apps">Khách hàng</span>
            </li>
            {{-- <li class=" nav-item"><a href="{{ route('admin.customer.index') }}"><i class="fal fa-angel"></i><span
                        class="menu-title text-truncate" data-i18n="Todo">Quản lý khách hàng</span></a>
            </li> --}}

            <li class=" nav-item">
                <a href="{{ route('admin.customer.index') }}">
                    <i class="fal fa-angel"></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">CRM</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('admin.customer_type.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate" data-i18n="Invoice List">Loại khách hàng</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ route('admin.customer.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate" data-i18n="Invoice List">Khách hàng</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="{{ route('admin.contract.index') }}">
                    <i class="fal fa-file-signature"></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Quản lý hợp đồng</span>
                </a>
            </li>
            <li class=" navigation-header text-truncate"><span data-i18n="Apps">Tài khoản</span>
            </li>
            <li class=" nav-item"><a href="{{ route('admin.user.index') }}"><i class="fal fa-user-lock"></i><span
                        class="menu-title text-truncate" data-i18n="Todo">Tài khoản người dùng</span></a>
            </li>

        </ul>
    </div>
</div>
