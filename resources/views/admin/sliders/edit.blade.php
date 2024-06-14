@extends('admin.layouts.master')
@section('title', 'Edit slider')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sliders</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Slider</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Slider</h4>
                        </div>
                        <div class="card-body col-9">
                            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-4">
                                    <label class="col-form-label">Banner</label>
                                    <div class="col-sm-12">
                                        <div id="image-preview" class="image-preview"
                                            style="width: 100%; height: 400px; background-size: cover;">
                                            <label for="image-upload" id="image-label">Choose Slider</label>
                                            <input type="file" name="banner" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" value="{{ $slider->type }}">
                                </div>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                </div>

                                <div class="form-group">
                                    <label>Starting Price</label>
                                    <input type="text" class="form-control" name="starting_price"
                                        value="{{ $slider->starting_price }}">
                                </div>

                                <div class="form-group">
                                    <label>Button URL</label>
                                    <input type="url" class="form-control" name="btn_url"
                                        value="{{ $slider->btn_url }}">
                                </div>

                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" class="form-control" name="serial" value="{{ $slider->serial }}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option value="1" @selected($slider['status'] == 1)> Active</option>
                                        <option value="0" @selected($slider['status'] == 0)> Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Upadate</button>
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
                'background-image': 'url({{ asset($slider->banner) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
