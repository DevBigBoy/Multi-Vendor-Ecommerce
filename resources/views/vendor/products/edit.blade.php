@extends('vendor.layouts.master')

@section('title', 'Edit product')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

@endsection

@section('content')
    <!--============================= DASHBOARD START ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            <!-- Sidebar Start -->
            @include('vendor.layouts.sidebar')
            <!-- Sidebar End -->
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3>
                            <i class="far fa-edit"></i> Edit Product
                        </h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-8">
                                                    <div class="wsus__dash_pro_single gap-2">
                                                        <label class="col-form-label">Name</label>
                                                        <div class="col-md-11">
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ $product->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 col-md-8">
                                                    <div class="wsus__dash_pro_single gap-3">
                                                        <label class="col-form-label">Stock Quantity</label>
                                                        <div class="col-md-9">
                                                            <input type="number" min="0" class="form-control"
                                                                name="qty" value="{{ $product->qty }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group col-xl-12">
                                                        <label class="col-form-label">Category</label>
                                                        <select class="form-control  main-category" name="category">
                                                            <option value="">Select</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @selected($product->category_id == $category->id)>{{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="form-group col-xl-12">
                                                        <label class="col-form-label">
                                                            Sub Category
                                                        </label>

                                                        <select class="form-control sub-category" name="sub_category">
                                                            <option value="">Select</option>
                                                            @foreach ($subCategries as $subCategry)
                                                                <option value="{{ $subCategry->id }}"
                                                                    @selected($product->sub_category_id == $subCategry->id)>
                                                                    {{ $subCategry->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6 ">
                                                    <div class="wsus__dash_pro_single">
                                                        <div class="form-group col-xl-12">
                                                            <label class="col-form-label  ">
                                                                Child Category
                                                            </label>
                                                            <select class="form-control child-category"
                                                                name="child_category">
                                                                <option value="">Select</option>
                                                                @foreach ($childcategories as $childcategory)
                                                                    <option value="{{ $childcategory->id }}"
                                                                        @selected($product->child_category_id == $childcategory->id)>
                                                                        {{ $childcategory->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="wsus__dash_pro_single">
                                                        <div class="form-group col-xl-12">
                                                            <label class="col-form-label">
                                                                Brand
                                                            </label>
                                                            <select class="form-control" name="brand">
                                                                <option value="">Select</option>
                                                                @foreach ($brands as $brand)
                                                                    <option @selected($product->brand_id == $brand->id)
                                                                        value="{{ $brand->id }}">{{ $brand->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-xl-4">
                                            <div class="wsus__dash_pro_img">
                                                <div id="image-preview" class="image-preview"
                                                    style="width: 100%; height:330px;">
                                                    <label for="image-upload" id="image-label">Upload Product
                                                        Image</label>
                                                    <input type="file" name="thumb_image" id="image-upload" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-xl-11">
                                            <label class="col-form-label">Short Description</label>
                                            <div class="col-xl-12">
                                                <textarea class="summernote-simple" name="short_description">{{ $product->short_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-xl-11">
                                            <label class="col-form-label">Long Description</label>

                                            <div class="col-xl-12">
                                                <textarea class="summernote" name="long_description">{{ $product->long_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4 gap-4">
                                        <div class="row gap-4">
                                            <div class="col-xl-5">
                                                <div class="form-group col-xl-12">
                                                    <label class="col-form-label">Price</label>
                                                    <input type="text" class="form-control" name="price"
                                                        value="{{ $product->price }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-5">
                                                <div class="form-group col-xl-12">
                                                    <label class="col-form-label">Offer Price</label>

                                                    <input type="text" class="form-control" name="offer_price"
                                                        value="{{ $product->offer_price }}">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row gap-4">
                                            <div class="col-xl-5 ">
                                                <div class="wsus__dash_pro_single">
                                                    <div class="form-group col-xl-12">
                                                        <label for="startDate">Offer Start Date</label>
                                                        <input type="text" class="form-control datepicker"
                                                            id="startDate" name="offer_start_date"
                                                            value="{{ $product->offer_start_date }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-5">
                                                <div class="wsus__dash_pro_single">
                                                    <div class="form-group col-xl-12">
                                                        <label for="startDate">Offer End Date</label>
                                                        <input type="text" class="form-control datepicker"
                                                            id="endDate" name="offer_end_date"
                                                            value="{{ $product->offer_end_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Video's Link</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="video_link"
                                                value="{{ $product->video_link }}">
                                        </div>
                                    </div>



                                    <div class="form-group mb-4">
                                        <label class="col-form-label">SKU</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="sku"
                                                value="{{ $product->sku }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-form-label">SEO Title</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="seo_title"
                                                value="{{ $product->seo_title }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-form-label">SEO Description</label>
                                        <div class="col-md-10">
                                            <textarea class="summernote-simple" name="seo_decription">{{ $product->seo_decription }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-4">

                                        <div class="form-group col-xl-4">
                                            <label for="status">Protduct Type</label>
                                            <select id="status" class="form-control " name="product_type">
                                                <option @selected($product->product_type == 'new_arrival') value="new_arrival">New Arrival
                                                </option>
                                                <option @selected($product->product_type == 'featured_product') value="featured_product">Featured
                                                </option>
                                                <option @selected($product->product_type == 'top_product') value="top_product">Top</option>
                                                <option @selected($product->product_type == 'best_product') value="best_product">Best Product
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group col-xl-4">
                                            <label for="status">Status</label>
                                            <select id="status" class="form-control " name="status">
                                                <option value="">Select</option>
                                                <option value="1" @selected($product->status == 1)>Active</option>
                                                <option value="0" @selected($product->status == 0)>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

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
    <!--=============================  DASHBOARD START  ==============================-->
@endsection


@push('scripts')
    <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($product->thumb_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })

            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.products.get-subcategories') }}",
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
                    url: "{{ route('vendor.products.get-childcategories') }}",
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

            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        });
    </script>
@endpush
