@extends('vendor.layouts.master')

@section('title', 'create product')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
@endsection

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
                        <h3>
                            <i class="far fa-user"></i>Shop profile
                        </h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="row">

                                                <div class="col-xl-6 col-md-6">
                                                    <div class="wsus__dash_pro_single">
                                                        <i class="far fa-phone-alt"></i>
                                                        <input type="text" class="form-control" name="phone"
                                                            value="">
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-md-6">
                                                    <div class="wsus__dash_pro_single">
                                                        <i class="fal fa-envelope-open"></i>
                                                        <input type="text" class="form-control" name="email"
                                                            value="">
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 col-md-8">
                                                    <div class="wsus__dash_pro_single">
                                                        <i class="fa fa-map-marker"></i>
                                                        <input type="text" class="form-control" name="address"
                                                            value="">
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 col-md-8">
                                                    <div class="wsus__dash_pro_single">
                                                        <i class="fa fa-anchor"></i>
                                                        <input type="text" class="form-control" name="shop_name"
                                                            value="">
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="col-xl-12 col-md-8 mb-4">
                                                        <textarea id="summernote" name="description" placeholder="Description"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div id="medicine_row3">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-md-6">
                                                                <div class="wsus__dash_pro_single">
                                                                    <i class="fa fa-facebook"></i>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="www.facebook.com" name="fb_link"
                                                                        value="">
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6 col-md-6">
                                                                <div class="wsus__dash_pro_single">
                                                                    <i class="fa fa-instagram"></i>

                                                                    <input type="text"
                                                                        class="form-control"placeholder="www.instgram.com"
                                                                        name="insta_link" value="">
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6 col-md-6">
                                                                <div class="wsus__dash_pro_single">
                                                                    <i class="fa fa-twitter"></i>

                                                                    <input type="text" placeholder="www.twitter.com"
                                                                        class="form-control" name="tw_link" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6 col-md-6">
                                            <div class="wsus__dash_pro_img">
                                                <div id="image-preview" class="image-preview"
                                                    style="width: 100%; height:330px;">
                                                    <label for="image-upload" id="image-label">Upload Image</label>
                                                    <input type="file" name="banner" id="image-upload" />
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group col-xl-8 col-md-8">
                                            <label class="col-form-label">Status</label>
                                            <div class="col-xl-7 col-md-6">
                                                <select class="form-control" name="status">
                                                    <option>Select</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-xl-12 mt-5">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================  DASHBOARD START  ==============================-->
@endsection


@push('scripts')
    <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,

            });
        });

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url()',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
