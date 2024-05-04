@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sub-Categories</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.subcategory.index') }}">Sub-Categories</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>


        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Sub-Category</h4>
                        </div>
                        <div class="card-body col-9">
                            <form action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" class="form-control" name="category">
                                        <option value="">Select</option>
                                        @foreach ($catgories as $category)
                                            <option value="{{ $category->id }}" @selected($subcategory->category_id == $category->id)>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $subcategory->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option value="1" @selected($subcategory->status == 1)>Active</option>
                                        <option value="0" @selected($subcategory->status == 0)>Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
