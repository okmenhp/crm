@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/plugins/forms/validation/form-validation.css">
<link rel="stylesheet" type="text/css" href="assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendors/css/pickers/pickadate/pickadate.css">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/pages/app-users.min.css">
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
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Tên tài khoản</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
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
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="" value=""
                                                        name="username">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table mt-1">
                                                    <thead>
                                                        <tr>
                                                            <th>Phân quyền</th>
                                                            <th>Xem</th>
                                                            <th>Thêm</th>
                                                            <th>Sửa</th>
                                                            <th>Xoá</th>
                                                            <th>Duyệt</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Khách hàng</td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox1" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox2"
                                                                        class="checkbox-input"><label
                                                                        for="users-checkbox2"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox3"
                                                                        class="checkbox-input"><label
                                                                        for="users-checkbox3"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox4" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox4"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox13" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox13"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hợp đồng</td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox5"
                                                                        class="checkbox-input"><label
                                                                        for="users-checkbox5"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox6" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox6"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox7"
                                                                        class="checkbox-input"><label
                                                                        for="users-checkbox7"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox8" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox8"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox14" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox14"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Công việc</td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox9" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox9"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox10" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox10"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox11"
                                                                        class="checkbox-input"><label
                                                                        for="users-checkbox11"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox12"
                                                                        class="checkbox-input"><label
                                                                        for="users-checkbox12"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="checkbox"><input type="checkbox"
                                                                        id="users-checkbox15" class="checkbox-input"
                                                                        checked>
                                                                    <label for="users-checkbox15"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
