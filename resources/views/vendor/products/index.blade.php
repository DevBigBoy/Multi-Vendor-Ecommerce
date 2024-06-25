@extends('vendor.layouts.master')

@section('title', 'vendor products')



@section('content') <!--=============================DASHBOARD START==============================-->
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
                                <i class="far fa-user"></i> Products
                            </h3>

                            <div>
                                <a href="{{ route('vendor.products.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    Create new
                                </a>
                            </div>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                {{ $dataTable->table() }}
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
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {

                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('vendor.products.change-status') }}",
                    method: 'PUT',
                    data: {
                        isChecked: isChecked,
                        id: id
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                        } else if (response.status === 'error') {
                            toastr.error(response.message);
                        }
                    },

                    error: function(error) {
                        console.error(error);
                    }
                })
            })
        })
    </script>
@endpush
