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
                                <form method="post" action="{{route('admin.task.store')}}">
                                    <div class="row">
                                        <div class="col-6 col-sm-6">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Tên công việc</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nhập tên công việc" value="" name="name"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Công việc cha</label>
                                                        <select class="select2 form-control" name="parent_id">
                                                            @foreach($task_array as $key => $task)
                                                            <option value="{{$task->id}}">{{$task->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Người phụ trách</label>
                                                    <select class="select2 form-control" name="master_id">
                                                        @foreach($employee_array as $key => $employee)
                                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Người thực hiện</label>
                                                    <select class="select2 form-control" multiple="multiple"
                                                        name="user_id[]" style="width:100%;" required>
                                                        @foreach($employee_array as $key => $employee)
                                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="mb-1">
                                                        <h6>Ngày bắt đầu</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control pickadate"
                                                                placeholder="Chọn ngày bắt đầu
                                                                " name="intended_start_time">
                                                            <div class="form-control-position">
                                                                <i class='bx bx-calendar'></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="mb-1">
                                                        <h6>Ngày kết thúc</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control pickadate"
                                                                placeholder="Chọn ngày kết thúc
                                                                " name="intended_end_time">
                                                            <div class="form-control-position">
                                                                <i class='bx bx-calendar'></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Số giờ dự kiến</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nhập số giờ" value="" name="time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Thuộc dự án</label>
                                                    <select class="select2 form-control" name="project_id">
                                                        @foreach($project_array as $key => $project)
                                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Độ khó</label>
                                                    <select class="form-control" name="level">
                                                        <option value="1">Dễ</option>
                                                        <option value="2">Trung bình</option>
                                                        <option value="3">Khó</option>
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
                                                    <label>Hoàn thành</label>
                                                    <div class="progress progress-bar-primary mb-2">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            role="progressbar" aria-valuenow="20" aria-valuemin="20"
                                                            aria-valuemax="100" style="width:20%"></div>
                                                    </div>
                                                </div>
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
                                    <!-- <div id="basic-datatable">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body card-dashboard">
                                                        <div class="table-responsive">
                                                            <table class="table zero-configuration">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Id</th>
                                                                        <th>Nhiệm vụ</th>
                                                                        <th>Người thực hiện</th>
                                                                        <th>Thời gian</th>
                                                                        <th>Ngày thực hiện</th>
                                                                        <th>Xoá</th>
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
                                                                        <th>Nhiệm vụ</th>
                                                                        <th>Người thực hiện</th>
                                                                        <th>Thời gian</th>
                                                                        <th>Ngày thực hiện</th>
                                                                        <th>Xoá</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Lưu
                                            thay
                                            đổi</button>
                                        <button type="reset" class="btn btn-light">Thoát</button>
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
<script src="{{asset('assets/vendors/js/forms/select/select2.full.min.js')}}">
</script>
<script src="{{asset('assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/scripts/pages/app-users.min.js')}}"></script>
<scri pt src="{{asset('assets/js/scripts/navs/navs.min.js')}}"></scri>
<script src="{{asset('assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js')}}"></script>
<script src="{{asset('assets/js/scripts/forms/select/form-select2.min.js')}}"></script>
<!--
END:
Page JS-->
@stop
