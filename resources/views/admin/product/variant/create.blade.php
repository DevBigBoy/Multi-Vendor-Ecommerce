@extends('admin.layouts.master')

@section('title', 'Create Variant')

@section('content')
    <section class="section">

        <div class="section-header">
            <h1>Product Vairant</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.product_variant.index') }}">Products</a></div>
                <div class="breadcrumb-item">Product Vairants</div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product's Vairant</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product_variant.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ request()->product }}">

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-10  mb-4">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control " name="status">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>



                                <div class="form-group mb-4">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">Create Product</button>
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