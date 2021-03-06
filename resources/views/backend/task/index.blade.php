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
<script src="{{asset('assets/js/data/tasks.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/treelist/styles.css')}}">
<!-- END: Todo CSS-->

@stop
@extends('layouts.master')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <!-- BEGIN: Navbar -->
        @include('layouts/__navbar')
        <!-- END: Navbar -->
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
                                <a href="{{route('admin.task.create')}}" type="button"
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
                                        <div id="tasks"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- users list ends -->
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$(() => {
    var tasks = JSON.parse('<?= $records; ?>');
    var user_task = JSON.parse('<?= $usertask_array; ?>');
    var users = JSON.parse('<?= $employee_array; ?>');
    var baseurl = window.location.origin;

    const treeListData = $.map(tasks, (task) => {
        task.manager = null;
        $.each(users, (_, user) => {
            if (user.id === task.master_id) {
                task.manager = user;
            }
        });

        return task;
    });

    $('#tasks').dxTreeList({
        dataSource: treeListData,
        keyExpr: 'id',
        parentIdExpr: 'parent_id',
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
            dataField: 'name',
            caption: 'Tên công việc',
            width: 200,
        }, {
            dataField: 'master_id',
            caption: 'Người phụ trách',
            allowSorting: false,
            minWidth: 200,
            cellTemplate(container, options) {
                const currentEmployee = options.data.manager;
                if (currentEmployee) {
                    container
                        .append($('<div>', {
                            class: 'img',
                            style: `background-image:url(${currentEmployee.avatar});`
                        }))
                        .append('\n')
                        .append($('<span>', {
                            class: 'name',
                            text: currentEmployee.name
                        }));
                }
            },
            lookup: {
                dataSource: users,
                valueExpr: 'ID',
                displayExpr: 'name',
            },
        }, {
            caption: 'Người tham gia',
            minWidth: 200,
            cellTemplate: function(element, info) {
                element
                    .append($('<div>', {
                        class: 'img',
                        style: `background-image:url();`
                    }))
                    .append('\n')
                    .append($('<div>', {
                        class: 'img',
                        style: `background-image:url();`
                    }))
                    .append('\n');
            }
        }, {
            caption: 'Tiến độ',
            minWidth: 200,
            cellTemplate: function(element, info) {
                element.append(`<div class="progress progress-bar-primary mb-2">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                role="progressbar" aria-valuenow="20" aria-valuemin="20"
                                                                aria-valuemax="100" style="width:20%"></div>
                                                        </div>`);
            }
        }, {
            caption: 'Trạng thái',
            minWidth: 200,
            cellTemplate: function(element, info) {
                element.append(
                    `<div class="badge badge-secondary mr-1 mb-1">Chưa bắt đầu</div>`);
            }
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
            dataField: 'intended_start_time',
            caption: 'Ngày bắt đầu',
            dataType: 'date',
        }, {
            dataField: 'intended_end_time',
            caption: 'Ngày kết thúc',
            dataType: 'date',
        }, {
            dataField: 'name',
            dataField: 'Thao tác',
            cellTemplate: function(element, info) {
                element.append(`<a href="` + baseurl + `/task/edit/` + info.data.id + `"><i
                                                        class='far fa-edit'></i></a>
                                                <form style='display: inline-block' method='POST'
                                                    action="` + baseurl + `/task/delete/` + info.data.id + `">
                                                @csrf
                                                    <input name='_method' type='hidden' value='DELETE'>
                                                    <a href='#' class='show_confirm' data-toggle='tooltip'
                                                        title='Delete'> <i class='fa fa-trash-alt'> </i></a>
                                                </form>`);
            }
        }],
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