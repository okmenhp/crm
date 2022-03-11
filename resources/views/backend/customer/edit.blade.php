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
                                                        <textarea class="form-control" id="basicTextarea" rows="3"
                                                            placeholder="Nhập tin nhắn"></textarea>
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
                                                        <i class="fa fa-plus"></i>Thêm người liên lạc
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
                                                            <div class="table-responsive">
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
                                                                            <th>Người liên lạc</th>
                                                                            <th>SĐT</th>
                                                                            <th>Giới tính</th>
                                                                            <th>Chức vụ</th>
                                                                            <th>Thao tác</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
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
    <!-- Add Products Modal -->
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
                        {{-- <div class="form-group">
                            <label>Tiêu đề </label> (<span class="red">*</span>)
                            <textarea name="title" class="form-control" cols="30" rows="5"></textarea>
                        </div> --}}
                        <div class="form-group">
                            <label>Loại khách hàng <span class="text-danger">*</span></label>
                            <select name="customer_type_id" class="form-control">
                                @foreach ($customer_type_array as $key => $customer_type)
                                    <option value="{{ $customer_type->id }}">{{ $customer_type->name }}</option>
                                @endforeach
                            </select>
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
                            <input type="text" class="form-control" name="date_of_birth" placeholder="VD: 15/03/2000">
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

                        {{-- <div class="form-group">
                            <label>Ảnh đại diện</label> (<span class="red">*</span>)<br> <span>(900 x 450
                                px)</span>
                            <div class="input-group">
                                <img id="image_holder_add" style="max-width: 100px; max-height: 100px">
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-file">
                                        Browse <input type="file" id="btnAddBrowser" data-input="image_path"
                                            data-preview="image_holder_add">
                                    </span>
                                </span>
                                <input id="image_path" class="form-control" name="image_source" value="" type="hidden">
                                <input class="form-control" name="" type="text" value="" readonly>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label> (<span class="red">*</span>)
                            <textarea name="content" id="addContent" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Link </label>
                            <input type="text" class="form-control" name="share_link"
                                placeholder="VD: https://demo.com/news/feed.html">
                        </div>
                        <div class="form-group">
                            <div class="tcb">
                                <label>
                                    <input type="checkbox" class="tc" name="hidden">
                                    <span class="labels"> Ẩn với người dùng không phải đại lý</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <label>
                                <input name="status" class="tc tc-switch tc-switch-7" type="checkbox" checked="checked">
                                <span class="labels"></span>
                            </label>
                        </div> --}}
                        <div class="form-actions no-padding-bottom">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" id="btnAddContactor"><i
                                        class="fa fa-floppy-o" title="Save"></i> Save</button>
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
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="assets/js/scripts/pages/app-users.min.js"></script>
    <script src="assets/js/scripts/navs/navs.min.js"></script>
    <script src="assets/js/scripts/forms/select/form-select2.min.js"></script>
    <!-- -->
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
    <script>
        $('#btnAddContactor').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            // var content = CKEDITOR.instances['addContent'].getData();
            var dd = $('#addContent').val(content);
            var btnSubmit = $(this);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            btnSubmit.attr("disabled", true);
            btnSubmit.html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý');
            // $.ajax({
            //     url: '/admin/saveNews' ,
            //     type: "POST",
            //     data: form.serialize(),
            //     success: function(response) {
            //         if (response.status !== 1) {
            //             btnSubmit.html('<i class="fa fa-floppy-o"></i> Save');
            //             $('#addContactorError').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + response.message + '</div>');
            //             $("#addContactor").animate({ scrollTop: 0 }, "slow");
            //             btnSubmit.attr("disabled", false);
            //         } else {
            //             form.trigger("reset");
            //             form.find('input').val('');
            //             form.find('img').attr('src', '');
            //             form.find('textarea').attr('src', '');
            //             CKEDITOR.instances['addContent'].setData('');
            //             btnSubmit.html('<i class="fa fa-floppy-o"></i> Save');
            //             $('#addContactorError').html('');
            //             $('#addContactor').modal('hide');
            //             $.gritter.add({
            //                 title: response.message,
            //                 class_name: "bg-success",
            //                 sticky: false
            //             });
            //             if(typeof table !== 'undefined' && table !== null) {
            //                 table.draw();
            //             }
            //             btnSubmit.attr("disabled", false);
            //         }
            //     }
            // });
        });
    </script>
    END:
    Page JS-->
@stop
