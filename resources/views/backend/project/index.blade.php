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
                        <div class="row border rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-verified">Tên dự án</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="basicInput"
                                        placeholder="Nhập tên dự án">
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-role">Phòng ban</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-role">
                                        <option value="">Chọn phòng ban</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-1">
                                <label for="users-list-role">Tìm kiếm</label>
                                <button type="button" class="btn btn-icon btn-outline-primary btn-search"><i
                                        class="bx bx-search"></i></button>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <a href="/create-position" type="button" class="btn btn-primary btn-block my-2">
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
                            <div class="table-responsive">
                                <table id="users-list-datatable" class="table">
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
                                        <tr>
                                            <td>1</td>
                                            <td>Dean Stanley</td>
                                            <td>Project</td>
                                            <td>Dean Stanley</td>
                                            <td>
                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                    role="progressbar" aria-valuenow="80" aria-valuemin="80"
                                                    aria-valuemax="100" style="width:80%"></div>
                                            </td>
                                            <td>
                                                <div class="badge badge-primary mr-1 mb-1">Đang diễn ra</div>
                                                <div class="badge badge-secondary mr-1 mb-1">Chưa bắt đầu</div>
                                                <div class="badge badge-success mr-1 mb-1">Đã hoàn thành</div>
                                                <div class="badge badge-info mr-1 mb-1">Đơi xét duyệt</div>
                                                <div class="badge badge-warning mr-1 mb-1">Chậm tiến độ</div>
                                                <div class="badge badge-danger mb-1">Đã Huỷ</div>
                                            </td>
                                            <td><a href="/edit-project"><i class="far fa-edit"></i></a>
                                                <a href=""><i class="far fa-trash-alt ml-1"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Dean Stanley</td>
                                            <td>Project</td>
                                            <td>Dean Stanley</td>
                                            <td>
                                                <div class="badge badge-primary mr-1 mb-1">Đang diễn ra</div>
                                                <div class="badge badge-secondary mr-1 mb-1">Chưa bắt đầu</div>
                                                <div class="badge badge-success mr-1 mb-1">Đã hoàn thành</div>
                                                <div class="badge badge-info mr-1 mb-1">Đơi xét duyệt</div>
                                                <div class="badge badge-warning mr-1 mb-1">Chậm tiến độ</div>
                                                <div class="badge badge-danger mb-1">Đã Huỷ</div>
                                            </td>
                                            <td><a href="/edit-project"><i class="far fa-edit"></i></a>
                                                <a href=""><i class="far fa-trash-alt ml-1"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Dean Stanley</td>
                                            <td>Project</td>
                                            <td>Dean Stanley</td>
                                            <td>
                                                <div class="badge badge-primary mr-1 mb-1">Đang diễn ra</div>
                                                <div class="badge badge-secondary mr-1 mb-1">Chưa bắt đầu</div>
                                                <div class="badge badge-success mr-1 mb-1">Đã hoàn thành</div>
                                                <div class="badge badge-info mr-1 mb-1">Đơi xét duyệt</div>
                                                <div class="badge badge-warning mr-1 mb-1">Chậm tiến độ</div>
                                                <div class="badge badge-danger mb-1">Đã Huỷ</div>
                                            </td>
                                            <td><a href="/edit-project"><i class="far fa-edit"></i></a>
                                                <a href=""><i class="far fa-trash-alt ml-1"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Dean Stanley</td>
                                            <td>Project</td>
                                            <td>Dean Stanley</td>
                                            <td>
                                                <div class="badge badge-primary mr-1 mb-1">Đang diễn ra</div>
                                                <div class="badge badge-secondary mr-1 mb-1">Chưa bắt đầu</div>
                                                <div class="badge badge-success mr-1 mb-1">Đã hoàn thành</div>
                                                <div class="badge badge-info mr-1 mb-1">Đơi xét duyệt</div>
                                                <div class="badge badge-warning mr-1 mb-1">Chậm tiến độ</div>
                                                <div class="badge badge-danger mb-1">Đã Huỷ</div>
                                            </td>
                                            <td><a href="/edit-project"><i class="far fa-edit"></i></a>
                                                <a href=""><i class="far fa-trash-alt ml-1"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
<!--
BEGIN: Page JS-->
<scri pt src="assets/js/scripts/pages/app-users.min.js"></scri>
<!-- END: Page JS-->
@stop