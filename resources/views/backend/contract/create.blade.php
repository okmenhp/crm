@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/validation/form-validation.css')}}">
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
                                <form method="post" action="{{route('admin.contract.store')}}">
                                    <div class="row">
                                        <div class="col-6 col-sm-6">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Tên hợp đồng</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nhập tên dự án" value="" name="name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">

                                                    <label>Dự án</label>
                                                    <select class="form-control" name="member_id">
                                                        <option value="">ERP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">

                                                    <label>Khách hàng</label>
                                                    <select class="form-control" name="member_id">
                                                        <option value="">Phạm Quang Minh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="mb-1">
                                                        <h6>Ngày kí kết</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control pickadate"
                                                                placeholder="Chọn ngày ký kết
                                                                " name="start_date">
                                                            <div class="form-control-position">
                                                                <i class='bx bx-calendar'></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">

                                                    <label>Người phụ trách</label>
                                                    <select class="form-control" name="member_id">
                                                        <option value="">Phạm Quang Minh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Phân loại</label>
                                                    <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <h6>Phòng ban</h6>
                                                    <fieldset class="form-group">
                                                        <select class="js-example-basic-multiple" name="department_id[]"
                                                            multiple="multiple" style="width:100%;" required>
                                                            <option>IT</option>
                                                        </select>
                                                    </fieldset>

                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit"
                                                    class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Lưu thay
                                                    đổi</button>
                                                <button type="reset" class="btn btn-light">Thoát</button>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label>Tin nhắn</label>
                                                    <textarea class="form-control" id="basicTextarea" rows="3"
                                                        placeholder="Nhập tin nhắn"></textarea>
                                                </fieldset>
                                            </div>
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
<script src="{{asset('assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/scripts/pages/app-users.min.js')}}"></script>
<scri pt src="{{asset('assets/js/scripts/navs/navs.min.js')}}"></scri>
<script src="{{asset('assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js')}}"></script>
<!-- END: Page JS-->

<script>
$(document).ready(function() {
    $
        ('.js-example-basic-multiple').select2();
});
</script>
@stop
