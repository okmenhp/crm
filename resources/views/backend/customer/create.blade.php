@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-users.min.css') }}">
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
                                    <form class="form-validate" method="post"
                                        action="{{ route('admin.customer.store') }}">
                                        <div class="row">
                                            <div class="col-6 col-sm-6">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Kh??ch h??ng <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="name">
                                                            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Lo???i kh??ch h??ng <span class="text-danger">*</span></label>
                                                        <select class="select2 form-control" name="customer_type_id">
                                                            {{-- <option value="">Ch???n lo???i kh??ch h??ng</option> --}}
                                                            @foreach ($customer_type_array as $key => $customer_type)
                                                                <option value="{{ $customer_type->id }}">
                                                                    {{ $customer_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <select class="form-control">
                                                        <option>C??ng ty</option>
                                                        <option>C?? nh??n</option>
                                                        <option>...</option>
                                                    </select> --}}
                                                        {!! $errors->first('customer_type_id', '<span class="text-danger">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>M?? s??? thu???</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="tax_number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>??i???n tho???i</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="phone_number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Skype</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="skype">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6 col-sm-6">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Zalo</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="zalo">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Wechat</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="wechat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Whatsapp</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="whatsapp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>?????a ch???</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="" name="address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Qu???c gia</label>
                                                            <select class="select2 form-control" name="country_id">
                                                                <option value="">Ch???n qu???c gia</option>
                                                                @foreach ($country_array as $key => $country)
                                                                    <option value="{{ $country->id }}">
                                                                        {{ $country->country_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label>Tin nh???n</label>
                                                        <textarea class="form-control" id="basicTextarea" rows="3"
                                                            placeholder="Nh???p tin nh???n"></textarea>
                                                    </fieldset>
                                                </div> --}}
                                            </div>
                                        </div>
                                        {{-- <div id="basic-datatable">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body card-dashboard">
                                                            <div class="table-responsive">
                                                                <table class="table zero-configuration">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Id</th>
                                                                            <th>Ng?????i li??n l???c</th>
                                                                            <th>S??T</th>
                                                                            <th>Gi???i t??nh</th>
                                                                            <th>Ch???c v???</th>
                                                                            <th>Thao t??c</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>2</td>
                                                                            <td>Project</td>
                                                                            <td>
                                                                                3
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>Id</th>
                                                                            <th>Ng?????i li??n l???c</th>
                                                                            <th>S??T</th>
                                                                            <th>Gi???i t??nh</th>
                                                                            <th>Ch???c v???</th>
                                                                            <th>Thao t??c</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">L??u
                                                thay
                                                ?????i</button>
                                            <button type="reset" class="btn btn-light">Tho??t</button>
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
