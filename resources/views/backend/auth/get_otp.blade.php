@extends('layouts.auth')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- login page start -->
        <section id="auth-login" class="row flexbox-container">
            <div class="col-xl-8 col-11">
                <div class="card bg-authentication mb-0">
                    <form action="{{route('postLogin')}}" method="post">
                        @csrf
                    <div class="row m-0">
                        <!-- left section-login -->
                        
                        <div class="col-md-6 col-12 px-0">
                            <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                <div class="card-header pb-1">
                                    <div class="card-title">
                                        <h4 class="text-center mb-2">Đăng nhập</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/position">
                                        <div class="form-group mb-50">
                                            <label class="text-bold-600" for="exampleInputEmail1">Username</label>
                                            <input name="username" type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập username"></div>
                                        <div class="form-group">
                                            <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Nhập password">
                                        </div>
                                        <div
                                            class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                            <div class="text-right"><a href="/forgot-password"
                                            class="card-link"><small>Quên mật khẩu?</small></a></div>
                                        </div>
                                        <button type="submit" class="btn btn-primary glow w-100 position-relative">Đăng nhập<i
                                        id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- right section image -->
                        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                            <img class="img-fluid" src="assets/images/pages/login.png" alt="branding logo">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login page ends -->
    </div>
</div>
</div>
<!-- END: Content-->
@stop