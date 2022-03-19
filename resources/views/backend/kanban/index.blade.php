@extends('layouts.master')
@section('css')

<!-- @đBEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/jkanban/jkanban.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/editors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/calendars/tui-calendar.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/main/context-menu.css')}}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-kanban.css')}}">
<!-- END: Page CSS-->

@stop
@section('content')
<!-- BEGIN: Content-->
<!-- BEGIN: Content-->

<div class="context-menu pr-1 pl-1">
  <div class="form-group">
      <label class="mt-1">Chọn user</label>
      <select class="form-control " data-icon="" multiple="" style="z-index: 1000000 !important;">
          <option style="z-index: 1000000 !important;">123</option>
          <option>456</option>
      </select>
    <button class="btn btn-primary mt-1">Lưu</button>
    </div>  
</div>

<input type="hidden" name="" id="project_id" value="{{$project_id}}">
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
                <h5 class="content-header-title float-left pr-1 mb-0">Quản lý công việc</h5>
                <div class="breadcrumb-wrapper d-none d-sm-block">
                    <ol class="breadcrumb p-0 mb-0 pl-1">
                        <li class="breadcrumb-item"><a href="/home"><i class="bx bx-home-alt"></i></a>
                        </li> >>
                        <a style="margin-top: 1px;"    href="{{route('admin.project.index')}}"><li class="breadcrumb-item active">
                            Dự án
                        </li>
                        </a>  >> 
                        <a style="margin-top: 1px;"  href="{{route('admin.project.index')}}"><li class="breadcrumb-item active">
                            Danh sách công việc
                        </li>
                        </a>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <div class="content-body">
            <!-- Basic Kanban App -->
            <div class="kanban-overlay"></div>
            <section id="kanban-wrapper">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary mb-1" id="add-kanban">
                            <i class='bx bx-add-to-queue mr-50'></i> Thêm danh sách mới
                        </button>
                        <div id="kanban-app"></div>
                    </div>
                </div>
                


                <!-- User new mail right area -->
              <!--   <div class="kanban-sidebar">
                    <div class="card shadow-none quill-wrapper">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom px-2 py-1">
                            <h3 class="card-title">Thông tin công việc</h3>
                            <button type="button" class="close close-icon">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                       {{--  <form class="edit-kanban-item">
                            <div class="kanban-edit-content" style="overflow-y: scroll;">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" class="form-control edit-kanban-item-title"
                                            placeholder="kanban Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian bắt đầu</label>
                                        <input type="date" class="form-control edit-kanban-item-date" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian kết thúc</label>
                                        <input type="date" class="form-control edit-kanban-item-date" placeholder="">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select class="form-control text-white">
                                                    <option class="bg-primary" selected>Đang xử lý</option>
                                                    <option class="bg-danger">Quá hạn</option>
                                                    <option class="bg-success">Hoàn thành</option>

                                                    <option class="bg-warning">Sắp quá hạn</option>
                                                    <option class="bg-secondary">Chưa xử lý</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Member</label>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar m-0 mr-1">
                                                        <img src="../../../assets/images/portrait/small/avatar-s-20.jpg"
                                                            height="36" width="36" alt="avtar img holder">
                                                    </div>
                                                    <div class="badge-circle badge-circle-light-secondary">
                                                        <i class="bx bx-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tài liệu</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="emailAttach">
                                            <label class="custom-file-label" for="emailAttach">Chọn tài
                                                liệu</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Bình luận</label>
                                        <div class="snow-container border rounded p-1">
                                            <div class="compose-editor"></div>
                                            <div class="d-flex justify-content-end">
                                                <div class="compose-quill-toolbar">
                                                    <span class="ql-formats mr-0">
                                                        <button class="ql-bold"></button>
                                                        <button class="ql-italic"></button>
                                                        <button class="ql-underline"></button>
                                                        <button class="ql-link"></button>
                                                        <button class="ql-image"></button>
                                                        <button class="btn btn-sm btn-primary btn-comment ml-25">Bình
                                                            luận</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="reset"
                                    class="btn btn-light-danger delete-kanban-item d-flex align-items-center mr-1">
                                    <i class='bx bx-trash mr-50'></i>
                                    <span>Xoá</span>
                                </button>
                                <button class="btn btn-primary glow update-kanban-item d-flex align-items-center">
                                    <i class='bx bx-send mr-50'></i>
                                    <span>Xác nhận</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div> -->
                <!--/ User Chat profile right area -->
            </section>
            <!--/ Sample Project kanban -->
            <!-- Button trigger modal -->
         {{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Launch demo modal
            </button> --}}

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form class="edit-kanban-item" action="{{route('admin.task_kanban.update')}}" method="post">
                  <div class="modal-body">
                            <input type="hidden" name="list_id" id="list_id">
                            <input type="hidden" name="card_id" id="card_id">
                            <input type="hidden" name="project_id" id="project_id" value="{{$project_id}}">
                            <div class="kanban-edit-content">
                                <div class="card-body" style="padding-top: 0px !important;">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input required="" type="text" name="name" class="form-control edit-kanban-item-title"
                                            placeholder="kanban Title">
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-6">
                                        <label>Bắt đầu dự kiến</label>
                                        <input name="intended_start_time" id="intended_start_time" type="date" class="form-control " placeholder="">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Kết thúc dự kiến</label>
                                        <input name="intended_end_time" id="intended_end_time" type="date" class="form-control" placeholder="">
                                    </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Người quản lý</label>
                                                <div class="d-flex align-items-center">
                                                    <select class="form-control" style="color: black !important;" id="manager_id" name="manager_id">    
                                                     @foreach($user_option as $u_o)
                                                         <option value="{{$u_o->id}}">{{$u_o->full_name}}</option>
                                                     @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Người tham gia</label>
                                                <div class="d-flex align-items-center">
                                                    <select data-icon="/asset" required="" class="select2-icons form-control" name="user_id[]" multiple="">    
                                                    @foreach($user_option as $u_o)
                                                         <option selected="" value="{{$u_o->id}}">{{$u_o->full_name}}</option>
                                                     @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-6">
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1" class="bg-primary text-white" selected>Đang xử lý</option>
                                                    <option value="2" class="bg-danger text-white">Quá hạn</option>
                                                    <option value="3" class="bg-success text-white">Hoàn thành</option>
                                                    <option value="4" class="bg-warning text-white">Sắp quá hạn</option>
                                                    <option value="5" class="bg-secondary text-white">Chưa xử lý</option>
                                                </select>
                                            </div>
                                    </div>
                                     <div class="col-6">
                                            <div class="form-group">
                                                <label>Độ ưu tiên</label>
                                                <select style="color:black !important;" id="level" name="level" class="form-control">
                                                    <option value="1" class="" >Thấp</option>
                                                    <option value="2" class="" selected>Trung bình</option>
                                                    <option value="3" class="">Cao</option>
                                                </select>
                                            </div>
                                    </div>
                                    </div>
                                   <div class="input-group mt-1 mb-1">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file[]" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02">Chọn tài liệu</label>
                                      </div>
                                      <div class="input-group-append">
                                        <span class="input-group-text" id="open-file">Pacific Drive</span>
                                      </div>
                                    </div>
                                    <div class="modal file-view fade" id="file-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 999999">
                                      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                        <div class="modal-content border border-secondary">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pacific Drive</h5>
                                            <button type="button" class="close close-view-file">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row file-view-area">
                                            </div>
                                          </div>
                                          {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div> --}}
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Danh sách công việc con</label>
    

                                        <div id="newRow">
                                              
                                        </div>
                                  
                                        {{-- <div id="newRow"></div> --}}
                                        <button id="addRow" type="button" class="btn btn-outline-info mb-1">Thêm công việc con</button>
                                    </div>
                                </div>
                                
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                        aria-valuemax="100" style=""></div>
                                </div>
                               
                            </div>
                             <div class="form-group">
                                    <label>Bình luận</label>
                                    <textarea class="form-control" rows="3" placeholder="Nhập bình luận"></textarea>
                                </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
    </div>
</div>


<!-- END: Content-->
@stop
@section('script')

<!-- BEGIN: Page Vendor JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/vendors/js/jkanban/jkanban.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/editors/quill/quill.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/scripts/pages/app-kanban.js')}}"></script>
<script src="{{asset('assets/js/scripts/pages/kanban-scroll.js')}}"></script>
<script src="{{asset('assets/js/main/context-menu.js')}}"></script>
<!-- END: Page JS-->

<script type="text/javascript">

    // xem file
    $('#open-file').click(function(){
      $.ajax({
        type: "post",
        url: '/api/file/viewFile',
        dataType: 'JSON',
        async: false,
        data: {},
        success: function(data){
          $('.file-view-area').html('')
          for(let i=0; i<data.data.length; i++){
            var image = '';
            if(['jpg','png','jpeg'].includes(data.data[i].format)){
              image = '<img class="d-block mx-auto icon-image" src="" alt="Card image cap">'
            }else if(['doc','docx'].includes(data.data[i].format)){
              image = '<img class="d-block mx-auto" src="{{asset('assets/images/file/word.png')}}" width="55" alt="Card image cap">'
            }else if(['xls','xlsx'].includes(data.data[i].format)){
              image = '<img class="d-block mx-auto" src="{{asset('assets/images/file/excel.png')}}" width="55" alt="Card image cap">'
            }else if(['pdf'].includes(data.data[i].format)){
              image = '<img class="d-block mx-auto" src="{{asset('assets/images/file/pdf.png')}}" width="55" alt="Card image cap">'
            }else{
              image = '<img class="d-block mx-auto" src="{{asset('assets/images/file/no-format.png')}}" width="55" alt="Card image cap">'
            }
            $('.file-view-area').append('<div class="col-md-3">'+
                                          '<div class="card border shadow-none mb-1 app-file-info">'+
                                            '<div class="app-file-content-logo card-img-top d-flex align-items-center" style="background-color: #f2f4f4; height: 7rem">'+
                                                image +
                                            '</div>'+
                                            '<div class="card-body p-50">'+
                                                '<input type="hidden" class="link" value="'+data.data[i].link+'" />'+
                                                '<div class="app-file-details">'+
                                                    '<div class="app-file-name font-size-small font-weight-bold">'+
                                                        data.data[i].name + '</div>'+
                                                    '<div class="app-file-size font-size-small text-muted mb-25">'+
                                                        data.data[i].size/1000 + 'kb'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                          '</div>'+
                                        '</div>')
          }
          $('#file-view').modal('show')
        }
      })
    })

    // $(document).on('dblclick', '.app-file-info', function(){
    //   console.log($(this).find('.link').val())
    //   $('#inputGroupFile02').val($(this).find('.link').val())
    //   $('#file-view').modal('hide')
    // })

    $('.close-view-file').click(function(){
      $('#file-view').modal('hide')
    })
      
    // add row
    var i = 0;
    $("#addRow").click(function () {
        if(i == 1){
            alert('Vui lòng thêm công việc mới trước đó');
            return;
        }
        i++;
        var html = '';
        html += `<div class="row form-group" id="inputFormRow" data-id="2">
                    <div class="col-3">
                    <label>Tên công việc</label>
                    <input id="subTaskName" type="" class="form-control" name="">
                    </div>
                    <div class="col-3">
                    <label>Người thực hiện</label>
                     <select class="form-control select2" id="subTaskUser" name="user_id">    
                       {!!$user_html!!}
                    </select>
                    </div>
                     <div class="col-2">
                    <label>Dự kiến bắt đầu</label>
                    <input type="datetime-local" class=" form-control" id="subTaskStart" name="">
                    </div>
                    <div class="col-2">
                    <label>Dự kiến kết thúc</label>
                    <input type="datetime-local" class=" form-control" id="subTaskEnd" name="">
                    </div>
                    <div class="col-1">
                    <button type="button" id="addSubTask" data-task_id="" class="btn btn-outline-primary" style="position: absolute; bottom: 0;">Thêm</button>
                    </div>
                    <div class="col-1">
                    <button type="buttom" id="removeRow" class="btn btn-outline-danger" style="position: absolute; bottom: 0;">Huỷ</button>
                    </div>
                </div>`;
        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        i--;
        $(this).closest('#inputFormRow').remove();
    });

    $(document).on('click', '#addSubTask', function () {
        let task_id = $('#card_id').val();
        let parent = $(this).parents('#inputFormRow');
        let name = parent.find('#subTaskName').val();
        let user_id = parent.find('#subTaskUser').val();
        let intended_start_time = parent.find('#subTaskStart').val();
        let intended_end_time = parent.find('#subTaskEnd').val();
        add_sub_task(name, user_id, intended_start_time, intended_end_time, task_id);
    });

    function add_sub_task(name, user_id, intended_start_time, intended_end_time, parent_id){
        $.ajax({
        type: "post",
        url: '/api/task/add-subtask',
        dataType: 'JSON',
        async: false,
        data: {
          parent_id : parent_id,
          name : name,
          user_id : user_id,
          intended_start_time : intended_start_time,
          intended_end_time : intended_end_time
        }
      }).done(function(resp) {
          console.log('resp', resp);
          window.location.reload();
      });
    }

    $(document).on('click','.check_task', function(){
        let task_id = $(this).data('task_id');
        let id = $(this).data('id');
        if($(this).is(":checked")){
            $('#input_' + id).prop('disabled', true);
            var checked = 1;
        }else{
            $('#input_' + id).prop('disabled', false);
            var checked = null;
        }
        checked_task(task_id, checked);
    });

    function checked_task(task_id, checked){
        $.ajax({
        type: "post",
        url: '/api/task/checked',
        dataType: 'JSON',
        async: false,
        data: {
          task_id : task_id,
          checked : checked
        }
      }).done(function(resp) {
        let bar_html =  `<div class="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100" style="width:`+resp.data+`%;"></div>`;
        $('.progress').html(bar_html);
      });
    }

    $('.todo-p').on('click',function(){
       
    });
 
</script>


@stop