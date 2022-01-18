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
                                <label for="getFile"
                                    class="btn btn-primary btn-block glow my-2 add-file-btn text-capitalize"><i
                                        class="bx bx-plus"></i>Tạo tệp tin</label>
                                <input type="file" class="d-none" id="getFile">
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
                                            class="badge badge-light-danger badge-pill badge-round float-right mt-50">2</span>
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
                                        Tệp tin đã xoá
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
                                    <div class="border-bottom d-flex align-items-center flex-column pb-1">
                                        <img src="assets/images/icon/pdf.png" alt="PDF" height="42" width="35"
                                            class="my-1">
                                        <p class="mt-2">15.3mb</p>
                                    </div>
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
                                <h5>Tất cả tệp tin</h5>

                                <!-- App File - Recent Accessed Files Section Starts -->
                                <!-- <label class="app-file-label">Recently Accessed Files</label>
                                <div class="row app-file-recent-access">
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/pdf.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-recent-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">Felecia
                                                        Resume.pdf</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">12.85kb
                                                    </div>
                                                    <div class="app-file-last-access font-size-small text-muted">Last
                                                        accessed : 3 hours ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/psd.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-content-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Logo_design.psd</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">15.60mb
                                                    </div>
                                                    <div class="app-file-last-access font-size-small text-muted">Last
                                                        accessed : 3 hours ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/doc.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-content-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Music_Two.xyz</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">1.2gb
                                                    </div>
                                                    <div class="app-file-last-access font-size-small text-muted">Last
                                                        accessed : 3 hours ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <i
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
                                                <img class="d-block mx-auto" src="assets/images/icon/sketch.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-content-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Application.sketch</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">92.83kb
                                                    </div>
                                                    <div class="app-file-last-access font-size-small text-muted">Last
                                                        accessed : 3 hours ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- App File - Recent Accessed Files Section Ends -->

                                <!-- App File - Folder Section Starts -->
                                <label class="app-file-label">Thư mục</label>
                                <div class="row app-file-folder">
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Project</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">2
                                                            files, 14.05mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Video</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">130
                                                            files, 890mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Music</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">15
                                                            files, 58mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Documents</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">12
                                                            files, 9.5mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Application Design</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">1
                                                            files, 36.25kb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="card-body px-75 py-50">
                                                <div class="app-file-folder-content d-flex align-items-center">
                                                    <div class="app-file-folder-logo mr-75">
                                                        <i class="bx bx-folder font-medium-4"></i>
                                                    </div>
                                                    <div class="app-file-folder-details">
                                                        <div
                                                            class="app-file-folder-name font-size-small font-weight-bold">
                                                            Photos</div>
                                                        <div class="app-file-folder-size font-size-small text-muted">
                                                            3.6k files, 348mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- App File - Folder Section Ends -->

                                <!-- App File - Files Section Starts -->
                                <label class="app-file-label">Tệp tin</label>
                                <div class="row app-file-files">
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/pdf.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Banner.jpg</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">13kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Image File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/psd.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Management.docx</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">15.60mb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Word Document
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/doc.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Thunder.mp3</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">3.4mb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Mp3 File</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <i
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
                                                <img class="d-block mx-auto" src="assets/images/icon/sketch.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Dashboard.sketch</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">108kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Sketch File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/psd.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">Logo.psd
                                                    </div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">10.6kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Photoshop File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <i
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
                                                <img class="d-block mx-auto" src="assets/images/icon/sketch.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Logo_Design.sketch</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">256.5kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Sketch File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/doc.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Bootstrap.xyz</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">0.0kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">Unknown File
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border shadow-none mb-1 app-file-info">
                                            <div class="app-file-content-logo card-img-top">
                                                <img
                                                    class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
                                                <img class="d-block mx-auto" src="assets/images/icon/pdf.png"
                                                    height="38" width="30" alt="Card image cap">
                                            </div>
                                            <div class="card-body p-50">
                                                <div class="app-file-details">
                                                    <div class="app-file-name font-size-small font-weight-bold">
                                                        Read_Me.pdf</div>
                                                    <div class="app-file-size font-size-small text-muted mb-25">10.5kb
                                                    </div>
                                                    <div class="app-file-type font-size-small text-muted">PDF File</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- App File - Files Section Ends -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    @include('layouts/__footer')
    <!-- END: Footer-->

    <!-- BEGIN: Page JS-->
    <script src="assets/js/scripts/pages/app-file-manager.min.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
