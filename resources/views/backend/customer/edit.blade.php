@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-customer.min.css') }}">
    <!-- END: Page CSS-->
    <!-- Adding datatable style cdn -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                {{-- @dd($customer_contactor_array); --}}
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="row px-1">
                        <div class="col-12 col-sm-6 col-lg-6 d-flex flex-sm-row flex-column justify-content-start mt-2">
                            <div class="">
                                <p>
                                    <span
                                        class=" @if ($record->status == 0) {{ 'txt-status-customer' }}
                                        @else ({{ 'txt-status-customer-defaul' }}) @endif">
                                        Mới</span> &nbsp; {{ '>   ' }}
                                </p>
                            </div>
                            <div class=" ">
                                <p> &nbsp;
                                    <span
                                        class=" @if ($record->status == 1) {{ 'txt-status-customer' }}
                                        @else ({{ 'txt-status-customer-defaul' }}) @endif">
                                        Xác nhận</span> &nbsp; {{ '>   ' }}
                                </p>
                            </div>
                            <div class=" ">
                                <p> &nbsp;
                                    <span
                                        class=" @if ($record->status == 2) {{ 'txt-status-customer' }}
                                        @else ({{ 'txt-status-customer-defaul' }}) @endif">
                                        Huỷ</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6 row d-flex flex-sm-row flex-column justify-content-end mt-1">
                            {{-- <div class="col-12 col-lg-2">
                                    <a href="{{ route('admin.customer.edit', $record->id) }}" type="button"
                                        id="btnEditCustomer"
                                        class="btn btn-primary btn-sm btn-block  glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                        <i class="bx bx-edit"></i>
                                        <span>Sửa</span>
                                    </a>
                                </div> --}}
                            <div class="col-12 col-lg-2 float-right">
                                <form style="display: inline-block" method="POST"
                                    action="{{ route('admin.customer.destroy', $record->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="#" type="button"
                                        class="
                                        show_confirm btn btn-danger btn-sm btn-block glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                        data-toggle="tooltip" title='Delete'>
                                        <span>Xoá</span>
                                    </a>
                                </form>
                            </div>

                            @if ($record->status != 1)
                                <div class="col-12 col-lg-2 float-right">
                                    <a href="#" type="button"
                                        class="btn btn-success btn-sm btn-block  glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                        <span>Duyệt</span>
                                    </a>
                                </div>
                            @endif
                            @if ($record->status != 2)
                                <div class="col-12 col-lg-2 float-right">
                                    <a href="#" type="button"
                                        class="btn btn-secondary btn-sm btn-block  glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                        <span>Huỷ</span>
                                    </a>
                                </div>
                            @endif
                            @if ($record->status != 0)
                                <div class="col-12 col-lg-4 float-right">
                                    <a href="#" type="button"
                                        class="btn btn-primary btn-sm btn-block  glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                        <span>Đặt về dự thảo</span>
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab"
                                    role="tabpanel">
                                    {{-- {{ dd($record->customer_types->name) }} --}}
                                    <!-- users edit account form start -->
                                    <form class="form-validate" method="post"
                                        action="{{ route('admin.customer.update', $record->id) }}">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Khách hàng <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->name }}" name="name"
                                                                id="customerName">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Loại khách hàng <span class="text-danger">*</span></label>
                                                        <select class="select2 form-control" name="customer_type_id">
                                                            {{-- <option value="{{ $record->customer_type_id }}">
                                                                {{ $record->customer_types->name }}</option> --}}
                                                            @foreach ($customer_type_array as $key => $customer_type)
                                                                <option value="{{ $customer_type->id }}"
                                                                    {{ $record->customer_type_id == $customer_type->id ? 'selected' : '' }}>
                                                                    {{ $customer_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Mã số thuế</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->tax_number }}" name="tax_number"
                                                                id="customerTaxNumber">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Điện thoại</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->phone_number }}" name="phone_number"
                                                                id="customerPhone">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->email }}" name="email"
                                                                id="customerEmail">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Skype</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->skype }}" name="skype"
                                                                id="customerSkype">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Zalo</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->zalo }}" name="zalo"
                                                                id="customerZalo">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Wechat</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->wechat }}" name="wechat"
                                                                id="customerWechat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Whatsapp</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->whatsapp }}" name="whatsapp"
                                                                id="customerWhatsapp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Địa chỉ</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $record->address }}" name="address"
                                                                id="customerAddress">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Quốc gia</label>
                                                            <select class="select2 form-control" name="country_id">
                                                                {{-- <option value="{{ $record->country_id }}">
                                                                    {{ $record->countries->country_name }}</option> --}}
                                                                @foreach ($country_array as $key => $country)
                                                                    <option value="{{ $country->id }}"
                                                                        {{ $record->country_id == $country->id ? 'selected' : '' }}>
                                                                        {{ $country->country_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1"
                                                    id="btnEditCustomer">
                                                    <button type="submit"
                                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Lưu
                                                        thay
                                                        đổi</button>
                                                    {{-- <button type="reset" class="btn btn-light"
                                                        id="btnCancelEditCustomer">Huỷ</button> --}}
                                                </div>

                                            </div>
                                            <div class="col-6 col-sm-6">
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label>Tin nhắn</label>
                                                        <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Nhập tin nhắn"></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />
                                        {{-- Contactor lable --}}
                                        {{-- <div class="portlet">
                                            <div class="portlet-heading inverse">
                                                <div class="portlet-title">
                                                    <h5>Người liên lạc</h5>
                                                </div>
                                                <div class="portlet-widgets">
                                                    <a href="#" class="tooltip-primary" data-placement="left"
                                                        data-rel="tooltip" title=""
                                                        data-original-title="Thêm người liên lạc" data-toggle="modal"
                                                        data-target="#addContactor" id="btnShowFormCreate">
                                                        <i class="fa fa-plus"> </i> Thêm người liên lạc
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-6 col-md-6">
                                            <div class="tc-tabs">
                                                <!-- Nav tabs style 1 -->
                                                <ul class="nav nav-tabs nav-bordered mb-2 tab-lg-button tab-color-dark background-dark white"
                                                    id="myTab" role="tablist">
                                                    <li class="nav-item ">
                                                        <a class="nav-link active" id="contactor-tab" href="#p1"
                                                            data-toggle="tab" role="tab" aria-controls="p1"
                                                            aria-selected="true">Người liên lạc
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="info-more-tab" href="#p2"
                                                            data-toggle="tab" role="tab" aria-controls="p2"
                                                            aria-selected="false">Thông tin
                                                            thêm
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content tab-content-page" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="p1" role="tabpanel"
                                                        aria-labelledby="contactor-tab">
                                                        <div class="portlet-widgets">
                                                            <a href="#" class="tooltip-primary" data-placement="left"
                                                                data-rel="tooltip" title=""
                                                                data-original-title="Thêm người liên lạc"
                                                                data-toggle="modal" data-target="#addContactor"
                                                                id="btnShowFormCreate">
                                                                <i class="fa fa-plus"> </i> Thêm người liên lạc
                                                            </a>
                                                        </div>
                                                        {{-- Contactor table --}}
                                                        <div id="basic-datatable">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <div class="">
                                                                            <!-- datatable start -->
                                                                            @if ($customer_contactor_array['records_total'] > 0)
                                                                                @foreach ($customer_contactor_array['rows'] as $key => $contactor)
                                                                                    <div class="row space-2x mt-4 col-12">
                                                                                        <div class="col-lg-4">
                                                                                            <div class="divTable box-show2 bg-white"
                                                                                                style="border:1px solid #ccc">
                                                                                                <div
                                                                                                    class="headRow borderb-n">
                                                                                                    <div
                                                                                                        class="divCell title2">
                                                                                                        <b>{{ $contactor->name }}</b>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="divCell float-right link-line-b">
                                                                                                        <form
                                                                                                            style="display: inline-block"
                                                                                                            method="POST"
                                                                                                            action="{{ route('admin.customer_contactor.destroy', $contactor->id) }}">
                                                                                                            @csrf
                                                                                                            <input
                                                                                                                name="_method"
                                                                                                                type="hidden"
                                                                                                                value="DELETE">
                                                                                                            <a href="#"
                                                                                                                class="show_confirm"
                                                                                                                data-toggle="tooltip"
                                                                                                                title='Delete'>
                                                                                                                <i
                                                                                                                    class="fal fa-times-circle"></i></a>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="divRow borderb-n">
                                                                                                    <div
                                                                                                        class="divCell">
                                                                                                        @if (!empty($contactor->phone_number))
                                                                                                            {{ $contactor->phone_number }}
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach

                                                                        </div>
                                                                        @endif
                                                                        <!-- datatable ends -->
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="p2" role="tabpanel"
                                                        aria-labelledby="profile-tab">
                                                        <form class="form-validate" method="post"
                                                            action="{{ route('admin.employee.addNote', $record->id) }}">
                                                            <div class="form-group">
                                                                <label>Thông tin bổ sung </label>
                                                                <textarea class="form-control customernote" id="addNoteContactor" name="note_customer"></textarea>
                                                            </div>
                                                            <div class="form-actions no-padding-bottom">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary"
                                                                        id="btnAddContactor">Lưu</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                    <!--nav-tabs style 1-->
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
    <!-- Add Contactor Modal -->
    <div class="modal fade modal-scroll" id="addContactor" tabindex="-1" role="dialog" aria-labelledby="addContactorLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="addContactorLabel"><i class="fa fa-plus-circle"></i> Thêm người liên
                        lạc</h4>
                </div>
                <div class="modal-body padding-2x">
                    <div id="addContactorError"></div>
                    <form method="POST" id="addContactorForm"
                        action="{{ route('admin.customer_contactor.store', $record->id) }}" enctype="multipart/form-data"
                        autocomplete="off">
                        <div class="form-group">
                            <div class="controls">
                                <label>Tên người liên lạc <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="" value="" name="name"
                                    id="contactorName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Loại khách hàng <span class="text-danger">*</span></label>
                            <select name="customer_type_id" class="form-control" id="contactorCustomerType">
                                @foreach ($customer_type_array as $key => $customer_type)
                                    <option value="{{ $customer_type->id }}">{{ $customer_type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <label>Chức vụ</label>
                                <input type="text" class="form-control" placeholder="" value="" name="position"
                                    id="contactorPosition">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Giới tính </label>
                            <select name="gender" class="form-control" id="contactorGender">
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh </label>
                            <input type="date" class="form-control" name="date_of_birth" placeholder="VD: 15/03/2000"
                                id="contactorBirthday">
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Số CMND</label>
                                <input type="text" class="form-control" placeholder="" value="" name="id_card"
                                    id="contactorIdCard">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Quốc gia</label>
                                <select class="select2 form-control" name="country_id" id="contactorCountryId">
                                    <option value="">
                                        Chọn quốc gia</option>
                                    @foreach ($country_array as $key => $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Điện thoại</label>
                                <input type="text" class="form-control" placeholder="" value="" name="phone_number"
                                    id="contactorPhone">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="" value="" name="email"
                                    id="contactorEmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Skype</label>
                                <input type="text" class="form-control" placeholder="" value="" name="skype"
                                    id="contactorSkype">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Zalo</label>
                                <input type="text" class="form-control" placeholder="" name="zalo" id="contactorZalo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Wechat</label>
                                <input type="text" class="form-control" placeholder="" value="" name="wechat"
                                    id="contactorWechat">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Whatsapp</label>
                                <input type="text" class="form-control" placeholder="" value="" name="whatsapp"
                                    id="contactorWhatsapp">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="" value="" name="address"
                                    id="contactorAddress">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="note" class="form-control" rows="5" id="contactorNote"></textarea>
                        </div>
                        <div class="form-actions no-padding-bottom">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" id="btnAddContactor">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Edit Contactor Modal -->
    <div class="modal fade modal-scroll" id="edit-Record" tabindex="-1" role="dialog" aria-labelledby="editNewsLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="overLayLoading">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="editNewsLabel"><i class="fa fa-plus-circle"></i> Sửa người liên lạc
                    </h4>
                </div>
                <div class="modal-body padding-2x">
                    <div id="editContactorError"></div>
                    <form method="POST" id="editContactorForm" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="controls">
                                <label>Tên người liên lạc <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Loại khách hàng <span class="text-danger">*</span></label>
                            <select name="customer_type_id" class="form-control">
                                @foreach ($customer_type_array as $key => $customer_type)
                                    <option value="{{ $customer_type->id }}">{{ $customer_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Chức vụ</label>
                                <input type="text" class="form-control" placeholder="" value="" name="position">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Giới tính </label>
                            <select name="gender" class="form-control">
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh </label>
                            <input type="date" class="form-control" name="date_of_birth" placeholder="VD: 15/03/2000">
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Số CMND</label>
                                <input type="text" class="form-control" placeholder="" value="" name="id_card">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Điện thoại</label>
                                <input type="text" class="form-control" placeholder="" value="" name="phone_number">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="" value="" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Skype</label>
                                <input type="text" class="form-control" placeholder="" value="" name="skype">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Zalo</label>
                                <input type="text" class="form-control" placeholder="" name="zalo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Wechat</label>
                                <input type="text" class="form-control" placeholder="" value="" name="wechat">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Whatsapp</label>
                                <input type="text" class="form-control" placeholder="" value="" name="whatsapp">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="" value="" name="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Quốc gia</label>
                                <select class="select2 form-control" name="country_id">
                                    {{-- <option value="{{ $record->country_id }}">
                                            {{ $record->countries->country_name }}</option> --}}
                                    @foreach ($country_array as $key => $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="note" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-actions no-padding-bottom">
                            <input type="hidden" name="id">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" id="btnEditContactor"><i
                                        class="fa fa-floppy-o" title="Lưu"></i> Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="assets/js/scripts/pages/app-users.min.js"></script>
    <script src="assets/js/scripts/navs/navs.min.js"></script>
    <script src="assets/js/scripts/forms/select/form-select2.min.js"></script>
    <!-- -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script> --}}

    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>


    <script>
        $('#myTab a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
    {{-- <script>
        ClassicEditor
            .create(document.querySelector('#addNoteContactor'))
            .catch(error => {
                console.error(error);
            });
    </script> --}}
    <script>
        CKEDITOR.replace('addNoteContactor');
    </script>
    END:
    Page JS-->
@stop
