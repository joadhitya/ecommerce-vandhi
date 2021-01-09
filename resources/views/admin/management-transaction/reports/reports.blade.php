@extends('admin.layouts.master')
@section('content')

<div class="main-content-inner mt-4">
    <div class="row">
        <div class="col-xl-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="title-card">
                        <h4 class="header-title">Management Report Transaction</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="manageReport('PENJUALAN')"><i
                                    class="fa fa-file mr-2"></i> Report Penjualan</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="manageReport('CUSTOMER')"><i
                                    class="fa fa-file mr-2"></i> Report Customers</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="manageReport('PRODUCT')"><i
                                    class="fa fa-file mr-2"></i> Report Product Penjualan</button>

                        </div>
                    </div>
                    <div class="row">
                        <div id="report-show" class="mt-3" style="width:100%">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
@endsection

@push('page-scripts')
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    function manageReport(type) {
        $.ajax({
            url: `/master-transaction/reports/${type}`,
            type: 'post',
            data: {
                type
            },
            success: function (result) {
                $("#report-show").html(result);
            },
            error: function(err){
                console.log(err)
            }
        })
    }

</script>
@endpush
