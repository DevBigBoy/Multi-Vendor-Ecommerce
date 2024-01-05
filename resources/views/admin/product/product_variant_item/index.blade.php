@extends('admin.layouts.master')

@section('title', 'Product Variant Items')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Vairant Items</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a
                        href="{{ route('admin.product_variant.index', ['product' => $product->id]) }}">Product
                        Variant</a></div>
                <div class="breadcrumb-item">Product variants Items</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product : {{ $product->name }} </h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product_variant_items.create') }}"
                                    class="btn btn-icon icon-left btn-primary">
                                    <i class="far fa-edit"></i> Create New
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}


    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.product_variant.changestatus') }}",
                    method: "PUT",
                    data: {
                        isChecked: isChecked,
                        id: id,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                        } else if (response.status === 'error') {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })

                console.log(isChecked);
            })
        })
    </script>
@endpush
