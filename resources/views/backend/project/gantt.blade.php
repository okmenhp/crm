@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/vendors/js/extensions/moment.min.js')}}"></script>
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
        <input type="hidden" id="project-id" value="{{$id}}">
        <div class="content-body">
            <div id="gantt"> </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$('#gantt').dxGantt({
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
      caption: 'Tên công việc',
      width: 300,
   }, {
      dataField: 'start',
      caption: 'Ngày bắt đầu',
   }, {
      dataField: 'end',
      caption: 'Ngày kết thúc',
   }],
   scaleType: 'weeks',
   taskListWidth: 500,
   onTaskUpdated: function (e) {
      var data = new FormData();
      if(e.values.end == null && e.values.start != null){
         data.append('type_time', 1)
         data.append('start_default', e.values.start)
         data.append('start', moment(e.values.start).format('Y-MM-DD HH:mm:ss'))
      }else if(e.values.start == null && e.values.end != null){
         data.append('type_time', 2)
         data.append('end_default', e.values.end)
         data.append('end', moment(e.values.end).format('Y-MM-DD HH:mm:ss'))
      }else{
         data.append('type_time', 3)
      }
      data.append('key', e.key)
      $.ajax({
         url: "/api/project/gantt-update",
         type: "POST",
         data: data,
         processData: false,
         contentType: false, 
         enctype: 'multipart/form-data',
         success: function(data){
            let gantt = $("#gantt").dxGantt("instance");
            if(data.type_time == 1){
               gantt.updateTask(data.key, {start: data.start_default});
            }else if(data.type_time == 2){
               gantt.updateTask(data.key, {end: data.end_default});
            }
         }
      })
   },
   onTaskInserted: function (e) {
      console.log(e)
   },
   onTaskDblClick: function (e) {
      console.log(e)
   }
});

$(document).ready(function(){
   var data = new FormData();
   data.append('id', $('#project-id').val())
   $.ajax({
      url: "/api/project/gantt",
      type: "POST",
      data: data,
      processData: false,
      contentType: false, 
      enctype: 'multipart/form-data',
      success: function(data){
         tasks = data.tasks
         dependencies = data.dependencies
         resources = data.resources
         resourceAssignments = data.resourceAssignments
         $('#gantt').dxGantt({
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
            }
         });
      }
   })
})

</script>

@stop