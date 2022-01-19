<!DOCTYPE html>
<!--
Template Name: Frest HTML Admin Template
Author: :Pixinvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/pixinvent_portfolio
Renew Support: https://1.envato.market/pixinvent_portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<!-- Mirrored from www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template-semi-dark/app-file-manager.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Dec 2021 09:13:05 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>File Manager Application - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/semi-dark-layout.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-file-manager.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

    <!-- BEGIN: Font-awesome CSS-->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <!-- END: Font-awesome CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern semi-dark-layout content-left-sidebar file-manager-application navbar-sticky footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
  <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i
                                        class="ficon bx bx-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html"
                                    data-toggle="tooltip" data-placement="top" title="Email"><i
                                        class="ficon bx bx-envelope"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html"
                                    data-toggle="tooltip" data-placement="top" title="Chat"><i
                                        class="ficon bx bx-chat"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html"
                                    data-toggle="tooltip" data-placement="top" title="Todo"><i
                                        class="ficon bx bx-check-circle"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html"
                                    data-toggle="tooltip" data-placement="top" title="Calendar"><i
                                        class="ficon bx bx-calendar-alt"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
                                        class="ficon bx bx-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="bx bx-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Frest..."
                                        tabindex="0" data-search="template-search">
                                    <ul class="search-list"></ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon bx bx-fullscreen"></i></a></li>
                        <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                class="ficon bx bx-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                            <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1"
                                data-search="template-search">
                            <div class="search-input-close"><i class="bx bx-x"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li> -->
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                href="javascript:void(0);" data-toggle="dropdown"><i
                                    class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span
                                    class="badge badge-pill badge-danger badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span
                                            class="notification-title">7 new Notification</span><span
                                            class="text-bold-400 cursor-pointer">Mark all as read</span></div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img
                                                        src="assets/images/portrait/small/avatar-s-11.jpg" alt="avatar"
                                                        height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Congratulate
                                                        Socrates
                                                        Itumay</span> for work anniversaries</h6><small
                                                    class="notification-text">Mar 15 12:32pm</small>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between read-notification cursor-pointer"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img
                                                        src="assets/images/portrait/small/avatar-s-16.jpg" alt="avatar"
                                                        height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New Message</span>
                                                    received</h6><small class="notification-text">You have 18 unread
                                                    messages</small>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between cursor-pointer"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center py-0">
                                            <div class="media-left pr-0"><img class="mr-1"
                                                    src="assets/images/icon/sketch-mac-icon.png" alt="avatar"
                                                    height="39" width="39"></div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Updates
                                                        Available</span></h6><small class="notification-text">Sketch
                                                    50.2 is
                                                    currently newly added</small>
                                            </div>
                                            <div class="media-right pl-0">
                                                <div class="row border-left text-center">
                                                    <div class="col-12 px-50 py-75 border-bottom">
                                                        <h6 class="media-heading text-bold-500 mb-0">Update</h6>
                                                    </div>
                                                    <div class="col-12 px-50 py-75">
                                                        <h6 class="media-heading mb-0">Close</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between cursor-pointer"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span
                                                        class="avatar-content text-primary font-medium-2">LD</span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New
                                                        customer</span> is
                                                    registered</h6><small class="notification-text">1 hrs ago</small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0);">
                                        <div class="media d-flex align-items-center justify-content-between">
                                            <div class="media-left pr-0">
                                                <div class="media-body">
                                                    <h6 class="media-heading">New Offers</h6>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <div class="custom-control custom-switch">
                                                    <input class="custom-control-input" type="checkbox" checked
                                                        id="notificationSwtich">
                                                    <label class="custom-control-label"
                                                        for="notificationSwtich"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between cursor-pointer"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25"><span
                                                        class="avatar-content"><i
                                                            class="bx bxs-heart text-danger"></i></span></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Application</span>
                                                    has
                                                    been approved</h6><small class="notification-text">6 hrs ago</small>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between read-notification cursor-pointer"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img
                                                        src="assets/images/portrait/small/avatar-s-4.jpg" alt="avatar"
                                                        height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New file</span>
                                                    has
                                                    been uploaded</h6><small class="notification-text">4 hrs ago</small>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between cursor-pointer"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-rgba-danger m-0 mr-1 p-25">
                                                    <div class="avatar-content"><i class="bx bx-detail text-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Finance
                                                        report</span>
                                                    has been generated</h6><small class="notification-text">25 hrs
                                                    ago</small>
                                            </div>
                                        </div>
                                    </a><a class="d-flex justify-content-between cursor-pointer"
                                        href="javascript:void(0);">
                                        <div class="media d-flex align-items-center border-0">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img
                                                        src="assets/images/portrait/small/avatar-s-16.jpg" alt="avatar"
                                                        height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New
                                                        customer</span>
                                                    comment recieved</h6><small class="notification-text">2 days
                                                    ago</small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a
                                        class="dropdown-item p-50 text-primary justify-content-center"
                                        href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name">Pacific</span><span
                                        class="user-status text-muted">Trực tuyến</span></div><span><img class="round"
                                        src="assets/images/portrait/small/logo-account.jpg" alt="avatar" height="40"
                                        width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item"
                                    href="page-user-profile.html"><i class="bx bx-user mr-50"></i> Edit Profile</a><a
                                    class="dropdown-item" href="app-email.html"><i class="bx bx-envelope mr-50"></i> My
                                    Inbox</a><a class="dropdown-item" href="app-todo.html"><i
                                        class="bx bx-check-square mr-50"></i> Task</a><a class="dropdown-item"
                                    href="app-chat.html"><i class="bx bx-message mr-50"></i> Chats</a>
                                <div class="dropdown-divider mb-0"></div><a class="dropdown-item"
                                    href="auth-login.html"><i class="bx bx-power-off mr-50"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                        <div class="brand-logo">
                            <img class="logo" src="assets/images/logo/logo-white.png" alt="avatar" width="80px"
                                height="auto">
                            <title>icon</title>
                            <defs>
                                <lineargradient id="linearGradient-1" x1="50%" y1="0%" x2="50%" y2="100%">
                                    <stop stop-color="#5A8DEE" offset="0%"></stop>
                                    <stop stop-color="#699AF9" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop stop-color="#FDAC41" offset="0%"></stop>
                                    <stop stop-color="#E38100" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Sprite" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="sprite" transform="translate(-69.000000, -61.000000)">
                                    <g id="Group" transform="translate(17.000000, 15.000000)">
                                        <g id="icon" transform="translate(52.000000, 46.000000)">
                                            <path id="Combined-Shape"
                                                d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z">
                                            </path>
                                            <path id="Combined-Shape"
                                                d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5378966 4.74673291,13.1939746 4.7846258,12.8556254 L8.55057141,12.8560055 C8.48653249,13.1896162 8.45300462,13.5340745 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.529522,8.45300462 13.180715,8.48740462 12.8430777,8.55306931 L12.8426531,4.78608796 C13.1851829,4.7472336 13.5334422,4.72727273 13.8863636,4.72727273 Z"
                                                fill="#4880EA"></path>
                                            <path id="Combined-Shape"
                                                d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z"
                                                fill="url(#linearGradient-1)"></path>
                                            <rect id="Rectangle" x="0" y="0" width="7.68181818" height="7.68181818">
                                            </rect>
                                            <rect id="Rectangle" fill="url(#linearGradient-2)" x="0" y="0"
                                                width="7.68181818" height="7.68181818"></rect>
                                        </g>
                                    </g>
                                </g>
                            </g>
                            </svg>
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
                <li class=" nav-item"><a href="#"><i class="fal fa-home"></i><span class="menu-title text-truncate"
                            data-i18n="Email">Trang chủ</span></a>
                </li>
                <li class=" navigation-header text-truncate"><span data-i18n="Apps">Quản lý nhân sự</span>
                </li>
                <li class=" nav-item"><a href="/position"><i class="fal fa-poll-people"></i><span
                            class="menu-title text-truncate" data-i18n="Email">Quản lý chức vụ</span></a>
                </li>
                <li class=" nav-item"><a href="/department"><i class="fal fa-users-class"></i><span
                            class="menu-title text-truncate" data-i18n="Chat">Quản lý phòng ban</span></a>
                </li>
                <li class=" nav-item"><a href="/employee"><i class="fal fa-users"></i><span
                            class="menu-title text-truncate" data-i18n="Todo">Quản lý nhân viên</span></a>
                </li>
                <li class=" navigation-header text-truncate"><span data-i18n="Apps">Quản lý tệp tin</span>
                </li>
                <li class=" nav-item"><a href="/file"><i class="fal fa-folder-tree"></i><span
                            class="menu-title text-truncate" data-i18n="Todo">Quản lý tệp tin</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
    
    <!-- Modal upload -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Upload file</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="{{route('admin.file.upload', $uid)}}" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Vui lòng chọn file</label>
              <input class="form-control" type="file" name="file" id="formFileMultiple" multiple>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
            <button type="submit" class="btn btn-primary">Tải lên</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<!--  End modal upload -->

@d
    <!-- Modal folder -->
    <div class="modal fade" id="modalFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Thêm folder mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="{{route('admin.file.createFolder', $uid)}}">
            @csrf
          <div class="modal-body">
             
            <div class="mb-3">

              <label for="formFileMultiple" class="form-label">Vui lòng nhập tên folder</label>
             <input required="" type="text" name="folder" placeholder="Nhập tên folder" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<!--  End modal upload -->
    

    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="app-file-sidebar sidebar-content d-flex">
                        <!-- App File sidebar - Left section Starts -->
                        <div class="app-file-sidebar-left">
                            <!-- sidebar close icon starts -->
                            <span class="app-file-sidebar-close"><i class="bx bx-x"></i></span>
                            <!-- sidebar close icon ends -->
                            <div class="form-group add-new-file text-center">
                                <!-- Add File Button -->
                                
                                 <button type="submit" style="width: 100%;" class="btn btn-warning mt-2" data-toggle="modal" data-target="#modalFolder">
                                    <i class="bx bx-plus"></i> Folder mới
                                  </button>
                                <button type="submit" style="width: 100%;" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="bx bx-plus"></i> Thêm file
                                  </button>
                                
                            </div>
                            <div class="app-file-sidebar-content">
                                <!-- App File Left Sidebar - Drive Content Starts -->
                                <label class="app-file-label">Quản lý tệp tin</label>
                                <div class="list-group list-group-messages my-50">
                                    <a href="javascript:void(0);"
                                        class="list-group-item list-group-item-action pt-0 active">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-folder"></i>
                                        </div>
                                        Tất cả tệp tin
                                        <span
                                            class="badge badge-light-danger badge-pill badge-round float-right mt-50">2</span>
                                    </a>
                                    <!-- <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-desktop"></i>
                                        </div>
                                        My Devices
                                    </a> -->
                                    <!-- <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-clock"></i>
                                        </div> Recents
                                    </a> -->
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-star"></i>
                                        </div>
                                        Tệp tin quan trọng
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-trash-alt"></i>
                                        </div>
                                        Tệp tin đã xoá
                                    </a>
                                </div>
                                <!-- App File Left Sidebar - Drive Content Ends -->


                                <!-- App File Left Sidebar - Labels Content Starts -->
                                <!-- <label class="app-file-label">Labels</label>
                                <div class="list-group list-group-labels my-50">
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action pt-0">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-file"></i>
                                        </div>
                                        Documents
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-images"></i>
                                        </div>
                                        Images
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-video"></i>
                                        </div> Videos
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-music"></i>
                                        </div>
                                        Audio
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-file-archive"></i>
                                        </div>
                                        Zip Files
                                    </a>
                                </div> -->
                                <!-- App File Left Sidebar - Labels Content Ends -->

                                <!-- App File Left Sidebar - Storage Content Starts -->
                                <label class="app-file-label mb-75">Lưu trữ</label>
                                <div class="d-flex mb-1">
                                    <div class="fonticon-wrap mr-1">
                                        <i class="fal fa-save"></i>
                                    </div>
                                    <div class="file-manager-progress">
                                        <span class="text-muted font-size-small">19.5GB/ 25GB</span>
                                        <div class="progress progress-bar-primary progress-sm mb-0">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="80" aria-valuemax="100" style="width:80%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="javascript:void(0);" class="font-weight-bold">Upgrade Storage</a> -->
                                <!-- App File Left Sidebar - Storage Content Ends -->
                            </div>
                        </div>
                    </div>
                    <!-- App File sidebar - Right section Starts -->
                    <div class="app-file-sidebar-info">
                        <div class="card shadow-none mb-0 p-0 pb-1">
                            <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                                <h6 class="mb-0">Document.pdf</h6>
                                <div class="app-file-action-icons d-flex align-items-center">
                                    <i class="bx bx-trash cursor-pointer mr-50"></i>
                                    <i class="bx bx-x close-icon cursor-pointer"></i>
                                </div>
                            </div>
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                <li class="nav-item mr-1 pt-50 pr-1 border-right">
                                    <a class=" nav-link active d-flex align-items-center" id="details-tab"
                                        data-toggle="tab" href="#details" aria-controls="details" role="tab"
                                        aria-selected="true">
                                        <i class="bx bx-file mr-50"></i>Details</a>
                                </li>
                                <li class="nav-item pt-50 ">
                                    <a class=" nav-link d-flex align-items-center" id="activity-tab" data-toggle="tab"
                                        href="#activity" aria-controls="activity" role="tab" aria-selected="false">
                                        <i class="bx bx-pulse mr-50"></i>Activity</a>
                                </li>
                            </ul>
                            <div class="tab-content pl-0">
                                <div class="tab-pane active" id="details" aria-labelledby="details-tab" role="tabpanel">
                                    <div class="border-bottom d-flex align-items-center flex-column pb-1">
                                        <img src="assets/images/icon/pdf.png" alt="PDF" height="42" width="35"
                                            class="my-1">
                                        <p class="mt-2">15.3mb</p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <label class="app-file-label">Setting</label>
                                        <div class="d-flex justify-content-between align-items-center mt-75">
                                            <p>File Sharing</p>
                                            <div
                                                class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitchGlow1">
                                                <label class="custom-control-label" for="customSwitchGlow1"></label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Synchronization</p>
                                            <div
                                                class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitchGlow2" checked>
                                                <label class="custom-control-label" for="customSwitchGlow2"></label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Backup</p>
                                            <div
                                                class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitchGlow3">
                                                <label class="custom-control-label" for="customSwitchGlow3"></label>
                                            </div>
                                        </div>

                                        <label class="app-file-label">Info</label>
                                        <div class="d-flex justify-content-between align-items-center mt-75">
                                            <p>Type</p>
                                            <p class="font-weight-bold">PDF</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Size</p>
                                            <p class="font-weight-bold">15.6mb</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Location</p>
                                            <p class="font-weight-bold">Files > Documents</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Owner</p>
                                            <p class="font-weight-bold">Elnora Reese</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Modified</p>
                                            <p class="font-weight-bold">September 4 2019</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Opened</p>
                                            <p class="font-weight-bold">July 8, 2019</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Created</p>
                                            <p class="font-weight-bold">July 1, 2019</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane pl-0" id="activity" aria-labelledby="activity-tab" role="tabpanel">
                                    <div class="card-body">
                                        <ul class="timeline mb-0">
                                            <li class="timeline-item timeline-icon-success active">
                                                <div class="timeline-time">Today</div>
                                                <h6 class="timeline-title">You added an item to</h6>
                                                <p class="timeline-text">You added an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/psd.png" alt="PSD" height="30"
                                                        width="25" class="mr-50">Mockup.psd
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-icon-info active">
                                                <div class="timeline-time">10 min ago</div>
                                                <h6 class="timeline-title">You shared 2 times</h6>
                                                <p class="timeline-text">Emily Bennett edited an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/sketch.png" alt="Sketch" height="30"
                                                        width="25" class="mr-50">Template_Design.sketch
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-icon-danger active">
                                                <div class="timeline-time">Mon 10:20 PM</div>
                                                <h6 class="timeline-title">You edited an item</h6>
                                                <p class="timeline-text">You edited an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/pdf.png" alt="document" height="30"
                                                        width="25" class="mr-50">Information.doc
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-icon-primary active">
                                                <div class="timeline-time">Jul 13 2019</div>
                                                <h6 class="timeline-title">You edited an item</h6>
                                                <p class="timeline-text">John Keller edited an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/pdf.png" alt="document" height="30"
                                                        width="25" class="mr-50">Documentation.doc
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-icon-warning">
                                                <div class="timeline-time">Apr 18 2019</div>
                                                <h6 class="timeline-title">You added an item to</h6>
                                                <p class="timeline-text">You edited an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/pdf.png" alt="document" height="30"
                                                        width="25" class="mr-50">Resume.pdf
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- App File sidebar - Right section Ends -->

                </div>
            </div>
            <div class="content-right">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <!-- File Manager app overlay -->
                        <div class="app-file-overlay"></div>
                        <div class="app-file-area">
                            <!-- File App Content Area -->
                            <!-- App File Header Starts -->
                            <div class="app-file-header">
                                <!-- Header search bar starts -->
                                <div class="app-file-header-search flex-grow-1">
                                    <div class="sidebar-toggle d-block d-lg-none">
                                        <i class="bx bx-menu"></i>
                                    </div>
                                    <fieldset class="form-group position-relative has-icon-left m-0">
                                        <input type="text" class="form-control border-0 shadow-none" id="file-search"
                                            placeholder="Tìm kiếm">
                                        <div class="form-control-position">
                                            <i class="bx bx-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <!-- Header search bar Ends -->
                                <!-- Header Icons Starts -->
                                <div class="app-file-header-icons">
                                    <div class="fonticon-wrap d-inline mx-sm-1 align-middle">
                                        <i class="fal fa-user"></i>
                                    </div>
                                    <div class="fonticon-wrap d-inline mr-sm-50 align-middle">
                                        <i class="fal fa-trash-alt"></i>
                                    </div>
                                    <i
                                        class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i>
                                </div>
                                <!-- Header Icons Ends -->
                            </div>
                            <!-- App File Header Ends -->

                            <!-- App File Content Starts -->
                            <div class="app-file-content p-2">
                                <h5>Tất cả tệp tin</h5>

                                <!-- App File - Recent Accessed Files Section Starts -->
                                <!-- <label class="app-file-label">Recently Accessed Files</label>
                                <div class="row app-file-recent-access">
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/pdf.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-recent-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">Felecia
                                                        Resume.pdf</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">12.85kb
                                                    </div>
                                                    <div class="app-file-last-access font-size-small text-muted">Last
                                                        accessed : 3 hours ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/psd.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-content-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Logo_design.psd</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">15.60mb
                                                    </div>
                                                    <div class="app-file-last-access font-size-small text-muted">Last
                                                        accessed : 3 hours ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/doc.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-content-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Music_Two.xyz</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">1.2gb
                                                    </div>
                                                    <div class="app-file-last-access font-size-small text-muted">Last
                                                        accessed : 3 hours ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <i
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
                                                <img class="d-block mx-auto" src="assets/images/icon/sketch.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-content-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Application.sketch</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">92.83kb
                                                    </div>
                                                    <div class="app-file-last-access font-size-small text-muted">Last
                                                        accessed : 3 hours ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- App File - Recent Accessed Files Section Ends -->

                                <!-- App File - Folder Section Starts -->
                                <label class="app-file-label">Thư mục</label>
                                <div class="row app-file-folder">
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Project</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">2
                                                            files, 14.05mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Video</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">130
                                                            files, 890mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Music</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">15
                                                            files, 58mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Documents</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">12
                                                            files, 9.5mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Application Design</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">1
                                                            files, 36.25kb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Photos</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">
                                                            3.6k files, 348mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- App File - Folder Section Ends -->

                                <!-- App File - Files Section Starts -->
                                <label class="app-file-label">Tệp tin</label>
                                <div class="row app-file-files">
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/pdf.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Banner.jpg</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">13kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Image File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/psd.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Management.docx</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">15.60mb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Word Document
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/doc.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Thunder.mp3</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">3.4mb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Mp3 File</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <i
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
                                                <img class="d-block mx-auto" src="assets/images/icon/sketch.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Dashboard.sketch</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">108kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Sketch File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/psd.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">Logo.psd
                                                    </div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">10.6kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Photoshop File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <i
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
                                                <img class="d-block mx-auto" src="assets/images/icon/sketch.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Logo_Design.sketch</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">256.5kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Sketch File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/doc.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Bootstrap.xyz</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">0.0kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Unknown File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/pdf.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Read_Me.pdf</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">10.5kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">PDF File</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- App File - Files Section Ends -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    </div>
    <!-- demo chat-->
    <div class="widget-chat-demo">
        <!-- widget chat demo footer button start -->
        <button class="btn btn-primary chat-demo-button glow px-1"><i class="fal fa-comments-alt"></i></button>
        <!-- widget chat demo footer button ends -->
        <!-- widget chat demo start -->
        <div class="widget-chat widget-chat-demo d-none">
            <div class="card mb-0">
                <div class="card-header border-bottom p-0">
                    <div class="media m-75">
                        <a href="JavaScript:void(0);">
                            <div class="avatar mr-75">
                                <img src="assets/images/portrait/small/avatar-s-2.jpg" alt="avtar images" width="32"
                                    height="32">
                                <span class="avatar-status-online"></span>
                            </div>
                        </a>
                        <div class="media-body">
                            <h6 class="media-heading mb-0 pt-25"><a href="javaScript:void(0);">Kiara Cruiser</a></h6>
                            <span class="text-muted font-small-3">Active</span>
                        </div>
                    </div>
                    <div class="heading-elements">
                        <i class="bx bx-x widget-chat-close float-right my-auto cursor-pointer"></i>
                    </div>
                </div>
                <div class="card-body widget-chat-container widget-chat-demo-scroll">
                    <div class="chat-content">
                        <div class="badge badge-pill badge-light-secondary my-1">today</div>
                        <div class="chat">
                            <div class="chat-body">
                                <div class="chat-message">
                                    <p>How can we help? 😄</p>
                                    <span class="chat-time">7:45 AM</span>
                                </div>
                            </div>
                        </div>
                        <div class="chat chat-left">
                            <div class="chat-body">
                                <div class="chat-message">
                                    <p>Hey John, I am looking for the best admin template.</p>
                                    <p>Could you please help me to find it out? 🤔</p>
                                    <span class="chat-time">7:50 AM</span>
                                </div>
                            </div>
                        </div>
                        <div class="chat">
                            <div class="chat-body">
                                <div class="chat-message">
                                    <p>Stack admin is the responsive bootstrap 4 admin template.</p>
                                    <span class="chat-time">8:01 AM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top p-1">
                    <form class="d-flex" onsubmit="widgetChatMessageDemo();" action="javascript:void(0);">
                        <input type="text" class="form-control chat-message-demo mr-75" placeholder="Type here...">
                        <button type="submit" class="btn btn-primary glow px-1"><i
                                class="bx bx-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- widget chat demo ends -->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-left d-inline-block">2022 &copy; Pacific Logistics Group</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
    <script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"></script>
    <script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('assets/js/scripts/configs/vertical-menu-dark.min.js')}}"></script>
    <script src="{{asset('assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts/components.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts/footer.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('assets/js/scripts/pages/app-file-manager.min.js')}}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

<!-- Mirrored from www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template-semi-dark/app-file-manager.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Dec 2021 09:13:06 GMT -->

</html>