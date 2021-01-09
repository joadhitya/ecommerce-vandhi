@extends('admin.layouts.master')
@section('content')
<div class="main-content-inner mt-4">
    <div class="row">
        <div class="col-xl-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="header-title mb-0">Data Master Product</h4>
                        <button class="btn btn-icon icon-left btn-warning" id="back-product" style="display: none"
                            onclick="addForm('product','N')"><i class="fa fa-backward mr-2"></i>
                            Kembali</button>
                        <button class="btn btn-icon icon-left btn-primary" id="add-product"
                            onclick="addForm('product','Y')"><i class="fa fa-plus mr-2"></i>
                            Tambah Data</button>

                    </div>
                    @include('admin.components.table')
                    @include('admin.master-data.product.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
@endsection

@push('page-scripts')

<script src="{{asset('script/master-data/index.js')}}"></script>
<script src="{{asset('script/master-data/product.js')}}"></script>

<script>
    $(document).ready(function () {
        getCategory()
    });
</script>
@endpush
