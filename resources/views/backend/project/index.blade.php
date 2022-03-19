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

<!-- BEGIN: Todo CSS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.5/css/dx.common.css" />
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.5/css/dx.light.css" />
<script src="https://cdn3.devexpress.com/jslib/21.2.5/js/dx.all.js"></script>
<script src="{{asset('assets/js/data/project.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/treelist/styles.css')}}">
<!-- END: Todo CSS-->

@stop
@extends('layouts.master')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
                <h5 class="content-header-title float-left pr-1 mb-0">Quản lý dự án</h5>
                <div class="breadcrumb-wrapper d-none d-sm-block">
                    <ol class="breadcrumb p-0 mb-0 pl-1">
                        <li class="breadcrumb-item"><a href="/home"><i class="bx bx-home-alt"></i></a>
                        </li> >>
                        <a style="margin-top: 1px;"    href="{{route('admin.project.index')}}"><li class="breadcrumb-item active">
                            Dự án
                        </li>
                        </a>  
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="users-list-wrapper">
                <div class="users-list-filter px-1">
                    <form action="{{route('admin.project.index')}}" method="get">
                        <div class="row border rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-verified">Tên dự án</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="basicInput" placeholder="Nhập tên dự án"
                                        name="keywords_search" value="{{Request::get('keywords')}}">
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
                                <a href="{{route('admin.project.create')}}" type="button"
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
                                                    <th>Tiến độ</th>
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
                                                    <td>
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            role="progressbar" aria-valuenow="80" aria-valuemin="80"
                                                            aria-valuemax="100" style="width:80%"></div>
                                                    </td>
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
                                                        <a href="{{route('admin.kanban.index', $record->id)}}"
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

<script type="text/javascript">
    $( document ).ready(function() {
    var obj = JSON.parse('<?= $records; ?>');
    console.log(obj);

    console.log( "ready!" );


    $(() => {
        const treeListData = $.map(tasks, (task) => {
            task.Task_Assigned_Employee = null;
            $.each(employees, (_, employee) => {
                if (employee.ID === task.user_id) {
                    task.Task_Assigned_Employee = employee;
                }
            });
            return task;
        });

        $('#tasks').dxTreeList({
            dataSource: treeListData,
            keyExpr: 'Task_ID',
            parentIdExpr: 'Task_Parent_ID',
            columnAutoWidth: true,
            wordWrapEnabled: true,
            showBorders: true,
            expandedRowKeys: [1, 2],
            selectedRowKeys: [1, 29, 42],
            searchPanel: {
                visible: true,
                width: 250,
            },
            headerFilter: {
                visible: true,
            },
            selection: {
                mode: 'multiple',
            },
            columnChooser: {
                enabled: false,
            },
            columns: [{
                dataField: 'Task_Subject',
                width: 300,
            }, {
                dataField: 'user_id',
                caption: 'Assigned',
                allowSorting: false,
                minWidth: 200,
                cellTemplate(container, options) {
                    const currentEmployee = options.data.Task_Assigned_Employee;
                    if (currentEmployee) {
                        container
                            .append($('<div>', {
                                class: 'img',
                                style: `background-image:url(${currentEmployee.Picture});`
                            }))
                            .append('\n')
                            .append($('<span>', {
                                class: 'name',
                                text: currentEmployee.Name
                            }));
                    }
                },
                lookup: {
                    dataSource: employees,
                    valueExpr: 'ID',
                    displayExpr: 'Name',
                },
            }, {
                dataField: 'Task_Status',
                caption: 'Status',
                minWidth: 100,
                lookup: {
                    dataSource: [
                        'Not Started',
                        'Need Assistance',
                        'In Progress',
                        'Deferred',
                        'Completed',
                    ],
                },
            }, {
                dataField: 'Task_Priority',
                caption: 'Priority',
                lookup: {
                    dataSource: priorities,
                    valueExpr: 'id',
                    displayExpr: 'value',
                },
                visible: false,
            }, {
                dataField: 'Task_Completion',
                caption: '% Completed',
                customizeText(cellInfo) {
                    return `${cellInfo.valueText}%`;
                },
                visible: false,
            }, {
                dataField: 'Task_Start_Date',
                caption: 'Start Date',
                dataType: 'date',
            }, {
                dataField: 'Task_Due_Date',
                caption: 'Due Date',
                dataType: 'date',
            }],
        });
    });
});
</script>
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
