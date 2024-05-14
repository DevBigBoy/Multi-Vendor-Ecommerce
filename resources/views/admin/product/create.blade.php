@extends('admin.layouts.master')

@section('title', 'Create Product')

@section('content')

    <!-- Main Content -->

    <section class="section">

        <div class="section-header">
            <h1>Products</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Products</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-row mb-4 col-md-10 justify-content-between">
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label">Category</label>
                                        <select class="form-control  main-category" name="category">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label">
                                            Sub Category
                                        </label>

                                        <select class="form-control sub-category" name="sub_category">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label  ">
                                            Child Category
                                        </label>
                                        <select class="form-control child-category" name="child_category">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group  mb-4">
                                    <label class="col-form-label">
                                        Brand
                                    </label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="brand">
                                            <option value="">Select</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Stock Quantity</label>
                                    <div class="col-md-10">
                                        <input type="number" min="0" class="form-control" name="qty"
                                            value="{{ old('qty') }}">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Short Description</label>
                                    <div class="col-md-10">
                                        <textarea class="summernote-simple" name="short_description">{{ old('short_description') }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group mb-4">
                                    <label class="col-form-label">Long Description</label>
                                    <div class="col-md-10">
                                        <textarea class="summernote" name="long_description">{{ old('long_description') }}</textarea>
                                    </div>
                                </div>



                                <div class="form-group mb-4">
                                    <label class="col-form-label">Video's Link</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="video_link"
                                            value="{{ old('video_link') }}">
                                    </div>
                                </div>



                                <div class="form-group mb-4">
                                    <label class="col-form-label">SKU</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="sku"
                                            value="{{ old('sku') }}">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Price</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price') }}">
                                    </div>
                                </div>

                                <div class="form-row col-md-10 justify-content-between">
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label">Offer Price</label>

                                        <input type="text" class="form-control" name="offer_price"
                                            value="{{ old('offer_price') }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="startDate">Offer Start Date</label>
                                        <input type="text" class="form-control datepicker" id="startDate"
                                            name="offer_start_date" value="{{ old('offer_start_date') }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="startDate">Offer End Date</label>
                                        <input type="text" class="form-control datepicker" id="endDate"
                                            name="offer_end_date" value="{{ old('offer_end_date') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Protduct Type</label>
                                    <select id="status" class="form-control " name="product_type">
                                        <option value="0">Select</option>
                                        <option value="new_arrival">New Arrival</option>
                                        <option value="featured_product">Featured</option>
                                        <option value="top_product">Top</option>
                                        <option value="best_product">Best Product</option>
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-form-label">SEO Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="seo_title"
                                            value="{{ old('seo_title') }}">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-form-label">SEO Description</label>
                                    <div class="col-md-10">
                                        <textarea class="summernote-simple" name="seo_decription">{{ old('seo_decription') }}</textarea>
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
    <script>
        // $("select").selectric();
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get_subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.sub-category').html('<option value="">Select</option>');
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`);
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })

            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get_childcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.child-category').html('<option value="">Select</option>');
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`);
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
