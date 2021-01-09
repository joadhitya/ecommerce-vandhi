@extends('client.layouts.master')
@section('content')
<style>
    .dataTables_info {
        display: none;
    }

    #dtBasicExample_paginate {
        display: none;
    }

    .dataTables_wrapper div.dataTables_filter input {
        background: transparent;
    }

    .dataTables_wrapper div.dataTables_length select {
        background: transparent;
    }

    table.table-bordered.dataTable tbody td {
        text-align: left:
    }
</style>
<section class="section-features text-xs-center bg-faded "
    style="padding-top:120px;min-height: -webkit-fill-available;">
    <!-- ORDER -->
    <h4>Order Transaction <b style="text-decoration:italic">Vandhi E-Commerce</b></h4>
    <div class="container" style="margin-top:50px">
        <div class="mt-5">
            <table id="dtBasicExample" style="text-align:left" class="table table-bordered table-custom" width="100%">
                <thead>
                    <tr>
                        <th class="" style="width:3%">No.
                        </th>
                        <th class="" style="width:20%;text-align:center">Transaction Code
                        </th>
                        <th class="" style="width:12%">Order Date
                        </th>
                        <th class="">Destination
                        </th>
                        <th class="" style="width:20%">Payment
                        </th>
                        <th class="" style="width:13%">Order Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        $created_at= '01 Mei 2020';
                    ?>
                    @foreach ($products as $product)
                    <tr>
                        <td class="no"><span class="no"><?=$no ?></span></td>
                        <td class="" style="text-align:center">
                            <a href="order_details/<?=$product->id?>">(<?=$product->id ?>) - <?=$product->transaction_code?></a>
                            <br>
                            <a style="color:#6363ff" href="order_pdf.php?id=<?=$product->id?>">PDF <i class="fas fa-file"></i> </a>
                        </td>
                        <td class=""><span class=""><?=$created_at ?></span></td>
                        <td class=""><span
                                class=""><?=$product->address.',' .$product->province. ',' .$product->city. ',' .$product->zip_code  ?></span>
                        </td>
                        <td class=""><span class="">Type Payment: <b style="text-transform:uppercase"><?=$product->type_payment ?> </b> 
                    </span><br><span>Status Payment : <b style="text-transform:capitalize"> <?=$product->payment_status ?></b></span> </td>
                        <td class=""><span class="" 
                        <?php
                            if($product->order_status == '1'){
                                echo ' style="color:#fd791b"';
                            }elseif($product->order_status == '2'){
                                echo ' style="color:#9090ff"';
                            }elseif($product->order_status == '3'){
                                echo ' style="color:#ff00b1"';
                            }elseif ($product->order_status == '4') {
                                echo ' style="color:#ff0018"';
                            }elseif ($product->order_status == '5') {
                                echo ' style="color:#028200"';
                            }
                        ?>><b><?=$product->status_name ?></b></span></td>

                        <?php $no++; ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection




@push('page-scripts')
@endpush
