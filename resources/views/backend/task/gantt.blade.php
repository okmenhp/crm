@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
<script src="https://cdn3.devexpress.com/jslib/21.2.5/js/dx-gantt.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.5/css/dx.common.css" />
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.5/css/dx.light.css" />
<link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/21.2.5/css/dx-gantt.min.css" />
<script src="https://cdn3.devexpress.com/jslib/21.2.5/js/dx.all.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/custom-gantt.css')}}">
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
            <div id="gantt"> </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
var tasks = []
var dependencies = []
var resources = []
var resourceAssignments = []
$(document).ready(function(){
  $.ajax({
    url: "/api/project/gantt",
    type: "GET",
    success: function(data){
        tasks = data.tasks
        dependencies = data.dependencies
        resources = data.resources
        resourceAssignments = data.resourceAssignments
    }
  })
})
var gantt = $('#gantt').dxGantt({
    tasks: {
      dataSource: tasks,
    },
    dependencies: {
      dataSource: dependencies,
    },
    resources: {
      dataSource: resources,
    },
    resourceAssignments: {
      dataSource: resourceAssignments,
    },
    editing: {
      enabled: true,
    },
    validation: {
      autoUpdateParentTasks: true,
    },
    toolbar: {
      items: [
        'undo',
        'redo',
        'separator',
        'collapseAll',
        'expandAll',
        'separator',
        'addTask',
        'deleteTask',
        'separator',
        'zoomIn',
        'zoomOut',
      ],
    },
    columns: [{
      dataField: 'title',
      caption: 'Subject',
      width: 300,
    }, {
      dataField: 'start',
      caption: 'Start Date',
    }, {
      dataField: 'end',
      caption: 'End Date',
    }],
    scaleType: 'weeks',
    taskListWidth: 500,
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