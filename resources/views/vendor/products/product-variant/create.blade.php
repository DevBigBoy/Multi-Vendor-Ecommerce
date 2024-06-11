@extends('vendor.layouts.master')

@section('title', 'Create Variant')



@section('content') <!--=============================DASHBOARD START==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            <!-- Sidebar Start -->
            @include('vendor.layouts.sidebar')
            <!-- Sidebar End -->

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="d-flex align-content-between justify-content-between mb-3">
                            <h3>
                                <i class="far fa-user"></i> Create Variant
                            </h3>
                            <h6>Product:{{ $product->name }}</h6>

                            <div>
                                <a href="{{ route('vendor.products-variant.index', ['product' => $product->id]) }}"
                                    class="btn btn-success">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>

                            </div>
                        </div>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('vendor.products-variant.store') }}" method="POST">
                                    @csrf

                                    <input type="hidden" class="form-control" name="product_id"
                                        value="{{ $product->id }}">


                                    <div class="form-group mb-4 col-lg-6">
                                        <label class="col-form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>


                                    <div class="form-group mb-4 col-lg-6">
                                        <label for="status">Status</label>
                                        <select id="status" class="form-control " name="status">
                                            <option value="">Select</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Create Product</button>



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
@endpush
