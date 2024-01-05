@extends('admin.layouts.master')

@section('title', 'Edit Variant')

@section('content')
    <section class="section">

        <div class="section-header">
            <h1>Product Variant</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Products</a></div>
                <div class="breadcrumb-item">Product Variant</div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Variant</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product_variant.update', $variant->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $variant->name }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-10  mb-4">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control " name="status">
                                        <option value="">Select</option>
                                        <option value="1" @selected($variant->status == 1)>Active</option>
                                        <option value="0" @selected($variant->status == 0)>Inactive</option>
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
