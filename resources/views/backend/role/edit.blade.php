@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-users.min.css')}}">
<!-- END: Page CSS-->
@stop
@extends('layouts.master')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="users-edit">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab"
                                role="tabpanel">
                                <!-- users edit media object start -->
                                <div class="media mb-2">
                                    <a class="mr-2" href="javascript:void(0);">
                                        <img src="assets/images/portrait/small/avatar-s-26.jpg" alt="users avatar"
                                            class="users-avatar-shadow rounded-circle" height="64" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Thông tin nhân viên</h4>
                                        <div class="col-12 px-0 d-flex">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary mr-25">Bắt đầu
                                                thử việc</a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-sm btn-light-secondary mr-25">Nhân
                                                viên chính thức</a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-secondary">Đã nghỉ
                                                việc</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- users edit media object ends -->
                                <!-- users edit account form start -->
                                <form class="form-validate">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Tên nhân viên</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <select class="form-control">
                                                    <option>Nam</option>
                                                    <option>Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Phòng ban</label>
                                                <select class="form-control">
                                                    <option>IT</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Ngày sinh</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Vị trí công việc</label>
                                                <select class="form-control">
                                                    <option>Nhân viên</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Dân tộc</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Điện thoại</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Quốc tịch</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>CMND</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Quản lý</label>
                                                <select class="form-control">
                                                    <option>Nguyễn Ninh</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Tài khoản</label>
                                                <select class="form-control">
                                                    <option>example@gmail.com</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Lưu thay
                                                đổi</button>
                                            <button type="reset" class="btn btn-light">Thoát</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit account form ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
</div>
<!-- END: Content-->
@stop

@section('script')
<!-- BEGIN: Page Vendor JS-->
<script src="assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="assets/js/scripts/pages/app-users.min.js"></script>
<script src="assets/js/scripts/navs/navs.min.js"></script>
<!-- END: Page JS-->
@stop
