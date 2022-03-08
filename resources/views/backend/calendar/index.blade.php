<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @include('layouts/__head')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/calendars/tui-time-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/calendars/tui-date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/calendars/tui-calendar.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/calendars/app-calendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/calendar-custom.css')}}">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns calendar-application navbar-sticky footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    @include('layouts/__header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts/__sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- calendar Wrapper  -->
                <div class="calendar-wrapper position-relative">
                    <!-- calendar app overlay -->
                    <div class="app-content-overlay"></div>
                    <!-- calendar sidebar start -->
                    <div id="sidebar" class="sidebar">
                        <div class="sidebar-new-schedule">
                            <!-- create new schedule button -->
                            <button id="btn-new-schedule" type="button"
                                class="btn btn-primary btn-block sidebar-new-schedule-btn">
                                New schedule
                            </button>
                        </div>
                        <!-- sidebar calendar labels -->
                        <div id="sidebar-calendars" class="sidebar-calendars">
                            <div>
                                <div class="sidebar-calendars-item">
                                    <!-- view All checkbox -->
                                    <div class="checkbox">
                                        <input type="checkbox" class="checkbox-input tui-full-calendar-checkbox-square"
                                            id="checkbox1" value="all" checked>
                                        <label for="checkbox1">View all</label>
                                    </div>
                                </div>
                            </div>
                            <div id="calendarList" class="sidebar-calendars-d1"></div>
                        </div>
                        <!-- / sidebar calendar labels -->
                    </div>
                    <!-- calendar sidebar end -->
                    <!-- calendar view start  -->
                    <div class="calendar-view">
                        <div class="calendar-action d-flex align-items-center flex-wrap">
                            <!-- sidebar toggle button for small sceen -->
                            <button class="btn btn-icon sidebar-toggle-btn">
                                <i class="bx bx-menu font-large-1"></i>
                            </button>
                            <!-- dropdown button to change calendar-view -->
                            <div class="dropdown d-inline mr-75">
                                <button id="dropdownMenu-calendarType" class="btn btn-action dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i id="calendarTypeIcon" class="bx bx-calendar-alt"></i>
                                    <span id="calendarTypeName">Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu"
                                    aria-labelledby="dropdownMenu-calendarType">
                                    <li role="presentation">
                                        <a class="dropdown-menu-title dropdown-item" role="menuitem"
                                            data-action="toggle-daily">
                                            <i class="bx bx-calendar-alt mr-50"></i>
                                            <span>Ngày</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a class="dropdown-menu-title dropdown-item" role="menuitem"
                                            data-action="toggle-weekly">
                                            <i class='bx bx-calendar-event mr-50'></i>
                                            <span>Tuần</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a class="active dropdown-menu-title dropdown-item" role="menuitem"
                                            data-action="toggle-monthly">
                                            <i class="bx bx-calendar mr-50"></i>
                                            <span>Tháng</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a class="dropdown-menu-title dropdown-item" role="menuitem"
                                            data-action="toggle-weeks2">
                                            <i class='bx bx-calendar-check mr-50'></i>
                                            <span>2 tuần</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a class="dropdown-menu-title dropdown-item" role="menuitem"
                                            data-action="toggle-weeks3">
                                            <i class='bx bx-calendar-check mr-50'></i>
                                            <span>3 tuần</span>
                                        </a>
                                    </li>
                                    {{-- <li role="presentation" class="dropdown-divider"></li>
                                    <li role="presentation">
                                        <div role="menuitem" data-action="toggle-workweek" class="dropdown-item">
                                            <input type="checkbox" class="tui-full-calendar-checkbox-square"
                                                value="toggle-workweek" checked>
                                            <span class="checkbox-title bg-primary"></span>
                                            <span>Hiển thị ngày cuối tuần</span>
                                        </div>
                                    </li>
                                    <li role="presentation">
                                        <div role="menuitem" data-action="toggle-start-day-1" class="dropdown-item">
                                            <input type="checkbox" class="tui-full-calendar-checkbox-square"
                                                value="toggle-start-day-1">
                                            <span class="checkbox-title"></span>
                                            <span>Bắt đầu từ thứ 2</span>
                                        </div>
                                    </li>
                                    <li role="presentation">
                                        <div role="menuitem" data-action="toggle-narrow-weekend" class="dropdown-item">
                                            <input type="checkbox" class="tui-full-calendar-checkbox-square"
                                                value="toggle-narrow-weekend">
                                            <span class="checkbox-title"></span>
                                            <span>Narrower than weekdays</span>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- calenadar next and previous navigate button -->
                            <span id="menu-navi" class="menu-navigation">
                                <button type="button" class="btn btn-action move-today mr-50 px-75"
                                    data-action="move-today">Hôm nay</button>
                                <button type="button" class="btn btn-icon btn-action  move-day mr-50 px-50"
                                    data-action="move-prev">
                                    <i class="bx bx-chevron-left" data-action="move-prev"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-action move-day mr-50 px-50"
                                    data-action="move-next">
                                    <i class="bx bx-chevron-right" data-action="move-next"></i>
                                </button>
                            </span>
                            <span id="renderRange" class="render-range"></span>
                        </div>
                        <!-- calendar view  -->
                        <div id="calendar" class="calendar-content"></div>
                    </div>
                    <!-- calendar view end  -->
                </div>
            </div>
            <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="type" class="col-form-label">Kiểu lịch trình:</label>
                                    <select id="type" class="form-control">
                                        <option value="">Thông thường</option>
                                        <option value="">lặp lại</option>
                                    </select>
                                </div>
                                <div class="col-md-6 row active" style="display: none">
                                    <div class="col-md-6">
                                        <div class="w-100 d-flex align-items-center">
                                            <input type="radio" id="dayweek" name="pattern" value="2">
                                            <label for="dayweek" class="col-form-label ml-1 mb-0" style="white-space:nowrap">Ngày trong tuần</label>
                                        </div>
                                        <div class="w-100 d-flex align-items-center">
                                            <select name="wday" id="wday" class="form-control">
                                                <option value="all" disabled selected>Chọn</option>
                                                <option value="">Thứ 2</option>
                                                <option value="">Thứ 3</option>
                                                <option value="">Thứ 4</option>
                                                <option value="">Thứ 5</option>
                                                <option value="">Thứ 6</option>
                                                <option value="">Thứ 7</option>
                                                <option value="">CN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="w-100 d-flex align-items-center">
                                            <input type="radio" id="daymonth" name="pattern" value="3">
                                            <label for="daymonth" class="col-form-label ml-1 mb-0" style="white-space:nowrap">Ngày trong tháng</label>
                                        </div>
                                        <div class="w-100 d-flex align-items-center">
                                            <select name="mday" id="mday" class="form-control">
                                                <option value="all" disabled selected>Chọn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group active" id="day-repeat-selected">
                                <span class="border rounded bg-primary text-white" style="padding: 0.5rem">Thứ 2</span>
                                <span class="border rounded bg-primary text-white" style="padding: 0.5rem">Thứ 3</span>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-form-label">Lịch trình:</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="date-from" class="col-form-label">Từ:</label>
                                    <input type="datetime-local" class="form-control" id="date-from">
                                </div>
                                <div class="col-md-6">
                                    <label for="date-to" class="col-form-label">Đến:</label>
                                    <input type="datetime-local" class="form-control" id="date-to">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="location" class="col-form-label">Địa điểm:</label>
                                    <input type="text" class="form-control" id="location">
                                </div>
                                <div class="col-md-6">
                                    <label for="meeting-room" class="col-form-label">Phòng họp:</label>
                                    <select id="meeting-room" class="form-control">
                                        <option value="">phòng họp 1</option>
                                        <option value="">phòng họp 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="attendees" class="col-form-label">Tham gia:</label>
                                    <select id="attendees" class="form-control">
                                        <option value="all" disabled selected>Chọn người tham gia</option>
                                        <option value="2">Nguyễn Thành lam</option>
                                        <option value="3">Nguyễn Công Thành</option>
                                    </select>
                                    <div class="attendees d-flex flex-wrap mt-1">
                                        <a class="attendee-box mr-1" data-attendee-id="1" data-attendee-name="Nguyễn Tuấn Anh">
                                            <span>Nguyễn Tuấn Anh</span>
                                            <button class="border border-0 bg-white" aria-hidden="true">&times;</button>
                                        </a>
                                        <a class="attendee-box mr-1" data-attendee-id="4" data-attendee-name="Nguyễn Trình Tình">
                                            <span>Nguyễn Trình Tình</span>
                                            <button class="border border-0 bg-white" aria-hidden="true">&times;</button>
                                        </a>
                                        <a class="attendee-box mr-1" data-attendee-id="5" data-attendee-name="Lê Văn A">
                                            <span>Lê Văn A</span>
                                            <button class="border border-0 bg-white" aria-hidden="true">&times;</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="col-form-label">Phân loại:</label>
                                    <select id="type" class="form-control">
                                        <option value="">Gặp khách hàng</option>
                                        <option value="">Ăn tất niên</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Mô tả:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary final-button" data-dismiss="modal"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @include('layouts/__footer')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('assets/vendors/js/calendar/tui-code-snippet.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/calendar/tui-dom.js')}}"></script>
    <script src="{{asset('assets/vendors/js/calendar/tui-time-picker.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/calendar/tui-date-picker.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/calendar/chance.min.js')}}"></script>
    <script src="{{asset('assets/vendors/js/calendar/tui-calendar.min.js')}}"></script>
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> --}}
    <script src="{{asset('assets/js/scripts/pages/custom-calendar.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{{asset('assets/js/scripts/extensions/calendar/calendars-data.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts/extensions/calendar/schedules.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts/extensions/calendar/app-calendar.min.js')}}"></script> --}}
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

<!-- Mirrored from www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template-semi-dark/app-calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Dec 2021 09:12:52 GMT -->

</html>
