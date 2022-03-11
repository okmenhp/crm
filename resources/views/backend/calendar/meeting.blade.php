@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-users.min.css') }}">
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
                        <form action="{{ route('admin.calendar.meeting.create') }}" method="post">
                            @csrf
                            <div class="row border rounded mb-2">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <fieldset class="form-group pt-2 mb-0">
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên phòng họp">
                                    </fieldset>
                                    @if($errors->any())
                                        <div style="margin: 0.5rem 0">
                                            <span class="text-danger my-1">*Vui lòng nhập tên phòng</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-6 col-lg-2 float-end">
                                    <button type="submit" class="btn btn-primary btn-block my-2">
                                        <i class="bx bx-plus"></i>
                                        <span>Thêm mới</span>
                                    </button>
                                </div>
                            </div>
                        </form>
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

                    <div class="users-list-table">
                        <div class="card">
                            <div class="card-body">
                                <!-- datatable start -->
                                @if (count($records) > 0)
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên phòng họp</th>
                                                    <th>Mã phòng họp</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($records as $key => $record)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $record->name }}</td>
                                                        <td>{{ $record->id }}</td>
                                                        <td>
                                                            <button data-id="{{ $record->id }}" class="meeting-edit border-0 bg-transparent" data-toggle="modal" data-target="#update">
                                                                <i class="far fa-edit"></i>
                                                            </button>
                                                            <form style="display: inline-block" method="POST" action="{{ route('admin.calendar.meeting.delete') }}">
                                                                @csrf
                                                                <input name="id" value="{{$record->id}}" type="hidden">
                                                                <a type="submit" href="#" class="show_confirm" data-toggle="tooltip" title='Delete'> 
                                                                    <i class="fa fa-trash-alt"></i>
                                                                </a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal fade" id="update" aria-labelledby="update" aria-hidden="true" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.calendar.meeting.update') }}" method="post">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Chỉnh sửa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input id="meeting-id" type="hidden" name="id" value="">
                                                        <input id="meeting-name" type="text" name="name" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                                                    </div>
                                                </form>
                                            </div>
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
    <script src="{{asset('assets/js/scripts/pages/calendar-type-meeting.js')}}"></script>
    <script type="text/javascript"></script>
    <!-- END: Page JS-->
@stop
