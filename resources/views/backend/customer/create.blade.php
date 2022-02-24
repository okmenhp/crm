@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/select/select2.min.css')}}">
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
                                <!-- users edit account form start -->
                                <form class="form-validate">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Tên khách hàng</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Nhập tên khách hàng" value="" name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Loại khách hàng</label>
                                                <select class="form-control">
                                                    <option>Công ty</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Mã số thuế</label>
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
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Skype</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Zalo</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Wechat</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Whatsapp</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Quốc gia</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Người liên lạc</label>
                                                <select class="select2 form-control" multiple="multiple">
                                                    <option value="1">Đặng Thị Hoài</option>
                                                    <option value="2">Phạm Quang Minh</option>
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
<script src="assets/js/scripts/forms/select/form-select2.min.js"></script>
<!--
END:
Page JS-->
@stop
