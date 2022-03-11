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
                        <form>
                            <div class="row border rounded py-2 mb-2">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="users-list-verified">Tìm kiếm</label>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" placeholder="Tìm kiếm">
                                    </fieldset>
                                </div>

                                {{-- <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-role">Phòng ban</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-role" name="department_search">
                                        <option value="">Chọn phòng ban</option>
                                        @foreach ($department_array as $key => $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div> --}}

                                {{-- <div class="col-12 col-sm-6 col-lg-1">
                                    <label for="users-list-role">Tìm kiếm</label>
                                    <button type="button" class="btn btn-icon btn-outline-primary btn-search"><i
                                            class="bx bx-search"></i></button>
                                </div> --}}

                                <div class="col-12 col-sm-6 col-lg-2">
                                    <a href="{{ route('admin.customer.create') }}" type="button"
                                        class="btn btn-primary btn-block my-2">
                                        <i class="bx bx-plus"></i>
                                        <span>Thêm mới</span>
                                    </a>
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
                                        <table id="users-list-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên khách hàng</th>
                                                    <th>Điện thoại</th>
                                                    <th>Quốc gia</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($records as $key => $record)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td> {{ $record->name }}</td>
                                                        {{-- <td> <a
                                                                href="{{ route('admin.customer.detail', $record->id) }}">{{ $record->name }}</a>
                                                        </td> --}}
                                                        <td>{{ $record->phone_number }}</td>
                                                        <td>{{ $record->countries->country_name }}</td>
                                                        {{-- <td>{{ $record->customer_types->name }}</td> --}}
                                                        <td>
                                                            <a href="{{ route('admin.customer.edit', $record->id) }}"><i
                                                                    class="far fa-edit"></i></a>
                                                            <form style="display: inline-block" method="POST"
                                                                action="{{ route('admin.customer.destroy', $record->id) }}">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <a href="#" class="show_confirm" data-toggle="tooltip"
                                                                    title='Delete'> <i class="fa fa-trash-alt ml-1">
                                                                    </i></a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div style="vertical-align: middle;">
                                            {!! $records->links() !!}
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
    <!-- BEGIN: Page Vendor JS-->
    <script src="assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="assets/js/scripts/pages/app-users.min.js"></script>
    <!-- END: Page JS-->
@stop
