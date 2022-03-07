@extends('layouts.master')
@section('css')

<!-- @đBEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/jkanban/jkanban.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/editors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/calendars/tui-calendar.min.css')}}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-kanban.css')}}">
<!-- END: Page CSS-->

@stop
@section('content')
<!-- BEGIN: Content-->
<!-- BEGIN: Content-->
<input type="hidden" name="" id="project_id" value="{{$project_id}}">
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Basic Kanban App -->
            <div class="kanban-overlay"></div>
            <section id="kanban-wrapper">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary mb-1" id="add-kanban">
                            <i class='bx bx-add-to-queue mr-50'></i> Thêm danh sách mới
                        </button>
                        <div id="kanban-app"></div>
                    </div>
                </div>

                <!-- User new mail right area -->
                <div class="kanban-sidebar">
                    <div class="card shadow-none quill-wrapper">
                        <div
                            class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
                            <h3 class="card-title">Thông tin công việc</h3>
                            <button type="button" class="close close-icon">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                        <!-- form start -->
                        <form class="edit-kanban-item" >
                            <div class="kanban-edit-content" style="overflow-y: scroll;">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" class="form-control edit-kanban-item-title"
                                            placeholder="kanban Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian bắt đầu</label>
                                        <input type="date" class="form-control edit-kanban-item-date"
                                            placeholder="">
                                    </div>
                                     <div class="form-group">
                                        <label>Thời gian kết thúc</label>
                                        <input type="date" class="form-control edit-kanban-item-date"
                                            placeholder="">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select class="form-control text-white">
                                                    <option class="bg-primary" selected>Đang xử lý</option>
                                                    <option class="bg-danger">Quá hạn</option>
                                                    <option class="bg-success">Hoàn thành</option>
{{--                                                     <option class="bg-info">Info</option> --}}
                                                    <option class="bg-warning">Sắp quá hạn</option>
                                                    <option class="bg-secondary">Chưa xử lý</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Member</label>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar m-0 mr-1">
                                                        <img src="../../../assets/images/portrait/small/avatar-s-20.jpg"
                                                            height="36" width="36" alt="avtar img holder">
                                                    </div>
                                                    <div class="badge-circle badge-circle-light-secondary">
                                                        <i class="bx bx-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tài liệu</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="emailAttach">
                                            <label class="custom-file-label" for="emailAttach">Chọn tài liệu</label>
                                        </div>
                                    </div>
                                  
                                    <!-- Compose mail Quill editor -->
                                    <div class="form-group">
                                        <label>Bình luận</label>
                                        <div class="snow-container border rounded p-1">
                                            <div class="compose-editor"></div>
                                            <div class="d-flex justify-content-end">
                                                <div class="compose-quill-toolbar">
                                                    <span class="ql-formats mr-0">
                                                        <button class="ql-bold"></button>
                                                        <button class="ql-italic"></button>
                                                        <button class="ql-underline"></button>
                                                        <button class="ql-link"></button>
                                                        <button class="ql-image"></button>
                                                        <button
                                                            class="btn btn-sm btn-primary btn-comment ml-25">Bình luận</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="reset"
                                    class="btn btn-light-danger delete-kanban-item d-flex align-items-center mr-1">
                                    <i class='bx bx-trash mr-50'></i>
                                    <span>Xoá</span>
                                </button>
                                <button class="btn btn-primary glow update-kanban-item d-flex align-items-center">
                                    <i class='bx bx-send mr-50'></i>
                                    <span>Xác nhận</span>
                                </button>
                            </div>
                        </form>
                        <!-- form start end-->
                    </div>
                </div>
                <!--/ User Chat profile right area -->
            </section>
            <!--/ Sample Project kanban -->

        </div>
    </div>
</div>
<!-- END: Content-->
@stop
@section('script')

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/vendors/js/jkanban/jkanban.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/editors/quill/quill.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/scripts/pages/app-kanban.js')}}"></script>
<!-- END: Page JS-->

@stop
