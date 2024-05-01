@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.sub-category.index') }}">Sub-Categories</a></div>
                <div class="breadcrumb-item">All</div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Sub-Category</h4>
                        </div>
                        <div class="card-body col-9">
                            <form action="{{ route('admin.sub-category.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Icon</label>
                                    <div class="">
                                        <button data-selected-class="btn-danger" data-unselected-class="btn-info"
                                            class="btn btn-primary" role="iconpicker" name="icon"></button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
