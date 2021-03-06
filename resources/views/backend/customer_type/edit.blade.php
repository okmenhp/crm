@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-users.min.css') }}">
    <!-- END: Page CSS-->
@stop
@extends('layouts.master')
@section('content')
    <!-- BEGIN: Content-->
    @if (isset($errors))
        dd($errors)
    @endif
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
                                    <form class="form-validate" method="post"
                                        action="{{ route('admin.customer_type.update', $record->id) }}">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Tên loại khách hàng</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nhập tên loại khách hàng"
                                                            value="{{ $record->name }}" name="name">
                                                        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Mã loại khách hàng</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nhập mã loại khách hàng"
                                                            value="{{ $record->code }}" name="code">
                                                        {!! $errors->first('code', '<span class="text-danger">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label>Mô tả</label>
                                                    <textarea class="form-control" id="basicTextarea" rows="3"
                                                        placeholder="Nhập mô tả">{{ $record->description }}</textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="status" type="checkbox" id=""
                                                        @if ($record->status == 1) checked @endif>
                                                    <label class="form-check-label">Kích hoạt</label>
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

    <!--
            BEGIN: Page JS-->
    <script src="assets/js/scripts/pages/app-users.min.js"></script>
    <script src="assets/js/scripts/navs/navs.min.js"></script>
    <!-- END: Page JS-->
@stop
