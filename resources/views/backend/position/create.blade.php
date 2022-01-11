@extends('layouts.master')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- users edit start -->
<section class="users-edit">
    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
                    <!-- users edit account form start -->
                    <form class="form-validate">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <label>Vị trí công việc</label>
                                        <input type="text" class="form-control" placeholder="Username"
                                            value=""
                                            name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Phòng ban</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                              <div class="form-group">
                                  <label>Chức vụ</label>
                                  <select class="form-control">
                                      <option>1</option>
                                      <option>2</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-12">
                            <fieldset class="form-group">
                              <label>Mô tả</label>
                                <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea"></textarea>
                            </fieldset>
                        </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Lưu thay đổi</button>
                                <button type="reset" class="btn btn-light">Thoát</button>
                            </div>
                        </div>
                    </form>
                    <!-- users edit account form ends -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- users edit ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->
    @stop