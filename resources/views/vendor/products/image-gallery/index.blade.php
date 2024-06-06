@extends('vendor.layouts.master')

@section('title', 'Image Gallery')



@section('content') <!--=============================DASHBOARD START==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            <!-- Sidebar Start -->
            @include('vendor.layouts.sidebar')
            <!-- Sidebar End -->

            <div class="row mb-5">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="d-flex align-content-between justify-content-between mb-3">
                            <h3>
                                <i class="far fa-user"></i> Product Gallery {{ $product->name }}
                            </h3>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('vendor.products-image-gallery.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div class="form-group mb-4">
                                        <label for="images"> <code>(Multiple image supported!)</code> </label>
                                        <input type="file" name="images[]" id="images" class="form-control" multiple>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="d-flex align-content-between justify-content-between mb-3">
                            <h3>
                                <i class="far fa-bookmark"></i> All Images
                            </h3>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                {{ $dataTable->table() }}

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
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
