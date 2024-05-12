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
                                        <select class="form-control selectric main-category" name="category">
                                            <option>Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="col-form-label">
                                            Sub Category
                                        </label>

                                        <select class="form-control selectric  sub-category" name="sub_category">
                                            <option>Select</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="col-form-label  ">
                                            Child Category
                                        </label>
                                        <select class="form-control selectric child-category" name="child_category">
                                            <option>Select</option>

                                        </select>
                                    </div>
                                </div>



                                <div class="form-group  mb-4">
                                    <label class="col-form-label">
                                        Brand
                                    </label>
                                    <div class="col-md-10">
                                        <select class="form-control selectric" name="brand">
                                            <option>Select</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                                <div class="form-group mb-4">
                                    <label class="col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <textarea class="summernote" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>



                                <div class="form-group mb-4">
                                    <label class="col-form-label  ">
                                        Facebook Link
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="fb_link"
                                            value="{{ old('') }}">
                                    </div>
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
                        $('.sub-category').html('<option value="">Select</option>').selectric();
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                    `<option value="${item.id}">${item.name}</option>`)
                                .selectric();
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
                        $('.child-category').html('<option value="">Select</option>')
                            .selectric();
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                    `<option value="${item.id}">${item.name}</option>`)
                                .selectric();
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
