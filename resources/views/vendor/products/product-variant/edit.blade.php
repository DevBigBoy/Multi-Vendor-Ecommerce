@extends('vendor.layouts.master')

@section('title', 'Edit Products Variant')



@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            <!-- Sidebar Start -->
            @include('vendor.layouts.sidebar')
            <!-- Sidebar End -->

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="d-flex align-content-between justify-content-between mb-3">
                            <h3>
                                <i class="far fa-user"></i> Update Variant
                            </h3>


                            <div>
                                <a href="{{ route('vendor.products-variant.index', ['product' => $variant->product_id]) }}"
                                    class="btn btn-success">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>

                            </div>
                        </div>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('vendor.products-variant.update', $variant->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-4 col-lg-6">
                                        <label class="col-form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $variant->name }}">
                                    </div>


                                    <div class="form-group mb-4 col-lg-6">
                                        <label for="status">Status</label>
                                        <select id="status" class="form-control " name="status">
                                            <option value="1" @selected($variant->status == 1)>Active</option>
                                            <option value="0" @selected($variant->status == 0)>Inactive</option>
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Update</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
@endpush
