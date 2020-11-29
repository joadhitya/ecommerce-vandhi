@extends('admin.layouts.master')
@section('content')
<div class="main-content-inner mt-4">
    <div class="row">
        <div class="col-xl-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="header-title mb-0">Data Master Subcategory</h4>
                        <button class="btn btn-icon icon-left btn-warning" id="back-subcategory" style="display: none"
                            onclick="addForm('subcategory','N')"><i class="fa fa-backward mr-2"></i>
                            Kembali</button>
                        <button class="btn btn-icon icon-left btn-primary" id="add-subcategory"
                            onclick="addForm('subcategory','Y')"><i class="fa fa-plus mr-2"></i>
                            Tambah Data</button>

                    </div>
                    @include('admin.components.table')
                    @include('admin.master-data.subcategory.form')
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

<script>
    const fetchData = (type, id) => {
        $.ajax({
            url: `/master-data/${type}/${id}`,
            method: 'get',
            dataType: 'json',
            success: function (response) {
                $("#id_subcategory").val(response[0].id);
                $("#subcategory_code").val(response[0].subcategory_code);
                $("#subcategory_name").val(response[0].subcategory_name);               
                $("#id_category").val(response[0].id_category);               
                $("#subcategory_description").val(response[0].subcategory_description);              
                
            },
            error: function (err) {
                console.log(err)
            }
        })
    }
</script>
@endpush
