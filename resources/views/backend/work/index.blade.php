@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-users.min.css')}}">
<!-- END: Page CSS-->
@stop
@extends('layouts.master')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="users-list-wrapper">
                <div class="users-list-filter px-1">
                    <form action="{{route('admin.project.index')}}" method="get">
                        <div class="row border rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-verified">Tên công việc</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="basicInput"
                                        placeholder="Nhập tên công việc" name="keywords_search"
                                        value="{{Request::get('keywords')}}">
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-role">Phòng ban</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-role" name="department_search">
                                        <option value="">Chọn phòng ban</option>
                                        @foreach($department_array as $key => $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-1">
                                <label for="users-list-role">Tìm kiếm</label>
                                <button type="submit" class="btn btn-icon btn-outline-primary btn-search"><i
                                        class="bx bx-search"></i></button>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <a href="{{route('admin.work.create')}}" type="button"
                                    class="btn btn-primary btn-block my-2">
                                    <i class="bx bx-plus"></i>
                                    <span>Thêm mới</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                @if(Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @elseif(Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
                @endif

                <div id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Dự án</th>
                                                    <th>Hợp đồng</th>
                                                    <th>Người phụ trách</th>
                                                    <!-- <th>Tiến độ</th> -->
                                                    <th>Tình trạng</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($records as $key => $record)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$record->name}}</td>
                                                    <td>Project</td>
                                                    <td>
                                                        @foreach($employee_array as $key => $employee)
                                                        @if($employee->id == $record->member_id)
                                                        {{$employee->name}}
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                    <!-- <td>
                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                    role="progressbar" aria-valuenow="80" aria-valuemin="80"
                                                    aria-valuemax="100" style="width:80%"></div>
                                            </td> -->
                                                    <td>
                                                        @if($record->status == 0)
                                                        <div class="badge badge-secondary mr-1 mb-1">Chưa bắt đầu</div>
                                                        @endif
                                                        <!-- <div class="badge badge-primary mr-1 mb-1">Đang diễn ra</div>
                                                <div class="badge badge-secondary mr-1 mb-1">Chưa bắt đầu</div>
                                                <div class="badge badge-success mr-1 mb-1">Đã hoàn thành</div>
                                                <div class="badge badge-info mr-1 mb-1">Đơi xét duyệt</div>
                                                <div class="badge badge-warning mr-1 mb-1">Chậm tiến độ</div>
                                                <div class="badge badge-danger mb-1">Đã Huỷ</div> -->
                                                    </td>
                                                    <td>
                                                        <a href="{{route('admin.project.edit', $record->id)}}"
                                                            title='Sửa'><i class="far fa-edit"></i></a>
                                                        <form style="display: inline-block" method="POST"
                                                            action="{{ route('admin.project.destroy', $record->id) }}">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <a href="#" class="show_confirm" data-toggle="tooltip"
                                                                title='Xoá'> <i class="far fa-trash-alt"> </i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Dự án</th>
                                                    <th>Hợp đồng</th>
                                                    <th>Người phụ trách</th>
                                                    <!-- <th>Tiến độ</th> -->
                                                    <th>Tình trạng</th>
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
                <!--/ Zero configuration table -->
            </section>
            <!-- users list ends -->
        </div>
    </div>
</div>
<!-- END: Content-->
@stop
@section('script')
<!-- BEGIN: Page Vendor JS-->
<script src="assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->
<!--
BEGIN: Page JS-->
<script src="assets/js/scripts/pages/app-users.min.js"></script>
<script src="assets/js/scripts/datatables/datatable.min.js"></script>
<!--
END: Page JS-->
@stop
