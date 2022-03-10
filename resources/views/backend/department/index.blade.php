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
<script src="{{asset('assets/js/data/department.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/treelist/styles.css')}}">
<!-- END: Todo CSS-->

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
                    <form>
                        <div class="row border rounded  mb-2">
                            <form action="{{route('admin.department.index')}}" method="get">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    {{-- <label for="users-list-verified">Tên phòng ban</label> --}}
                                    <fieldset class="form-group pt-2">
                                        <input type="text" name="searchText" value="{{Request::get('searchText')}}"
                                            class="form-control" id="" placeholder="Nhập tên phòng ban">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-1 pt-2">
                                    {{-- <label for="users-list-role">Tìm kiếm</label> --}}
                                    <button type="submit" class="btn btn-icon btn-outline-primary btn-search "><i
                                            class="bx bx-search"></i></button>
                                </div>
                            </form>
                            <div class="col-12 col-sm-6 col-lg-2 float-end">
                                <a href="{{route('admin.department.create')}}" type="button"
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
                <div class="users-list-table">
                    <div class="card">
                        <div class="card-body">
                            <!-- datatable start -->
                            @if(count($records) > 0)
                            <div class="table-responsive">
                                <table id="" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Tên phòng ban</th>
                                            <th>Phòng ban cha</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($records as $key => $record)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$record->name}}</td>
                                            <td>
                                                {{$record->parent_id}}
                                            </td>
                                            <td>
                                                @if($record->status == 1)
                                                <span class="badge badge-success">Hoạt động</span>
                                                @else
                                                <span class="badge badge-secondary">Khoá</span>
                                                @endif
                                            </td>
                                            <td><a href="{{route('admin.department.edit', $record->id)}}"><i
                                                        class="far fa-edit"></i></a>
                                                <form style="display: inline-block" method="POST"
                                                    action="{{ route('admin.department.destroy', $record->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="#" class="show_confirm" data-toggle="tooltip"
                                                        title='Delete'> <i class="fa fa-trash-alt"> </i></a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <b>Không tìm thấy kết quả</b>
                            @endif
                            <!-- datatable ends -->
                        </div>
                    </div>

                </div>

                <div id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <div id="department_table"></div>
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
    var departments = JSON.parse('<?= $records; ?>');
    var employees = JSON.parse('<?= $employee_array; ?>');
    console.log(employees);
    console.log(employees2);

    var baseurl = window.location.origin;

    $(() => {
  const treeListData = $.map(departments, (task) => {
    departments.Task_Assigned_Employee = null;
    $.each(employees, (_, employee) => {
      if (employee.id === task.manager_id) {
        task.Task_Assigned_Employee = employee;
      }
    });
    return task;
  });

  $('#department_table').dxTreeList({
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
      caption: 'Tên phòng ban',
      width: 300,
    }, {
      dataField: 'manager_id',
      caption: 'Trưởng phòng',
      allowSorting: false,
      minWidth: 200,
      cellTemplate(container, options) {
        const currentEmployee = options.data.Task_Assigned_Employee;
        if (currentEmployee) {
          container
            .append($('<div>', { class: 'img', style: `background-image:url(${currentEmployee.avatar});` }))
            .append('\n')
            .append($('<span>', { class: 'name', text: currentEmployee.name }));
        }
      },
      lookup: {
        dataSource: employees,
        valueExpr: 'ID',
        displayExpr: 'name',
      },
    }, {
      dataField: 'name',
      caption: 'Trạng thái',
      width: 300,
    //   customizeText() {
    //     return `<span class="badge badge-success">Hoạt động</span>`;
    //   }
      cellTemplate: function(element, info) {
            element.append("<span class='badge badge-success'>" + "Hoạt động" + "</span>");
        }
    },{
      dataField: 'name',
      dataField: 'Thao tác',
      width: 300,
      cellTemplate: function(element, info) {
            element.append(`<a href="`+baseurl+`/department/edit/`+info.data.id+`"><i
                                                        class='far fa-edit'></i></a>
                                                <form style='display: inline-block' method='POST'
                                                    action="`+baseurl+`/department/delete/`+info.data.id+`">
                                                @csrf
                                                    <input name='_method' type='hidden' value='DELETE'>
                                                    <a href='#' class='show_confirm' data-toggle='tooltip'
                                                        title='Delete'> <i class='fa fa-trash-alt'> </i></a>
                                                </form>`);
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
    }],
  });
});

</script>

@stop
@section('script')
<script src="assets/js/scripts/pages/app-users.min.js"></script>
<script type="text/javascript"></script>
<!-- END: Page JS-->
@stop
