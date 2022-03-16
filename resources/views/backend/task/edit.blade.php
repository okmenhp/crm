@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-users.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-chat.min.css')}}">
<!-- END: Page CSS-->
@stop
@extends('layouts.master')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <section class="users-edit">
                <div class="row">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab"
                                        role="tabpanel">

                                        <form method="post" action="{{route('admin.task.store')}}">
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Tên công việc</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Nhập tên công việc" value="" name="name"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Công việc cha</label>
                                                            <select class="select2 form-control" name="parent_id">
                                                                @foreach($task_array as $key => $task)
                                                                <option value="{{$task->id}}">{{$task->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Người phụ trách</label>
                                                        <select class="select2 form-control" name="master_id">
                                                            @foreach($user_array as $key => $user)
                                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Người thực hiện</label>
                                                        <select class="select2 form-control" multiple="multiple"
                                                            name="user_id[]" style="width:100%;" required>
                                                            @foreach($user_array as $key => $user)
                                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="mb-1">
                                                            <h6>Ngày bắt đầu</h6>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left">
                                                                <input type="text" class="form-control pickadate"
                                                                    placeholder="Chọn ngày bắt đầu
                                                                " name="intended_start_time">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-calendar'></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="mb-1">
                                                            <h6>Ngày kết thúc</h6>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left">
                                                                <input type="text" class="form-control pickadate"
                                                                    placeholder="Chọn ngày kết thúc
                                                                " name="intended_end_time">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-calendar'></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Số giờ dự kiến</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Nhập số giờ" value="" name="time">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Thuộc dự án</label>
                                                        <select class="select2 form-control" name="project_id">
                                                            @foreach($project_array as $key => $project)
                                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Độ khó</label>
                                                        <select class="form-control" name="level">
                                                            <option value="1">Dễ</option>
                                                            <option value="2">Trung bình</option>
                                                            <option value="3">Khó</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Phân loại</label>
                                                        <select class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Hoàn thành</label>
                                                        <div class="progress progress-bar-primary mb-2">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                role="progressbar" aria-valuenow="20" aria-valuemin="20"
                                                                aria-valuemax="100" style="width:20%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit"
                                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Lưu
                                                        thay
                                                        đổi</button>
                                                    <button type="reset" class="btn btn-light">Thoát</button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card">
                            <div class="app-content content" style="margin-left:0px;">
                                <div class="content-area-wrapper" style="margin:25px;">
                                    <div class="sidebar-left">
                                        <div class="sidebar">

                                            <!-- app chat sidebar start -->
                                            <div class="chat-sidebar card">
                                                <span class="chat-sidebar-close">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                                <div class="chat-sidebar-search" style="position:relative">
                                                    <div class="d-flex align-items-center">
                                                        <div class="chat-sidebar-profile-toggle">
                                                            <div class="avatar">
                                                                <img src="https://scontent.fhph1-1.fna.fbcdn.net/v/t1.6435-1/196824814_649517239781782_318469577319149641_n.jpg?stp=dst-jpg_p160x160&_nc_cat=104&ccb=1-5&_nc_sid=7206a8&_nc_ohc=5pqYKmKbtg8AX9xnI_u&_nc_ht=scontent.fhph1-1.fna&oh=00_AT_Q4lfntoi5aSgmYgkkWXERz6liPGEhXpu2Wwz3QYG8gw&oe=624D2698"
                                                                    alt="user_avatar" height="36" width="36">
                                                            </div>
                                                        </div>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left mx-75 mb-0">
                                                            <input type="text" class="form-control round"
                                                                id="chat-search" placeholder="Tìm kiếm">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-search-alt text-dark"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="chat-sidebar-list-wrapper pt-2">
                                                    <!-- <h6 class="px-2 pb-25 mb-0">CHANNELS<i
                                                            class="bx bx-plus float-right cursor-pointer"></i></h6>
                                                    <ul class="chat-sidebar-list">
                                                        <li>
                                                            <h6 class="mb-0"># Devlopers</h6>
                                                        </li>
                                                        <li>
                                                            <h6 class="mb-0"># Designers</h6>
                                                        </li>
                                                    </ul> -->
                                                    <h6 class="px-2 pt-2 pb-25 mb-0">Hội thoại</h6>
                                                    <ul class="chat-sidebar-list">
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar m-0 mr-50"><img
                                                                        src="https://scontent.fhph1-2.fna.fbcdn.net/v/t39.30808-1/274278465_1910890722428886_5391902841935195481_n.jpg?stp=dst-jpg_p148x148&_nc_cat=106&ccb=1-5&_nc_sid=1eb0c7&_nc_ohc=BwWEFe3Tb7AAX8n-Hkk&_nc_ht=scontent.fhph1-2.fna&oh=00_AT8jA9xKVdtY4KcEHdYeDd7pTbkV0tOQ3On5SNahadFOZg&oe=62371436"
                                                                        height="36" width="36" alt="sidebar user image">
                                                                    <span class="avatar-status-online"></span>
                                                                </div>
                                                                <div class="chat-sidebar-name">
                                                                    <h6 class="mb-0">Tất cả</h6><span
                                                                        class="text-muted">trực tuyến</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <h6 class="px-2 pt-2 pb-25 mb-0">Thành viên<i
                                                            class="bx bx-plus float-right cursor-pointer"></i></h6>
                                                    <ul class="chat-sidebar-list">

                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar m-0 mr-50"><img
                                                                        src="https://scontent.fhph1-3.fna.fbcdn.net/v/t39.30808-1/217041362_1438978623121874_7302197747539454575_n.jpg?stp=dst-jpg_p200x200&_nc_cat=107&ccb=1-5&_nc_sid=7206a8&_nc_ohc=TRrdMp35pIoAX-w3G4F&tn=CoAASvTNMPHb_HpW&_nc_ht=scontent.fhph1-3.fna&oh=00_AT8ZOAkes9fHpVodDVb7Bw5ndfvTjAKiIiCoOABL6wasOQ&oe=62377C94"
                                                                        height="36" width="36" alt="sidebar user image">
                                                                    <span class="avatar-status-online"></span>
                                                                </div>
                                                                <div class="chat-sidebar-name">
                                                                    <h6 class="mb-0">Đỗ Tiến Đạt</h6><span
                                                                        class="text-muted">trực tuyến</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar m-0 mr-50"><img
                                                                        src="https://scontent.fhph2-1.fna.fbcdn.net/v/t39.30808-1/273424696_4795735260534096_6518809834390113709_n.jpg?stp=c0.77.200.200a_dst-jpg_p200x200&_nc_cat=109&ccb=1-5&_nc_sid=7206a8&_nc_ohc=nSuMRmc_KsIAX_10sUm&_nc_ht=scontent.fhph2-1.fna&oh=00_AT-DO_WvmQOD6D2gj_iDvmSE7xZVbWDnGcCu7MbrEuV2qg&oe=62361CBD"
                                                                        height="36" width="36" alt="sidebar user image">
                                                                    <span class="avatar-status-busy"></span>
                                                                </div>
                                                                <div class="chat-sidebar-name">
                                                                    <h6 class="mb-0">Huỳnh Việt Dũng</h6><span
                                                                        class="text-muted">vắng mặt</span>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- app chat sidebar ends -->
                                        </div>
                                    </div>
                                    <div class="content-right">
                                        <div class="content-overlay"></div>
                                        <div class="content-wrapper">
                                            <div class="content-header row">
                                            </div>
                                            <div class="content-body">
                                                <!-- app chat overlay -->
                                                <div class="chat-overlay"></div>
                                                <!-- app chat window start -->
                                                <section class="chat-window-wrapper">
                                                    <div class="chat-start">
                                                        <span
                                                            class="bx bx-message chat-sidebar-toggle chat-start-icon font-large-3 p-3 mb-1"></span>
                                                        <h4 class="d-none d-lg-block py-50 text-bold-500">Select a
                                                            contact to start a chat!</h4>
                                                        <button
                                                            class="btn btn-light-primary chat-start-text chat-sidebar-toggle d-block d-lg-none py-50 px-1">Start
                                                            Conversation!</button>
                                                    </div>
                                                    <div class="chat-area d-none">
                                                        <div class="chat-header">
                                                            <header
                                                                class="d-flex justify-content-between align-items-center border-bottom px-1 py-75">
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="chat-sidebar-toggle d-block d-lg-none mr-1">
                                                                        <i
                                                                            class="bx bx-menu font-large-1 cursor-pointer"></i>
                                                                    </div>
                                                                    <div class="avatar chat-profile-toggle m-0 mr-1">
                                                                        <img src="https://scontent.fhph1-2.fna.fbcdn.net/v/t39.30808-1/274278465_1910890722428886_5391902841935195481_n.jpg?stp=dst-jpg_p148x148&_nc_cat=106&ccb=1-5&_nc_sid=1eb0c7&_nc_ohc=BwWEFe3Tb7AAX8n-Hkk&_nc_ht=scontent.fhph1-2.fna&oh=00_AT8jA9xKVdtY4KcEHdYeDd7pTbkV0tOQ3On5SNahadFOZg&oe=62371436"
                                                                            alt="avatar" height="36" width="36" />
                                                                        <span class="avatar-status-online"></span>
                                                                    </div>
                                                                    <h6 class="mb-0">Tất cả</h6>
                                                                </div>
                                                                <div class="chat-header-icons">
                                                                    <span class="chat-icon-favorite">
                                                                        <i
                                                                            class="bx bx-star font-medium-5 cursor-pointer"></i>
                                                                    </span>
                                                                    <span class="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded font-medium-4 ml-25 cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer"
                                                                            id="dropdownMenuButton"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false" role="menu">
                                                                        </i>
                                                                        <span class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item"
                                                                                href="JavaScript:void(0);"><i
                                                                                    class="bx bx-pin mr-25"></i> Pin to
                                                                                top</a>
                                                                            <a class="dropdown-item"
                                                                                href="JavaScript:void(0);"><i
                                                                                    class="bx bx-trash mr-25"></i>
                                                                                Delete
                                                                                chat</a>
                                                                            <a class="dropdown-item"
                                                                                href="JavaScript:void(0);"><i
                                                                                    class="bx bx-block mr-25"></i>
                                                                                Block</a>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </header>
                                                        </div>
                                                        <!-- chat card start -->
                                                        <div class="card chat-wrapper shadow-none">
                                                            <div class="card-body chat-container">
                                                                <div class="chat-content">
                                                                    <div
                                                                        class="badge badge-pill badge-light-secondary my-1">
                                                                        14/3/2022</div>
                                                                    <div class="chat">
                                                                        <div class="chat-avatar">
                                                                            <a class="avatar m-0">
                                                                                <img src="https://scontent.fhph2-1.fna.fbcdn.net/v/t39.30808-1/273424696_4795735260534096_6518809834390113709_n.jpg?stp=c0.77.200.200a_dst-jpg_p200x200&_nc_cat=109&ccb=1-5&_nc_sid=7206a8&_nc_ohc=nSuMRmc_KsIAX_10sUm&_nc_ht=scontent.fhph2-1.fna&oh=00_AT-DO_WvmQOD6D2gj_iDvmSE7xZVbWDnGcCu7MbrEuV2qg&oe=62361CBD"
                                                                                    alt="avatar" height="36"
                                                                                    width="36" />
                                                                            </a>
                                                                        </div>
                                                                        <div class="chat-body">
                                                                            <div class="chat-message">
                                                                                <p>Chiều thứ 6 hàng tuần team IT họp tại
                                                                                    phòng họp 1.</p>
                                                                                <span class="chat-time">8:20 AM</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chat chat-left">
                                                                        <div class="chat-avatar">
                                                                            <a class="avatar m-0">
                                                                                <img src="https://scontent.fhph1-3.fna.fbcdn.net/v/t39.30808-1/217041362_1438978623121874_7302197747539454575_n.jpg?stp=dst-jpg_p200x200&_nc_cat=107&ccb=1-5&_nc_sid=7206a8&_nc_ohc=TRrdMp35pIoAX-w3G4F&tn=CoAASvTNMPHb_HpW&_nc_ht=scontent.fhph1-3.fna&oh=00_AT8ZOAkes9fHpVodDVb7Bw5ndfvTjAKiIiCoOABL6wasOQ&oe=62377C94"
                                                                                    alt="avatar" height="36"
                                                                                    width="36" />
                                                                            </a>
                                                                        </div>
                                                                        <div class="chat-body">
                                                                            <div class="chat-message">
                                                                                <p>Mọi người tiến hành đồng bộ code nhé
                                                                                </p>

                                                                                <span class="chat-time">8:40 AM</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="badge badge-pill badge-light-secondary my-1">
                                                                        Hôm qua</div>
                                                                    <div class="chat">
                                                                        <div class="chat-avatar">
                                                                            <a class="avatar m-0">
                                                                                <img src="https://scontent.fhph1-1.fna.fbcdn.net/v/t1.6435-1/196824814_649517239781782_318469577319149641_n.jpg?stp=dst-jpg_p160x160&_nc_cat=104&ccb=1-5&_nc_sid=7206a8&_nc_ohc=5pqYKmKbtg8AX9xnI_u&_nc_ht=scontent.fhph1-1.fna&oh=00_AT_Q4lfntoi5aSgmYgkkWXERz6liPGEhXpu2Wwz3QYG8gw&oe=624D2698"
                                                                                    alt="avatar" height="36"
                                                                                    width="36" />
                                                                            </a>
                                                                        </div>
                                                                        <div class="chat-body">
                                                                            <div class="chat-message">
                                                                                <p>Oke anh</p>
                                                                                <span class="chat-time">8:00 AM</span>
                                                                            </div>
                                                                            <div class="chat-message">
                                                                                <p>Anh em hỗ trợ vận chuyển máy tính
                                                                                    nhé</p>
                                                                                <span class="chat-time">8:01 AM</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div
                                                                        class="badge badge-pill badge-light-secondary my-1">
                                                                        Hôm nay</div>
                                                                    <div class="chat">
                                                                        <div class="chat-avatar">
                                                                            <a class="avatar m-0">
                                                                                <img src="https://scontent.fhph1-1.fna.fbcdn.net/v/t1.6435-1/196824814_649517239781782_318469577319149641_n.jpg?stp=dst-jpg_p160x160&_nc_cat=104&ccb=1-5&_nc_sid=7206a8&_nc_ohc=5pqYKmKbtg8AX9xnI_u&_nc_ht=scontent.fhph1-1.fna&oh=00_AT_Q4lfntoi5aSgmYgkkWXERz6liPGEhXpu2Wwz3QYG8gw&oe=624D2698"
                                                                                    alt="avatar" height="36"
                                                                                    width="36" />
                                                                            </a>
                                                                        </div>
                                                                        <div class="chat-body">
                                                                            <div class="chat-message">
                                                                                <p>Mọi người tải file tài liệu này về
                                                                                    nhé.
                                                                                </p>
                                                                                <span class="chat-time">3:34 AM</span>
                                                                            </div>
                                                                            <div class="chat-message">
                                                                                <p>https://balsamiq.cloud/sxzf0w/pmc7lhi/r5C12
                                                                                </p>
                                                                                <span class="chat-time">3:35 AM</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-footer chat-footer border-top px-2 pt-1 pb-0 mb-1">
                                                                <form class="d-flex align-items-center"
                                                                    onsubmit="chatMessagesSend();"
                                                                    action="javascript:void(0);">
                                                                    <i class="bx bx-face cursor-pointer"></i>
                                                                    <i class="bx bx-paperclip ml-1 cursor-pointer"></i>
                                                                    <input type="text"
                                                                        class="form-control chat-message-send mx-1"
                                                                        placeholder="Nhập đoạn hội thoại...">
                                                                    <button type="submit"
                                                                        class="btn btn-primary glow send d-lg-flex"><i
                                                                            class="bx bx-paper-plane"></i>
                                                                        <span
                                                                            class="d-none d-lg-block ml-1">Gửi</span></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- chat card ends -->
                                                    </div>
                                                </section>
                                                <!-- app chat window ends -->
                                                <!-- app chat profile right sidebar start -->
                                                <section class="chat-profile">
                                                    <header class="chat-profile-header text-center border-bottom">
                                                        <span class="chat-profile-close">
                                                            <i class="bx bx-x"></i>
                                                        </span>
                                                        <div class="my-2">
                                                            <div class="avatar">
                                                                <img src="https://scontent.fhph1-2.fna.fbcdn.net/v/t39.30808-1/274278465_1910890722428886_5391902841935195481_n.jpg?stp=dst-jpg_p148x148&_nc_cat=106&ccb=1-5&_nc_sid=1eb0c7&_nc_ohc=BwWEFe3Tb7AAX8n-Hkk&_nc_ht=scontent.fhph1-2.fna&oh=00_AT8jA9xKVdtY4KcEHdYeDd7pTbkV0tOQ3On5SNahadFOZg&oe=62371436"
                                                                    alt="chat avatar" height="100" width="100">
                                                            </div>
                                                            <h5 class="app-chat-user-name mb-0">Huỳnh Việt Dũng</h5>
                                                            <span>Devloper</span>
                                                        </div>
                                                    </header>
                                                    <div class="chat-profile-content p-2">
                                                        <h6 class="mt-1">ABOUT</h6>
                                                        <p>It is a long established fact that a reader will be
                                                            distracted by the readable content.</p>
                                                        <h6 class="mt-2">PERSONAL INFORMATION</h6>
                                                        <ul class="list-unstyled">
                                                            <li class="mb-25">email@gmail.com</li>
                                                            <li>+1(789) 950-7654</li>
                                                        </ul>
                                                    </div>
                                                </section>
                                                <!-- app chat profile right sidebar ends -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
</div>

<!-- END: Content-->
@stop

@section('script')
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/vendors/js/forms/select/select2.full.min.js')}}">
</script>
<script src="{{asset('assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/scripts/pages/app-users.min.js')}}"></script>
<scri pt src="{{asset('assets/js/scripts/navs/navs.min.js')}}"></scri>
<script src="{{asset('assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js')}}"></script>
<script src="{{asset('assets/js/scripts/forms/select/form-select2.min.js')}}"></script>
<script src="{{asset('assets/js/scripts/pages/app-chat.min.js')}}"></script>
<!--
END:
Page JS-->
@stop