@extends('admin.layouts.master')

@section('title', 'Update Product Variant Item')

@section('content')
    <section class="section">

        <div class="section-header">
            <h1>Product Variants</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Products</a></div>
                <div class="breadcrumb-item">Product Variant Item</div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product Variant Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product_variant_items.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Variant Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="variant_name"
                                            value="{{ $item->productVariant->name }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Item Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $item->name }}">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Price <code>(Set 0 for make it free)</code></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="price"
                                            value="{{ $item->price }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-10  mb-4">
                                    <label for="status">Is Default</label>
                                    <select id="status" class="form-control " name="is_default">
                                        <option value="">Select</option>
                                        <option value="1" @selected($item->status == 1)>Yes</option>
                                        <option value="0" @selected($item->status == 0)>No</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-10  mb-4">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control " name="status">
                                        <option value="">Select</option>
                                        <option value="1" @selected($item->status == 1)>Active</option>
                                        <option value="0" @selected($item->status == 0)>Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@push('scripts')
@endpush
