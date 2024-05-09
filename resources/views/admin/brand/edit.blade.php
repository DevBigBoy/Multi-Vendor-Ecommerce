@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Brands</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Brands</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Brand</h4>
                        </div>
                        <div class="card-body col-9">
                            <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 col-md-8">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="logo" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                                </div>

                                <div class="form-group mb-4">
                                    <label>Is Featured</label>
                                    <select class="form-control selectric" name="is_featured">
                                        <option value="">Select</option>
                                        <option @selected($brand->is_featured == 1) value="1">Yes</option>
                                        <option @selected($brand->is_featured == 0) value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control selectric" name="status">
                                        <option value="">Select</option>
                                        <option @selected($brand->status == 1) value="1">Active</option>
                                        <option @selected($brand->status == 0) value="0">Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
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
            $('.image-preview').css({
                'background-image': 'url({{ asset($brand->logo) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
