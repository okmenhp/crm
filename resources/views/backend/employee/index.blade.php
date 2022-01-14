@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/pages/app-users.min.css">
<!-- END: Page CSS-->
@stop
@extends('layouts.master')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="users-list-wrapper">
                <div class="users-list-filter px-1">
                    <form>
                        <div class="row border rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-verified">Tên nhân viên</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="basicInput"
                                        placeholder="Nhập tên nhân viên">
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-role">Phòng ban</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-role">
                                        <option value="">Chọn phòng ban</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-1">
                                <label for="users-list-role">Tìm kiếm</label>
                                <button type="button" class="btn btn-icon btn-outline-primary btn-search"><i
                                        class="bx bx-search"></i></button>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <a href="/create-employee" type="button" class="btn btn-primary btn-block my-2">
                                    <i class="bx bx-plus"></i>
                                    <span>Thêm mới</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="users-list-table">
                    <div class="card">
                        <div class="card-body">
                            <!-- datatable start -->
                            <div class="table-responsive">
                                <table id="users-list-datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Tên nhân viên</th>
                                            <th>Ngày sinh</th>
                                            <th>Giới tính</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Vị trí công việc</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Dean Stanley</td>
                                            <td>1/1/1999</td>
                                            <td>Nam</td>
                                            <td>0123123212</td>
                                            <td>example@gmail.com</td>
                                            <td>Nhân viên</td>
                                            <td><a href=""><i class="far fa-edit"></i></a>
                                                <a href=""><i class="far fa-trash-alt ml-1"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Dean Stanley</td>
                                            <td>1/1/1999</td>
                                            <td>Nam</td>
                                            <td>0123123212</td>
                                            <td>example@gmail.com</td>
                                            <td>Nhân viên</td>
                                            <td><a href=""><i class="far fa-edit"></i></a>
                                                <a href=""><i class="far fa-trash-alt ml-1"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Dean Stanley</td>
                                            <td>1/1/1999</td>
                                            <td>Nam</td>
                                            <td>0123123212</td>
                                            <td>example@gmail.com</td>
                                            <td>Nhân viên</td>
                                            <td><a href=""><i class="far fa-edit"></i></a>
                                                <a href=""><i class="far fa-trash-alt ml-1"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Dean Stanley</td>
                                            <td>1/1/1999</td>
                                            <td>Nam</td>
                                            <td>0123123212</td>
                                            <td>example@gmail.com</td>
                                            <td>Nhân viên</td>
                                            <td><a href=""><i class="far fa-edit"></i></a>
                                                <a href=""><i class="far fa-trash-alt ml-1"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- datatable ends -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- users list ends -->
        </div>
    </div>
</div>
<!-- END: Content-->
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
                    <button type="submit" class="btn btn-primary glow px-1"><i class="bx bx-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- widget chat demo ends -->
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@stop
@section('script')
<!-- BEGIN: Page Vendor JS-->
<script src="assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<script src="assets/js/scripts/pages/app-users.min.js"></script>
<!-- END: Page JS-->
@stop