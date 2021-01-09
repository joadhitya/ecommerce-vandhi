@extends('admin.layouts.master')
@section('content')
<div class="main-content-inner mt-4">
    <div class="row">
        <div class="col-xl-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="header-title mb-0">Manage Product Stock</h4>
                        <button class="btn btn-icon icon-left btn-warning" id="back-product" style="display: none"
                            onclick="addForm('product','N')"><i class="fa fa-backward mr-2"></i>
                            Kembali</button>
                        {{-- <button class="btn btn-icon icon-left btn-primary" id="add-product"
                            onclick="addForm('product','Y')"><i class="fa fa-plus mr-2"></i>
                            Tambah Data</button> --}}
                    </div>

                    <table class="table datatables table-bordered table-hover" id="table-product">
                        <thead>
                            <tr>
                                <th style="width:2%">#</th>
                                <th>Code</th>
                                <th>Product Name </th>
                                <th style="width:12%">Price</th>
                                <th style="width:9%">Qty</th>
                                <th>Image</th>
                                <th style="width:5%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="data-product">
                            <?php
                                $no = 1;
                            ?>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_name }} </td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_stock }}</td>
                                <td>Image</td>
                                <td>
                                    <button onclick="manageStock({{ $product->id }})" class="btn btn-xs btn-info"><i
                                            class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalManageStock" tabindex="-1" role="dialog" aria-labelledby="modalManageStockLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalManageStockLabel">Stock Management Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_manage_stock">
                    <input type="hidden" class="form-control" id="id_product" name="id_product">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product-name" class="col-form-label">Product:</label>
                                <input type="text" class="form-control" id="product-name" readonly name="product_name">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-stock" class="col-form-label">Current Stock:</label>
                                <input type="text" class="form-control" id="product-stock" readonly
                                    name="product_stock">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-stock" class="col-form-label">Add Stock:</label>
                                <input type="text" class="form-control" id="add-stock" name="add_stock">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateStock()">Update Stock</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')


<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    function manageStock(id_product) {
        $("#modalManageStock").modal('show')

        $("#form_manage_stock .form-control").val('');

        $.ajax({
            url: `/master-data/product/getProductById/${id_product}`,
            method: "get",
            success: async response => {
                var data = await JSON.parse(response)
                $("#id_product").val(data[0].id)
                $("#product-name").val(data[0].product_name)
                $("#product-stock").val(data[0].product_stock)
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function updateStock() {
        var id_product = $("#id_product").val()
        var current_stock = $("#product-stock").val()
        var add_stock = $("#add-stock").val()

        if(add_stock == ''){
            alert('Please Input Stock');
        }else{
            var formData = $("#form_manage_stock").serialize();
            $.ajax({
                url: `/master-data/product/getProductById/${id_product}`,
                method: "post",
                data: formData,
                success: async response => {
                    await console.log(response)                    
                    $("#modalManageStock").modal('hide')
                    location.reload();
                },
                error: function (err) {
                    console.log(err);
                }
            });

        }

    }

</script>
@endpush
