@extends('admin.layouts.master')

@section('title', 'Image Gallery')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Multiple Upload</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Products</a></div>
                <div class="breadcrumb-item">Multiple Upload</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product {{ $product->name }}</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.product_image_gallery.store') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label for="images"> <code>(Multiple image supported!)</code> </label>
                                    <input type="file" name="images[]" id="images" class="form-control" multiple>

                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>

                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
