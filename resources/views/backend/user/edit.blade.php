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
                                <form class="form-validate" method="post" action="{{route('admin.user.update', $record->id)}}">

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
                                                    <label>T??n ng?????i d??ng<span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control"
                                                         value="{{$record->full_name}}" name="full_name">
                                                         {!! $errors->first('full_name', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>T??n t??i kho???n<span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control"
                                                         value="{{$record->username}}" name="username">
                                                         {!! $errors->first('username', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>M???t kh???u<span class="text-danger"> *</span></label>
                                                    <input type="password" class="form-control"
                                                         value="" name="password">
                                                         {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Nh???p l???i m???t kh???u<span class="text-danger"> *</span></label>
                                                    <input type="password" class="form-control"
                                                         value="" name="c_password">
                                                         {!! $errors->first('c_password', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Email<span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control"
                                                         value="{{$record->email}}" name="email">
                                                         {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Ng??y sinh<span class="text-danger"> *</span></label>
                                                    <input type="date" class="form-control"
                                                         value="{{$record->birthday}}" name="birthday">
                                                         {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>S??? ??i???n tho???i</label>
                                                    <input type="text" class="form-control"
                                                         value="{{$record->phone}}" name="phone">
                                                         {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>M?? ng?????i d??ng <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        value="{{$record->code}}" name="code">
                                                        {!! $errors->first('code', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Ch???n ph??ng ban <span class="text-danger"> *</span></label>
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
                                                    <label>Ch???n ch???c v??? <span class="text-danger"> *</span></label>
                                                    <select class="form-control" name="position_id">
                                                        {!! $position_html !!}
                                                    </select>
                                                    {!! $errors->first('position_id', '<span class="text-danger">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                       
                                    
                                        

                                        <!-- Default checked -->
                                        <div class="col-12 col-sm-12">
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked" checked>
                                          <label class="form-check-label" for="flexSwitchCheckChecked">Ho???t ?????ng</label>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">L??u thay
                                                ?????i</button>
                                            <button type="reset" class="btn btn-light">Tho??t</button>
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
