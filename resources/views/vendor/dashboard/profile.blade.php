@extends('vendor.layouts.master')

@section('content')
    <!--============================= DASHBOARD START ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            <!-- Sidebar Start -->
            @include('vendor.layouts.sidebar')
            <!-- Sidebar End -->
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4>basic information</h4>

                                <form action="{{ route('vendor.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-12">
                                        <!-- image -->
                                        <div class="col-md-2 mb-5">
                                            <div class="wsus__dash_pro_img">
                                                <img src="{{ !empty(Auth()->user()->image) ? asset(Auth()->user()->image) : asset('frontend/images/ts-2.jpg') }}"
                                                    alt="img" class="img-fluid w-100">
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Name -->
                                            <div class="col-xl-6 col-md-4">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fas fa-user-tie"></i>
                                                    <input type="text" class="form-control"
                                                        value="{{ Auth()->user()->name }}" name="name"
                                                        placeholder="Name">
                                                </div>
                                            </div>

                                            <!-- Phone -->
                                            <div class="col-xl-6 col-md-4">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="far fa-phone-alt"></i>
                                                    <input type="tel" class="form-control" name="phone"
                                                        value="{{ Auth()->user()->phone }}" placeholder="Phone">
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-xl-6 col-md-4">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fal fa-envelope-open"></i>
                                                    <input type="email" class="form-control"
                                                        value="{{ Auth()->user()->email }}" name="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <button class="common_btn mb-4 mt-2" type="submit">Save Changes</button>
                                    </div>
                                </form>

                                <div class="wsus__dash_pass_change mt-2">
                                    <form action="{{ route('vendor.profile.update.password') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <h4>Update Password</h4>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fas fa-unlock-alt"></i>
                                                    <input type="password" placeholder="Current Password"
                                                        name="current_password">
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-md-6">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fas fa-lock-alt"></i>
                                                    <input type="password" placeholder="New Password" name="password">
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fas fa-lock-alt"></i>
                                                    <input type="password" placeholder="Confirm Password"
                                                        name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <button class="common_btn" type="submit">Update Password</button>
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
    <!--=============================  DASHBOARD START  ==============================-->
@endsection
