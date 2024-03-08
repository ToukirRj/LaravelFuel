@extends("web.layouts.master")
@section("title","Profile")
@section("main")

<main>
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="profile-info">
                        <div class="edit-profile">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#editProfile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd" d="M15.137 3.47a.75.75 0 0 0-1.06 0l-9.193 9.192a.75.75 0 0 0-.195.34l-1 3.83a.75.75 0 0 0 .915.915l3.828-1a.75.75 0 0 0 .341-.196l9.192-9.192a.75.75 0 0 0 0-1.06zM6.088 13.579l8.519-8.518l1.767 1.767l-8.518 8.519l-2.393.625z" clip-rule="evenodd" />
                                    <path fill="currentColor" d="M4 19.25a.75.75 0 0 0 0 1.5h15a.75.75 0 0 0 0-1.5z" />
                                </svg>
                                Edit
                            </button>
                        </div>
                        <div class="profile-img">
                            <img src="{{ asset("frontend") }}/img/testimonial/testi_avatar.png" alt="profile-img">
                        </div>
                        <h2>Andrew Russel</h2>
                        <p>@russelAw</p>
                        <div class="profile-all-info">
                            <table>
                                <tr>
                                    <td class="icon-title">Email</td>
                                    <td class="info">: example@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="icon-title">Phone</td>
                                    <td class="info">: +(1) 987 6543</td>
                                </tr>
                                <tr>
                                    <td class="icon-title">Location</td>
                                    <td class="info">: California, United States</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="others-info">
                        <nav class="others-top-nav">
                            <div class="nav" id="nav-tab" role="tablist">
                              <button class="active" id="tab1" data-bs-toggle="tab" data-bs-target="#navtab1" type="button" role="tab" aria-control="tab1" aria-selected="true">Request Fuel</button>
                              <button id="tab2" data-bs-toggle="tab" data-bs-target="#navtab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">My Membership Plans</button>
                              <button id="tab3" data-bs-toggle="tab" data-bs-target="#navtab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Settings</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="navtab1" role="tabpanel" aria-labelledby="tab1" tabindex="0">
                                <div class="tab-box">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="text-center">Vehicle</th>
                                                <th>Vehicle Name</th>
                                                <th class="text-center">Vehicle Model</th>
                                                <th class="text-center">Date & Time</th>
                                                <th>Delivery Address</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><img src="{{ asset("frontend") }}/img/banner/banner.png" alt="img" width="60" height="40"/></td>
                                                <td>Prada</td>
                                                <td class="text-center">07823</td>
                                                <td class="text-center">6:45pm, 21-01-2024</td>
                                                <td>Example Address, Floor-2, House-01, <br>Road-01, Example, USA.</td>
                                                <td class="text-center"><span class="delivered">Delivered</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><img src="{{ asset("frontend") }}/img/banner/banner.png" alt="img" width="60" height="40"/></td>
                                                <td>Corolla</td>
                                                <td class="text-center">45674</td>
                                                <td class="text-center">8:45pm, 10-02-2024</td>
                                                <td>Example Address, Floor-2, House-01, <br>Road-01, Example, USA.</td>
                                                <td class="text-center"><span class="pending">Pending</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mt-5 mb-0 text-center">
                                            <button type="button" data-bs-toggle="offcanvas" data-bs-target="#requestCanvas" class="start-btn btn2">Create New Request
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024">
                                                        <path fill="#18232b" d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navtab2" role="tabpanel" aria-labelledby="tab2" tabindex="0">
                                <div class="tab-box">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Length</th>
                                                <th class="text-center">Buy Date</th>
                                                <th class="text-center">Expire Date</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Standard</td>
                                                <td>6 Months</td>
                                                <td class="text-center">10-03-2023</td>
                                                <td class="text-center">10-09-2023</td>
                                                <td class="text-center"><span class="expired">Expired</span></td>
                                            </tr>
                                            <tr>
                                                <td>Basic</td>
                                                <td>1 Months</td>
                                                <td class="text-center">01-02-2024</td>
                                                <td class="text-center">01-03-2024</td>
                                                <td class="text-center"><span class="running">Running</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mt-5 mb-0 text-center">
                                            <a href="{{ route("plans") }}" type="button" class="start-btn btn2">Buy New Plan
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024">
                                                        <path fill="#18232b" d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navtab3" role="tabpanel" aria-labelledby="tab3" tabindex="0">
                                <div class="d-flex justify-content-center">
                                    <form action="" class="default-form" style="width:400px;border:0">
                                        <h4 class="text-center">Change Password</h4>
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Existing Password</label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Type password" required="">
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Type password" required="">
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Retype Password</label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Type password" required="">
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="form-group mt-3 mb-0 text-center">
                                                <a href="profile.html" class="start-btn btn2">Change Password
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024">
                                                        <path fill="#18232b" d="M754.752 480H160a32 32 0 1 0 0 64h594.752L521.344 777.344a32 32 0 0 0 45.312 45.312l288-288a32 32 0 0 0 0-45.312l-288-288a32 32 0 1 0-45.312 45.312z"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
