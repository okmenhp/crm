@extends('layouts.master')
@section('content')
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- users list start -->
<section class="users-list-wrapper">
    <div class="users-list-filter px-1">
        <form>
            <div class="row border rounded py-2 mb-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-verified">Tên vị trí công việc</label>
                    <fieldset class="form-group">
                      <input type="text" class="form-control" id="basicInput" placeholder="Nhập tên vị trí">
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-role">Phòng ban</label>
                    <fieldset class="form-group">
                        <select class="form-control" id="users-list-role">
                            <option value="">All</option>
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
                                <th>username</th>
                                <th>name</th>
                                <th>last activity</th>
                                <th>verified</th>
                                <th>role</th>
                                <th>status</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>300</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">dean3004</a>
                                </td>
                                <td>Dean Stanley</td>
                                <td>30/04/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>301</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">zena0604</a>
                                </td>
                                <td>Zena Buckley</td>
                                <td>06/04/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>302</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">delilah0301</a>
                                </td>
                                <td>Delilah Moon</td>
                                <td>03/01/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>303</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">hillary1807</a>
                                </td>
                                <td>Hillary Rasmussen</td>
                                <td>18/07/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>304</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">herman2003</a>
                                </td>
                                <td>Herman Tate</td>
                                <td>20/03/2020</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>305</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">kuame3008</a>
                                </td>
                                <td>Kuame Ford</td>
                                <td>30/08/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>306</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">fulton2009</a>
                                </td>
                                <td>Fulton Stafford</td>
                                <td>20/09/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>307</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">piper0508</a>
                                </td>
                                <td>Piper Jordan</td>
                                <td>05/08/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>308</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">neil1002</a>
                                </td>
                                <td>Neil Sosa</td>
                                <td>10/02/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>309</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">caldwell2402</a>
                                </td>
                                <td>Caldwell Chapman</td>
                                <td>24/02/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>310</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">wesley0508</a>
                                </td>
                                <td>Wesley Oneil</td>
                                <td>05/08/2020</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>311</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">tallulah2009</a>
                                </td>
                                <td>Tallulah Fleming</td>
                                <td>20/09/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>312</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">iris2505</a>
                                </td>
                                <td>Iris Maddox</td>
                                <td>25/05/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>313</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">caleb1504</a>
                                </td>
                                <td>Caleb Bradley</td>
                                <td>15/04/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>314</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">illiana0410</a>
                                </td>
                                <td>Illiana Grimes</td>
                                <td>04/10/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>315</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">chester0902</a>
                                </td>
                                <td>Chester Estes</td>
                                <td>09/02/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>316</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">gregory2309</a>
                                </td>
                                <td>Gregory Hayden</td>
                                <td>23/09/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>317</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">jescie1802</a>
                                </td>
                                <td>Jescie Parker</td>
                                <td>18/02/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>318</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">sydney3101</a>
                                </td>
                                <td>Sydney Cabrera</td>
                                <td>31/01/2020</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>319</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">gray2702</a>
                                </td>
                                <td>Gray Valenzuela</td>
                                <td>27/02/2020</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-warning">Close</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>320</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">hoyt0305</a>
                                </td>
                                <td>Hoyt Ellison</td>
                                <td>03/05/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>321</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">damon0209</a>
                                </td>
                                <td>Damon Berry</td>
                                <td>02/09/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>322</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">kelsie0511</a>
                                </td>
                                <td>Kelsie Dunlap</td>
                                <td>05/11/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-warning">Close</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>323</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">abel1606</a>
                                </td>
                                <td>Abel Dunn</td>
                                <td>16/06/2020</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>324</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">nina2208</a>
                                </td>
                                <td>Nina Byers</td>
                                <td>22/08/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-warning">Close</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>325</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">erasmus1809</a>
                                </td>
                                <td>Erasmus Walter</td>
                                <td>18/09/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>326</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">yael2612</a>
                                </td>
                                <td>Yael Marshall</td>
                                <td>26/12/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-warning">Close</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>327</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">thomas2012</a>
                                </td>
                                <td>Thomas Dudley</td>
                                <td>20/12/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>328</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">althea2810</a>
                                </td>
                                <td>Althea Turner</td>
                                <td>28/10/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>329</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">jena2206</a>
                                </td>
                                <td>Jena Schroeder</td>
                                <td>22/06/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>330</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">hyacinth2201</a>
                                </td>
                                <td>Hyacinth Maxwell</td>
                                <td>22/01/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>331</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">madeson1907</a>
                                </td>
                                <td>Madeson Byers</td>
                                <td>19/07/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>332</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">elmo0707</a>
                                </td>
                                <td>Elmo Tran</td>
                                <td>07/07/2020</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>333</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">shelley0309</a>
                                </td>
                                <td>Shelley Eaton</td>
                                <td>03/09/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>334</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">graham0301</a>
                                </td>
                                <td>Graham Flores</td>
                                <td>03/01/2019</td>
                                <td>No</td>
                                <td>Staff</td>
                                <td><span class="badge badge-light-danger">Banned</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>335</td>
                                <td><a
                                        href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-view.html">erasmus2110</a>
                                </td>
                                <td>Erasmus Mclaughlin</td>
                                <td>21/10/2019</td>
                                <td>Yes</td>
                                <td>User </td>
                                <td><span class="badge badge-light-success">Active</span></td>
                                <td><a href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/app-users-edit.html"><i
                                            class="bx bx-edit-alt"></i></a></td>
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


<!-- demo chat-->
<div class="widget-chat-demo"><!-- widget chat demo footer button start -->
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
    <button type="submit" class="btn btn-primary glow px-1"><i class="bx bx-paper-plane"></i></button>
  </form>
</div>
</div>
</div>
<!-- widget chat demo ends -->

</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@stop