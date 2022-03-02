@extends('layouts.auth')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- forgot password start -->
        <section class="row flexbox-container">
            <div class="col-xl-7 col-md-9 col-10  px-0">
                <div class="card bg-authentication mb-0">
                    <div class="row m-0">
                        <!-- left section-forgot password -->
                        <div class="col-md-6 col-12 px-0">
                            <div class="card disable-rounded-right mb-0 p-2">
                                <div class="card-header pb-1">
                                    <div class="card-title">
                                        <h4 class="text-center mb-2">Quên mật khẩu?</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="mb-2" method="post" action="{{route('change_password')}}">
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label class="text-bold-600">Nhập mã otp</label>
                                            <input required="" type="text" class="form-control" 
                                        placeholder="Otp" name="otp">
                                        {!! $errors->first('otp', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="text-bold-600">Nhập mật khẩu mới</label>
                                            <input required="" type="password" class="form-control"
                                        placeholder="Password" name="password">
                                        {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="text-bold-600">Xác thực mật khẩu</label>
                                            <input required="" type="text" class="form-control" 
                                        placeholder="Confirm password" name="c_password">
                                        {!! $errors->first('c_password', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                        <div class="form-group mb-2">
                                        @if(Session::get('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('success')}}
                                        </div>
                                        @elseif(Session::get('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{Session::get('error')}}
                                        </div>
                                        @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary alert-submit glow position-relative w-100">Xác nhận<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                    </form>
                                    <div class="text-center mb-4"><a href="/login"><small class="text-muted">Trở lại đăng nhập</small></a></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right section image -->
                                <div class="col-md-6 d-md-block d-none text-center align-self-center">
                                    <img class="img-fluid" src="assets/images/pages/forgot-password.png"
                                    alt="branding logo" width="300">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- forgot password ends -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.alert-submit').on('click', function(){
            alert('123');
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END: Content-->
    @stop