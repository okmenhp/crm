<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @include('layouts/__head')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-file-manager.min.css')}}">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern semi-dark-layout content-left-sidebar file-manager-application navbar-sticky footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    @include('layouts/__header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts/__sidebar')
    <!-- END: Main Menu-->

    <style type="text/css">
        .icon-file{
            width: 30px;
            height: 30px;
        }

        .icon-image{
            width: 100%;
            height: 80px;
            object-fit: contain;
        }
    </style>
    <!-- Modal upload -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Upload file</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="{{route('admin.file.upload', $uid)}}" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Vui lòng chọn file</label>
              <input class="form-control" type="file" name="file" id="formFileMultiple" multiple>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
            <button type="submit" class="btn btn-primary">Tải lên</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<!--  End modal upload -->


    <!-- Modal folder -->
    <div class="modal fade" id="modalFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Thêm folder mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="{{route('admin.file.createFolder', $uid)}}">
            @csrf
          <div class="modal-body">
             
            <div class="mb-3">

              <label for="formFileMultiple" class="form-label">Vui lòng nhập tên folder</label>
             <input required="" type="text" name="folder" placeholder="Nhập tên folder" class="form-control">
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
<!--  End modal upload -->
    

    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="app-file-sidebar sidebar-content d-flex">
                        <!-- App File sidebar - Left section Starts -->
                        <div class="app-file-sidebar-left">
                            <!-- sidebar close icon starts -->
                            <span class="app-file-sidebar-close"><i class="bx bx-x"></i></span>
                            <!-- sidebar close icon ends -->
                            <div class="form-group add-new-file text-center">
                                <!-- Add File Button -->
                                
                                 <button type="submit" style="width: 100%;" class="btn btn-warning mt-2" data-toggle="modal" data-target="#modalFolder">
                                    <i class="bx bx-plus"></i> Folder mới
                                  </button>
                                <button type="submit" style="width: 100%;" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="bx bx-plus"></i> Thêm file
                                  </button>
                                
                            </div>
                            <div class="app-file-sidebar-content">
                                <!-- App File Left Sidebar - Drive Content Starts -->
                                <label class="app-file-label">Quản lý tệp tin</label>
                                <div class="list-group list-group-messages my-50">
                                    <a href="javascript:void(0);"
                                        class="list-group-item list-group-item-action pt-0 active">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-folder"></i>
                                        </div>
                                        Tất cả tệp tin
                                        <span
                                            class="badge badge-light-danger badge-pill badge-round float-right mt-50">{{count($records_folder)}}</span>
                                    </a>
                                    <!-- <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-desktop"></i>
                                        </div>
                                        My Devices
                                    </a> -->
                                    <!-- <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-clock"></i>
                                        </div> Recents
                                    </a> -->
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-star"></i>
                                        </div>
                                        Tệp tin quan trọng
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-trash-alt"></i>
                                        </div>
                                        Thùng rác
                                    </a>
                                </div>
                                <!-- App File Left Sidebar - Drive Content Ends -->


                                <!-- App File Left Sidebar - Labels Content Starts -->
                                <!-- <label class="app-file-label">Labels</label>
                                <div class="list-group list-group-labels my-50">
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action pt-0">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-file"></i>
                                        </div>
                                        Documents
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-images"></i>
                                        </div>
                                        Images
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-video"></i>
                                        </div> Videos
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-music"></i>
                                        </div>
                                        Audio
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <div class="fonticon-wrap d-inline mr-25">
                                            <i class="fal fa-file-archive"></i>
                                        </div>
                                        Zip Files
                                    </a>
                                </div> -->
                                <!-- App File Left Sidebar - Labels Content Ends -->

                                <!-- App File Left Sidebar - Storage Content Starts -->
                                <label class="app-file-label mb-75">Lưu trữ</label>
                                <div class="d-flex mb-1">
                                    <div class="fonticon-wrap mr-1">
                                        <i class="fal fa-save"></i>
                                    </div>
                                    <div class="file-manager-progress">
                                        <span class="text-muted font-size-small">19.5GB/ 25GB</span>
                                        <div class="progress progress-bar-primary progress-sm mb-0">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="80" aria-valuemax="100" style="width:80%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="javascript:void(0);" class="font-weight-bold">Upgrade Storage</a> -->
                                <!-- App File Left Sidebar - Storage Content Ends -->
                            </div>
                        </div>
                    </div>
                    <!-- App File sidebar - Right section Starts -->
                    <div class="app-file-sidebar-info">
                        <div class="card shadow-none mb-0 p-0 pb-1">
                            <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                                <h6 class="mb-0">Document.pdf</h6>
                                <div class="app-file-action-icons d-flex align-items-center">
                                    <i class="bx bx-trash cursor-pointer mr-50"></i>
                                    <i class="bx bx-x close-icon cursor-pointer"></i>
                                </div>
                            </div>
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                <li class="nav-item mr-1 pt-50 pr-1 border-right">
                                    <a class=" nav-link active d-flex align-items-center" id="details-tab"
                                        data-toggle="tab" href="#details" aria-controls="details" role="tab"
                                        aria-selected="true">
                                        <i class="bx bx-file mr-50"></i>Details</a>
                                </li>
                                <li class="nav-item pt-50 ">
                                    <a class=" nav-link d-flex align-items-center" id="activity-tab" data-toggle="tab"
                                        href="#activity" aria-controls="activity" role="tab" aria-selected="false">
                                        <i class="bx bx-pulse mr-50"></i>Activity</a>
                                </li>
                            </ul>
                            <div class="tab-content pl-0">
                                <div class="tab-pane active" id="details" aria-labelledby="details-tab" role="tabpanel">
                                   <!--  <div class="border-bottom d-flex align-items-center flex-column pb-1">
                                        <img src="assets/images/icon/pdf.png" alt="PDF" height="42" width="35"
                                            class="my-1">
                                        <p class="mt-2">15.3mb</p>
                                    </div> -->
                                    <div class="card-body pt-2">
                                        <label class="app-file-label">Setting</label>
                                        <div class="d-flex justify-content-between align-items-center mt-75">
                                            <p>File Sharing</p>
                                            <div
                                                class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitchGlow1">
                                                <label class="custom-control-label" for="customSwitchGlow1"></label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Synchronization</p>
                                            <div
                                                class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitchGlow2" checked>
                                                <label class="custom-control-label" for="customSwitchGlow2"></label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Backup</p>
                                            <div
                                                class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitchGlow3">
                                                <label class="custom-control-label" for="customSwitchGlow3"></label>
                                            </div>
                                        </div>

                                        <label class="app-file-label">Info</label>
                                        <div class="d-flex justify-content-between align-items-center mt-75">
                                            <p>Type</p>
                                            <p class="font-weight-bold">PDF</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Size</p>
                                            <p class="font-weight-bold">15.6mb</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Location</p>
                                            <p class="font-weight-bold">Files > Documents</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Owner</p>
                                            <p class="font-weight-bold">Elnora Reese</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Modified</p>
                                            <p class="font-weight-bold">September 4 2019</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Opened</p>
                                            <p class="font-weight-bold">July 8, 2019</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Created</p>
                                            <p class="font-weight-bold">July 1, 2019</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane pl-0" id="activity" aria-labelledby="activity-tab" role="tabpanel">
                                    <div class="card-body">
                                        <ul class="timeline mb-0">
                                            <li class="timeline-item timeline-icon-success active">
                                                <div class="timeline-time">Today</div>
                                                <h6 class="timeline-title">You added an item to</h6>
                                                <p class="timeline-text">You added an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/psd.png" alt="PSD" height="30"
                                                        width="25" class="mr-50">Mockup.psd
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-icon-info active">
                                                <div class="timeline-time">10 min ago</div>
                                                <h6 class="timeline-title">You shared 2 times</h6>
                                                <p class="timeline-text">Emily Bennett edited an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/sketch.png" alt="Sketch" height="30"
                                                        width="25" class="mr-50">Template_Design.sketch
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-icon-danger active">
                                                <div class="timeline-time">Mon 10:20 PM</div>
                                                <h6 class="timeline-title">You edited an item</h6>
                                                <p class="timeline-text">You edited an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/pdf.png" alt="document" height="30"
                                                        width="25" class="mr-50">Information.doc
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-icon-primary active">
                                                <div class="timeline-time">Jul 13 2019</div>
                                                <h6 class="timeline-title">You edited an item</h6>
                                                <p class="timeline-text">John Keller edited an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/pdf.png" alt="document" height="30"
                                                        width="25" class="mr-50">Documentation.doc
                                                </div>
                                            </li>
                                            <li class="timeline-item timeline-icon-warning">
                                                <div class="timeline-time">Apr 18 2019</div>
                                                <h6 class="timeline-title">You added an item to</h6>
                                                <p class="timeline-text">You edited an item</p>
                                                <div class="timeline-content">
                                                    <img src="assets/images/icon/pdf.png" alt="document" height="30"
                                                        width="25" class="mr-50">Resume.pdf
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- App File sidebar - Right section Ends -->

                </div>
            </div>
            <div class="content-right">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <!-- File Manager app overlay -->
                        <div class="app-file-overlay"></div>
                        <div class="app-file-area">
                            <!-- File App Content Area -->
                            <!-- App File Header Starts -->
                            <div class="app-file-header">
                                <!-- Header search bar starts -->
                                <div class="app-file-header-search flex-grow-1">
                                    <div class="sidebar-toggle d-block d-lg-none">
                                        <i class="bx bx-menu"></i>
                                    </div>
                                    <fieldset class="form-group position-relative has-icon-left m-0">
                                        <input type="text" class="form-control border-0 shadow-none" id="file-search"
                                            placeholder="Tìm kiếm">
                                        <div class="form-control-position">
                                            <i class="bx bx-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <!-- Header search bar Ends -->
                                <!-- Header Icons Starts -->
                                <div class="app-file-header-icons">
                                    <div class="fonticon-wrap d-inline mx-sm-1 align-middle">
                                        <i class="fal fa-user"></i>
                                    </div>
                                    <div class="fonticon-wrap d-inline mr-sm-50 align-middle">
                                        <i class="fal fa-trash-alt"></i>
                                    </div>
                                    <i
                                        class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i>
                                </div>
                                <!-- Header Icons Ends -->
                            </div>
                            <!-- App File Header Ends -->

                            <!-- App File Content Starts -->
                            <div class="app-file-content p-2">
                               
                                <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.file.index', 0)}}">File của tôi</a></li>
                                    <li class="breadcrumb-item"><a href="#">Folder</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Folder1</li>
                                  </ol>
                                </nav>
                                <!-- App File - Folder Section Starts -->
                                @if(count($records_folder) > 0 )
                                <label class="app-file-label">Thư mục</label>
                                <div class="row app-file-folder">
                                    @foreach($records_folder as $record_folder)
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info" data-uid="{{$record_folder->uid}}">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <img class="icon-file" src="{{asset('assets/images/file/folder.png')}}">
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            {{$record_folder->name}}</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">{{$record_folder->count}} files, {{$record_folder->size}}mb</div>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-sm" id="context-menu">
                                           <a class="dropdown-item" href="{{route('admin.file.index', $record_folder->uid)}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Mở</a>
                                           <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>&nbsp; Đổi tên</a>
                                          <!--  <a class="dropdown-item" href="#"><i class="fas fa-file-export"></i>&nbsp; Chuyển tới</a> -->
                                           <a class="dropdown-item" href="#"><i class="fas fa-share-square"></i>&nbsp; Chia sẻ</a>
                                            <form method="post" action="{{route('admin.file.delete', $record_folder->id)}}">
                                             {!! method_field('DELETE') !!}
                                             @csrf
                                           <button type="submit"><i class="fas fa-trash-alt"></i>&nbsp; Xoá</button>
                                           </form>
                                           <a class="dropdown-item" href=""><i class="fas fa-file-alt"></i>&nbsp; Thông tin</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                <!-- App File - Folder Section Ends -->

                                <!-- App File - Files Section Starts -->
                                @if(count($records_file) > 0 )
                                <label class="app-file-label">Tệp tin</label>
                                <div class="row app-file-files">
                                    @foreach($records_file as $record_file)
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                               <!--  <i class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i> -->
                                                @if(in_array($record_file->format,['jpg','png','jpeg']))
                                                <img class="d-block mx-auto icon-image" src="{{ Storage::url($record_file->link) }}"  alt="Card image cap">
                                                @elseif(in_array($record_file->format,['doc','docx']))
                                                <img class="d-block mx-auto" src="{{asset('assets/images/file/word.png')}}" height="80" width="55" alt="Card image cap">
                                                @elseif(in_array($record_file->format,['xls','xlsx']))
                                                <img class="d-block mx-auto" src="{{asset('assets/images/file/excel.png')}}" height="80" width="55" alt="Card image cap">
                                                @elseif(in_array($record_file->format,['pdf']))
                                                <img class="d-block mx-auto" src="{{asset('assets/images/file/pdf.png')}}" height="80" width="55" alt="Card image cap">
                                                @else
                                                <img class="d-block mx-auto" src="{{asset('assets/images/file/no-format.png')}}" height="80" width="55" alt="Card image cap">
                                                @endif
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        {{$record_file->name}}</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">{{$record_file->size}}kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Sketch File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    </div>
    <!-- demo chat-->
    <div class="widget-chat-demo">
        <!-- widget chat demo footer button start -->
        <button class="btn btn-primary chat-demo-button glow px-1"><i class="fal fa-comments-alt"></i></button>
        <!-- widget chat demo footer button ends -->
        <!-- widget chat demo start -->
        <div class="widget-chat widget-chat-demo d-none">
            <div class="card mb-0">
                <div class="card-header border-bottom p-0">
                    <div class="media m-75">
                        <a href="JavaScript:void(0);">
                            <div class="avatar mr-75">
                                <img src="assets/images/portrait/small/avatar-s-2.jpg" alt="avtar images" width="32"
                                    height="32">
                                <span class="avatar-status-online"></span>
                            </div>
                        </a>
                        <div class="media-body">
                            <h6 class="media-heading mb-0 pt-25"><a href="javaScript:void(0);">Kiara Cruiser</a></h6>
                            <span class="text-muted font-small-3">Active</span>
                        </div>
                    </div>
                    <div class="heading-elements">
                        <i class="bx bx-x widget-chat-close float-right my-auto cursor-pointer"></i>
                    </div>
                </div>
                <div class="card-body widget-chat-container widget-chat-demo-scroll">
                    <div class="chat-content">
                        <div class="badge badge-pill badge-light-secondary my-1">today</div>
                        <div class="chat">
                            <div class="chat-body">
                                <div class="chat-message">
                                    <p>How can we help? 😄</p>
                                    <span class="chat-time">7:45 AM</span>
                                </div>
                            </div>
                        </div>
                        <div class="chat chat-left">
                            <div class="chat-body">
                                <div class="chat-message">
                                    <p>Hey John, I am looking for the best admin template.</p>
                                    <p>Could you please help me to find it out? 🤔</p>
                                    <span class="chat-time">7:50 AM</span>
                                </div>
                            </div>
                        </div>
                        <div class="chat">
                            <div class="chat-body">
                                <div class="chat-message">
                                    <p>Stack admin is the responsive bootstrap 4 admin template.</p>
                                    <span class="chat-time">8:01 AM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-top p-1">
                    <form class="d-flex" onsubmit="widgetChatMessageDemo();" action="javascript:void(0);">
                        <input type="text" class="form-control chat-message-demo mr-75" placeholder="Type here...">
                        <button type="submit" class="btn btn-primary glow px-1"><i
                                class="bx bx-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- widget chat demo ends -->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-left d-inline-block">2022 &copy; Pacific Logistics Group</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="bx bx-up-arrow-alt"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
    <script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js')}}"></script>
    <script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('assets/js/scripts/configs/vertical-menu-dark.min.js')}}"></script>
    <script src="{{asset('assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('assets/js/file/file.js')}}"></script>
    <script src="{{asset('assets/js/scripts/components.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts/footer.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('assets/js/scripts/pages/app-file-manager.min.js')}}"></script>
    <!-- END: Page JS-->
     <script type="text/javascript">
         $('.app-file-info').on('contextmenu', function(e) {
          var top = e.pageY - 250;
          var left = e.pageX - 700;
          $("#context-menu").css({
            display: "block",
            top: top,
            left: left
          }).addClass("show");
          return false; //blocks default Webbrowser right click menu
        }).on("click", function() {
          $("#context-menu").removeClass("show").hide();
        });

        $("#context-menu a").on("click", function() {
          $(this).parent().removeClass("show").hide();
        });
     </script>
</body>
<!-- END: Body-->

<!-- Mirrored from www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template-semi-dark/app-file-manager.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Dec 2021 09:13:06 GMT -->

</html>