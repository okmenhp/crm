@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/pages/app-users.min.css">
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
                    <form>
                        <div class="row border rounded  mb-2">
                            <form action="{{route('admin.user.index')}}" method="get">
                            <div class="col-12 col-sm-6 col-lg-3">
                                {{-- <label for="users-list-verified">Tên chức vụ</label> --}}
                                <fieldset class="form-group pt-2">
                                    <input type="text" name="searchText" value="{{Request::get('searchText')}}" class="form-control" id=""
                                        placeholder="Nhập tên nhân viên">
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-1 pt-2">
                                <button type="submit"  class="btn btn-icon btn-outline-primary btn-search "><i
                                        class="bx bx-search"></i></button>
                            </div>
                            </form>
                            <div class="col-12 col-sm-6 col-lg-2 float-end">
                                <a href="{{route('admin.user.create')}}" type="button" class="btn btn-primary btn-block my-2">
                                    <i class="bx bx-plus"></i>
                                    <span>Thêm mới</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="users-list-table">
                    <div class="card">
                        <div class="card-body">
                            <!-- datatable start -->
                            @if(count($records) > 0)
                            <div class="table-responsive">
                                <table id="" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tên người dùng</th>
                                            <th>Chức vụ</th>
                                            <th>Phòng ban</th>
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($records as $key => $record)
                                        <tr>
                                            <td>
                                                @if($record->record != null)
                                                <img class="rounded-circle" height="40px;" width="40px;" src="{{asset($record->avatar)}}">
                                                @else
                                                <img class="rounded-circle" height="40px;" width="40px;" src="{{asset('assets/images/profile/account.png')}}">
                                                @endif
                                                {{$record->full_name}}</td>
                                            <td>{{$record->position->name}}</td>
                                            <td>{{$record->department->name}}</td>
                                            <td>{{$record->created_at()}}</td>
                                            <td>
                                                @if($record->status == 1) 
                                                    <span class="badge badge-success">Hoạt động</span>
                                                @else
                                                    <span class="badge badge-secondary">Khoá</span>
                                                @endif 
                                            </td>
                                            <td><a href="{{route('admin.user.edit', $record->id)}}"><i class="far fa-edit"></i></a>
                                            <form style="display: inline-block" method="POST" action="{{ route('admin.user.destroy', $record->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a href="#" onclick="this.parentNode.submit();" class="show_confirm" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash-alt"> </i></a>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="vertical-align: middle;">
                                </div>
                            </div>  
                            @else
                            <b>Không tìm thấy kết quả</b>
                            @endif      
                            <!-- datatable ends -->
                        </div>
                    </div>
                   
                </div>
            </section>
            <!-- users list ends -->
        </div>
    </div>
</div>
<!-- END: Content-->
@stop
@section('script')
         
<script src="assets/js/scripts/pages/app-users.min.js"></script>
<script type="text/javascript"></script>
<!-- END: Page JS-->
@stop