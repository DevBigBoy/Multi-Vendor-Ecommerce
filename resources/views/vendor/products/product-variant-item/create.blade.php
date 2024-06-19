@extends('vendor.layouts.master')

@section('title', 'Create Variant Item')

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
                                <i class="far fa-user"></i> Create Variant Item
                            </h3>


                            <div>
                                <a href="{{ route('vendor.products-variant-item.index', ['productId' => $product->id, 'variantId' => $variant->id]) }}"
                                    class="btn btn-success">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>

                            </div>
                        </div>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('vendor.products-variant-item.store') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="variant_id" value="{{ $variant->id }}">

                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Variant Name</label>

                                        <input type="text" class="form-control" name="variant_name"
                                            value="{{ $variant->name }}" readonly>

                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Item Name</label>

                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Price <code>(Set 0 for make it free)</code></label>

                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price') }}">

                                    </div>


                                    <div class="form-group  mb-4">
                                        <label for="status">Is Default</label>
                                        <select id="status" class="form-control " name="is_default">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group  mb-4">
                                        <label for="status">Status</label>
                                        <select id="status" class="form-control" name="status">
                                            <option value="">Select</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">

                                        <button type="submit" class="btn btn-primary">Create Item</button>

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
