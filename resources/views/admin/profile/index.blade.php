@extends('admin.layouts.master')
@section('title', 'Admin Profile')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <form method="post" action="{{ route('admin.profile.update') }}" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2 alert alert-danger" />
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <div class="">
                                            <img src="{{ asset(Auth::user()->image) }}" alt="" width="150px"
                                                height="150px">
                                        </div>
                                        <label>image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{ Auth()->user()->name }}"
                                            name="name">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="{{ Auth()->user()->username }}"
                                            name="username">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ Auth()->user()->email }}"
                                            name="email">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="phone"
                                            value="{{ Auth()->user()->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <form method="post" action="{{ route('admin.password.update') }}" class="needs-validation">
                            @csrf
                            @method('put')
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="update_password_current_password">Current Password</label>
                                        <input id="update_password_current_password" name="current_password" type="password"
                                            class="form-control">
                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 alert alert-danger" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="update_password_password">New Password</label>
                                        <input id="update_password_password" name="password" type="password"
                                            class="form-control">
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 alert alert-danger" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="update_password_password_confirmation">Confirm Password</label>
                                        <input id="update_password_password_confirmation" name="password_confirmation"
                                            type="password" class="form-control">
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 alert alert-danger" />
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
