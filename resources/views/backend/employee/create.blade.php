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
                                <!-- users edit account form start -->
                                <form class="form-validate" method="post" action="{{route('admin.employee.store')}}">

                                    <div class="row">
                                        <div class="col-2 col-sm-2 mt-1">
                                            <div class="form-group">
                                                <div class="controls row">
                                                   <img height="200px" width="200px" src="{{asset('assets/images/profile/account.png')}}" class="img-thumbnail ml-1" alt="...">
                                                   <div class="mb-3 ml-1">
                                                      <input class="form-control" type="file" id="formFile">
                                                    </div>
                                                    {!! $errors->first('avatar', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-10 col-sm-10 row">
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Tên nhân viên<span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control"
                                                         value="" name="name">
                                                         {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Email<span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control"
                                                         value="" name="email">
                                                         {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Ngày sinh<span class="text-danger"> *</span></label>
                                                    <input type="date" class="form-control"
                                                         value="" name="birthday">
                                                         {!! $errors->first('date', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" class="form-control"
                                                         value="" name="phone">
                                                         {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Mã nhân viên <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        value="" name="code">
                                                        {!! $errors->first('code', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Mã chấm công </label>
                                                    <input type="text" class="form-control"
                                                         value="" name="checkin_code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Chọn phòng ban <span class="text-danger"> *</span></label>
                                                    <select class="form-control" name="department_id">
                                                        {!! $department_html !!}
                                                    </select>
                                                    {!! $errors->first('department_id', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Chọn chức vụ <span class="text-danger"> *</span></label>
                                                    <select class="form-control" name="position_id">
                                                        {!! $position_html !!}
                                                    </select>
                                                    {!! $errors->first('position_id', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Mã số thuế cá nhân </label>
                                                    <input type="text" class="form-control"
                                                         value="" name="tax_code">
                                                         {!! $errors->first('tax_code', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Dân tộc </label>
                                                    <input type="text" class="form-control"
                                                        value="" name="folk">
                                                         {!! $errors->first('folk', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Số cmnd/cccd <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                         value="" name="id_card">
                                                         {!! $errors->first('id_card', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Ngày cấp cmnd/cccd </label>
                                                    <input type="date" class="form-control"
                                                         value="" name="date_range">
                                                         {!! $errors->first('date_range', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Giới tính <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="gender">
                                                        <option value="0">Nam</option>
                                                        <option value="1">Nữ</option>
                                                    </select>
                                                    {!! $errors->first('gender', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Ngày vào </label>
                                                    <input type="date" class="form-control"
                                                         value="" name="day_in">
                                                         {!! $errors->first('day_in', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Người liên hệ </label>
                                                    <input type="text" class="form-control"
                                                         value="" name="contacter">
                                                         {!! $errors->first('contacter', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Số điện thoại người liên hệ </label>
                                                    <input type="text" class="form-control"
                                                         value="" name="contacter_phone">
                                                          {!! $errors->first('contacter_phone', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Mạng xã hội </label>
                                                    <input type="text" class="form-control"
                                                         value="" name="social">
                                                </div>
                                            </div>
                                        </div>

                                       {{--  <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Mô tả</label>
                                                    <textarea name="note" rows="3" placeholder="Nhập mô tả" class=" form-control"></textarea>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <!-- Default checked -->
                                        <div class="col-12 col-sm-12">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked" checked>
                                          <label class="form-check-label" for="flexSwitchCheckChecked">Hoạt động</label>
                                        </div>
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
