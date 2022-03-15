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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                                        <div class="portlet">
                                            <div class="portlet-heading inverse">
                                                <div class="portlet-title">
                                                    <h5>Người liên lạc</h5>
                                                </div>
                                                <div class="portlet-widgets">
                                                    {{-- <a href="#"><i class="fa fa-plus"></i> Thêm người liên lạc</a> --}}
                                                    <a href="#" class="tooltip-primary" data-placement="left"
                                                        data-rel="tooltip" title=""
                                                        data-original-title="Thêm người liên lạc" data-toggle="modal"
                                                        data-target="#addContactor" id="btnShowFormCreate">
                                                        <i class="fa fa-plus"> </i> Thêm người liên lạc
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        {{-- Contactor table --}}
                                        <div id="basic-datatable">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body card-dashboard">
                                                            <!-- datatable start -->
                                                            @if ($customer_contactor_array['records_total'] > 0)
                                                                {{-- <div class="table-responsive">
                                                                <table id="tableContactor"
                                                                    class="datatable table table-hover table-striped table-bordered tc-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th data-hide="expand">STT</th>
                                                                            <th data-class="expand">Người liên lạc
                                                                            </th>
                                                                            <th data-hide="expand">Số điện thoại</th>
                                                                            <th data-hide="expand">Giới tính</th>
                                                                            <th data-hide="expand">Chức vụ</th>
                                                                            <th data-hide="expand">Thao tác</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>


                                                                    </tbody>
                                                                </table> --}}
                                                                <table class="table zero-configuration">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Id</th>
                                                                            <th>Người liên lạc</th>
                                                                            <th>SĐT</th>
                                                                            <th>Giới tính</th>
                                                                            <th>Chức vụ</th>
                                                                            <th>Thao tác</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($customer_contactor_array['rows'] as $key => $contactor)
                                                                            <tr>
                                                                                <td>{{ ++$key }}</td>
                                                                                <td>{{ $contactor->name }}</td>
                                                                                <td>{{ $contactor->phone_number }}</td>
                                                                                <td>
                                                                                    @if ($contactor->gender == 1)
                                                                                        {{ 'Nam' }}
                                                                                    @elseif($contactor->gender == 2)
                                                                                        {{ 'Nữ' }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $contactor->postion }}</td>
                                                                                <td>
                                                                                    <a
                                                                                        href="{{ route('admin.customer_contactor.edit', $contactor->id) }}"><i
                                                                                            class="far fa-edit"></i></a>
                                                                                    <form style="display: inline-block"
                                                                                        method="POST"
                                                                                        action="{{ route('admin.customer_contactor.destroy', $contactor->id) }}">
                                                                                        @csrf
                                                                                        <input name="_method" type="hidden"
                                                                                            value="DELETE">
                                                                                        <a href="#" class="show_confirm"
                                                                                            data-toggle="tooltip"
                                                                                            title='Delete'> <i
                                                                                                class="fa fa-trash-alt ml-1">
                                                                                            </i></a>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                        @endif
                                                        <!-- datatable ends -->
                                                    </div>
                                                </div>
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
                    <form method="POST" id="addContactorForm" action="javascript:void(0)" enctype="multipart/form-data"
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
                            <div class="controls">
                                <label>Quốc gia</label>
                                <select class="select2 form-control" name="country_id" id="contactorCountryId">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    {{-- <!-- Adding jQuery cdn-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Adding datatable cdn -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- --> --}}

    {{-- <script>
        $('#btnEditCustomer').on('click', function(e) {
            e.preventDefault();
            $("#customerName").attr("readonly", false);
            $("#customerTaxNumber").attr("readonly", false);
            $("#customerPhone").attr("readonly", false);
            $("#customerEmail").attr("readonly", false);
            $("#customerSkype").attr("readonly", false);
            $("#customerZalo").attr("readonly", false);
            $("#customerWechat").attr("readonly", false);
            $("#customerWhatsapp").attr("readonly", false);
            $("#customerAddress").attr("readonly", false);
            $("#btnEditCustomer").show();
        });
        $('#btnCancelEditCustomer').on('click', function(e) {
            e.preventDefault();
            $("#customerName").attr("readonly", true);
            $("#customerTaxNumber").attr("readonly", true);
            $("#customerPhone").attr("readonly", true);
            $("#customerEmail").attr("readonly", true);
            $("#customerSkype").attr("readonly", true);
            $("#customerZalo").attr("readonly", true);
            $("#customerWechat").attr("readonly", true);
            $("#customerWhatsapp").attr("readonly", true);
            $("#customerAddress").attr("readonly", true);
            $("#btnEditCustomer").hide();
        });
    </script> --}}
    {{-- <script>
        $('input[name="date_of_birth"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: false,
            maxDate: new Date(),
            locale: {
                cancelLabel: 'Clear'
            },
            format: 'dd/mm/yyyy'
        }).on;
        $('input[name="date_of_birth"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
        });
        var responsiveHelper = undefined;
        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };
        var tElement = $('#tableContactor');
        var table = tElement.DataTable({
            "processing": true,
            "language": {
                "processing": "Đang xử lý",
                "search": "Tìm kiếm ",
                "emptyTable": "Không tìm thấy bản ghi",
                "sLengthMenu": "Hiển thị _MENU_ bản ghi trên 1 trang",
            },

            "serverSide": true,
            "ajax": {
                "url": "{{ route('contactorDatatable') }}",
                "dataType": "json",
                "type": "post",
                "data": function(data) {
                    data._token = "{{ csrf_token() }}",
                }
            },
            "order": [
                [1, "asc"]
            ],
            "columns": [{
                    "data": "index"
                },
                {
                    "data": "name"
                },
                {
                    "data": "phone_number"
                },
                {
                    "data": "gender"
                },
                {
                    "data": "position"
                },
                {
                    "data": "options"
                }
            ],
            "autoWidth": false,
            preDrawCallback: function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper) {
                    responsiveHelper = new ResponsiveDatatablesHelper(tElement, breakpointDefinition);
                }
            },
            rowCallback: function(nRow) {
                responsiveHelper.createExpandIcon(nRow);
            },
            drawCallback: function(oSettings) {
                responsiveHelper.respond();
            }
        });
        $('[name="process_status"]').change(function() {
            table.draw();
        });
    </script> --}}
    {{-- <script>
        $('#btnAddContactor').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var btnSubmit = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            btnSubmit.attr("disabled", true);
            btnSubmit.html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
            $.ajax({
                url: "{{ route('contactor.add') }}",
                type: "POST",
                data: form.serialize(),
                success: function(response) {
                    dd(response);
                    if (response.status !== 1) {
                        btnSubmit.html('<i class="fa fa-floppy-o"></i> Lưu');
                        $('#addContactorError').html(
                            '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                            response.message + '</div>');
                        $("#addContactor").animate({
                            scrollTop: 0
                        }, "slow");
                        btnSubmit.attr("disabled", false);
                    } else {
                        form.trigger("reset");
                        form.find('input').val('');
                        form.find('textarea').attr('src', '');
                        btnSubmit.html('<i class="fa fa-floppy-o"></i> Lưu');
                        $('#addContactorError').html('');
                        $('#addContactor').modal('hide');
                        $.gritter.add({
                            title: response.message,
                            class_name: "bg-success",
                            sticky: false
                        });
                        if (typeof table !== 'undefined' && table !== null) {
                            table.draw();
                        }
                        btnSubmit.attr("disabled", false);
                    }
                }
            });
        });
    </script> --}}
    <script>
        $('#addContactorForm').submit(function(e) {
            e.preventDefault();
            let name = $("#contactorName").val();
            let customer_type_id = $("#contactorCustomerType").val();
            let position = $("#contactorPosition").val();
            let gender = $("#contactorGender").val();
            let date_of_birth = $("#contactorBirthday").val();
            let id_card = $("#contactorIdCard").val();
            let phone_number = $("#contactorPhone").val();
            let email = $("#contactorEmail").val();
            let skype = $("#contactorSkype").val();
            let zalo = $("#contactorZalo").val();
            let wechat = $("#contactorWechat").val();
            let whatsapp = $("#contactorWhatsapp").val();
            let address = $("#contactorAddress").val();
            let country_id = $("#contactorCountryId").val();
            let note = $("#contactorNote").val();
            let customer_id = $record - > id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var btnSubmit = $("#btnAddContactor");
            btnSubmit.attr("disabled", true);
            btnSubmit.html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
            $.ajax({
                url: "{{ route('contactor.add') }}",
                type: "POST",
                data: {
                    name: name,
                    customer_type_id: customer_type_id,
                    position: position,
                    gender: gender,
                    date_of_birth: date_of_birth,
                    id_card: id_card,
                    phone_number: phone_number,
                    email: email,
                    skype: skype,
                    zalo: zalo,
                    wechat: wechat,
                    whatsapp: whatsapp,
                    address: address,
                    country_id: country_id,
                    note: note,
                    customer_id: $con
                },
                success: function(response) {
                    dd(response);
                    if (response.status !== 1) {
                        btnSubmit.html('<i class="fa fa-floppy-o"></i> Lưu');
                        $('#addContactorError').html(
                            '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                            response.message + '</div>');
                        $("#addContactor").animate({
                            scrollTop: 0
                        }, "slow");
                        btnSubmit.attr("disabled", false);
                    } else {
                        form.trigger("reset");
                        form.find('input').val('');
                        form.find('textarea').attr('src', '');
                        btnSubmit.html('<i class="fa fa-floppy-o"></i> Lưu');
                        $('#addContactorError').html('');
                        $('#addContactor').modal('hide');
                        $.gritter.add({
                            title: response.message,
                            class_name: "bg-success",
                            sticky: false
                        });
                        if (typeof table !== 'undefined' && table !== null) {
                            table.draw();
                        }
                        btnSubmit.attr("disabled", false);
                    }
                }
            });
        })
    </script>
    <script>
        $('#edit-Record').on('hidden.bs.modal', function() {
            $(this).find('.overLayLoading').css('display', 'block');
        });
        $('body').on('click', '.editRecord', function(e) {
            e.preventDefault();
            var tr = $(this).closest('tr'); //Find DataTables table row
            var rowIndex = table.row(tr).index();
            $('#btnEditContactor').attr('data-index', rowIndex);
            var editForm = $('#editContactorForm');
            var editUrl = $(this).data('url');
            var editId = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: editUrl + '/' + editId,
                type: "GET",
                success: function(response) {
                    if (response.status !== 1) {
                        $.gritter.add({
                            title: response.message,
                            class_name: "bg-danger",
                            sticky: false
                        });
                    } else {
                        response.data.hidden == 1 ? editForm.find('[name="hidden"]').prop("checked",
                            true) : editForm.find('[name="hidden"]').prop("checked", false);
                        editForm.find('[name="name"]').val(response.data.name);
                        editForm.find('[name="customer_type_id"] > option[value="' + response.data
                            .customer_type_id + '"]').prop("selected", true);
                        editForm.find('[name="postion"]').val(response.data.position);
                        editForm.find('[name="gender"] > option[value="' + response.data.gender + '"]')
                            .prop("selected", true);
                        editForm.find('[name="date_of_birth"]').val(response.data.date_of_birth !=
                            null ? moment(response.data.date_of_birth).format('DD/MM/YYYY') : '');
                        editForm.find('[name="id_card"]').val(response.data.id_card);
                        editForm.find('[name="phone_number"]').val(response.data.phone_number);
                        editForm.find('[name="email"]').val(response.data.email);
                        editForm.find('[name="skype"]').val(response.data.skype);
                        editForm.find('[name="zalo"]').val(response.data.zalo);
                        editForm.find('[name="wechat"]').val(response.data.wechat);
                        editForm.find('[name="whatsapp"]').val(response.data.whatsapp);
                        editForm.find('[name="address"]').val(response.data.address);
                        editForm.find('[name="content"]').val(response.data.content);
                        editForm.find('[name="country_id"] > option[value="' + response.data
                            .country_id + '"]').prop("selected", true);
                        editForm.find('[name="note"]').val(response.data.note);
                        editForm.find('[name="id"]').val(response.data.id);
                        editForm.find('[name="customer_id"]').val(response.data.customer_id);
                        $('#edit-Record .overLayLoading').fadeOut();
                        response.data.status ? editForm.find('[name="status"]').prop("checked", true) :
                            editForm.find('[name="status"]').prop("checked", false);
                    }
                }
            });
        });
        $('body').on('click', '#btnEditContactor', function(e) {
            e.preventDefault();
            var rowIndex = $(this).data('index');
            var formEdit = $(this).closest('form');
            var btnUpdateSubmit = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            btnUpdateSubmit.attr("disabled", true);
            btnUpdateSubmit.html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
            $.ajax({
                url: 'admin.customer_contactor.update',
                type: "POST",
                data: formEdit.serialize(),
                success: function(response) {
                    if (response.status !== 1) {
                        btnUpdateSubmit.html('<i class="fa fa-floppy-o"></i> Lưu');
                        $('#editContactorError').html(
                            '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                            response.message + '</div>');
                        $("#edit-Record").animate({
                            scrollTop: 0
                        }, "slow");
                        btnUpdateSubmit.attr("disabled", false);
                    } else {
                        formEdit.trigger("reset");
                        formEdit.find('input').val('');
                        formEdit.find('[name="id"]').val('');
                        btnUpdateSubmit.html('<i class="fa fa-floppy-o"></i> Lưu');
                        $('#editContactorError').html('');
                        $('#edit-Record').modal('hide');
                        $.gritter.add({
                            title: response.message,
                            class_name: "bg-success",
                            sticky: false
                        });
                        if (typeof table !== 'undefined' && table !== null) {
                            table.row(rowIndex).draw(false);
                        }
                        btnUpdateSubmit.attr("disabled", false);
                    }

                }
            });
        });
    </script>
    END:
    Page JS-->
@stop
