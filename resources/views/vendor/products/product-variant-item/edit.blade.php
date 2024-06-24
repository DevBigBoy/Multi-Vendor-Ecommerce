@extends('vendor.layouts.master')

@section('title', 'Edit Variant Item')

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
                                <i class="far fa-user"></i> Edit Product Variant Item
                            </h3>


                            <div>
                                <a href="{{ route('vendor.products-variant-item.index', ['productId' => $variantItem->productVariant->product_id, 'variantId' => $variantItem->productVariant->id]) }}"
                                    class="btn btn-success">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>

                            </div>
                        </div>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('vendor.products-variant-item.update', $variantItem->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="variant_id" value="{{ $variantItem->productVariant->id }}">

                                    <input type="hidden" name="product_id"
                                        value="{{ $variantItem->productVariant->product_id }}">

                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Variant Name</label>

                                        <input type="text" class="form-control" name="variant_name"
                                            value="{{ $variantItem->productVariant->name }}" readonly>

                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Item Name</label>

                                        <input type="text" class="form-control" name="name"
                                            value="{{ $variantItem->name }}">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Price <code>(Set 0 for make it free)</code></label>

                                        <input type="text" class="form-control" name="price"
                                            value="{{ $variantItem->price }}">

                                    </div>


                                    <div class="form-group  mb-4">
                                        <label for="status">Is Default</label>
                                        <select id="status" class="form-control " name="is_default">
                                            <option value="1" @selected($variantItem->is_default == 1)>Yes
                                            </option>
                                            <option value="0" @selected($variantItem->is_default == 0)>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group  mb-4">
                                        <label for="status">Status</label>
                                        <select id="status" class="form-control" name="status">
                                            <option value="1" @selected($variantItem->status == 1)>Active</option>
                                            <option value="0" @selected($variantItem->status == 0)>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">

                                        <button type="submit" class="btn btn-primary">Update</button>

                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================  DASHBOARD START  ==========
@endsection
