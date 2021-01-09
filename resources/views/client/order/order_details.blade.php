@extends('client.layouts.master')
@section('content')

<section class="section-features text-xs-center bg-faded "
    style="padding-top:120px;min-height: -webkit-fill-available;">
    <!-- ORDER -->
    <?php
        $transaction_code = $header_orders[0]->transaction_code;
        $user_id = $header_orders[0]->id_customer;
        $transaction_id = $header_orders[0]->id;
        $transfer_photo = $header_orders[0]->transfer_photo;
        $dc = date_create($header_orders[0]->created_at);
        $created_at = date_format($dc,"d-M-Y");  
        $order_status = $header_orders[0]->order_status;
        $order_status_name = $header_orders[0]->status_name;
        $address = $header_orders[0]->address;
    ?>
    <h4>Order Transaction: #<b style="text-decoration:italic"><?=$transaction_code?></b></h4>
    <div class="container" style="margin-top:20px">
        <div>
            <style>
                .table-custom {
                    /* border: 1px solid #e3e6f0; */
                }
            </style>
            <table id="dtBasicExample" style="text-align:left" class="table table-bordered table-custom" width="100%">
                <thead>
                    <tr>
                        <th class="" style="width:3%">No.
                        </th>
                        <th class="" style="width:12%;text-align:center">Product
                        </th>
                        <th class="">Product Details
                        </th>
                        <th class="" style="width:12%">Price
                        </th>
                        <th class="" style="width:3%">Qty
                        </th>
                        <th class="" style="width:12%">Total Price
                        </th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php
                        $no = 1;
                        $total_price = 0;
                    ?>
                    @foreach ($detail_orders as $order)
                    <?php
                        $order_price = $order->quantity * $order->price;
                    ?>
                    <tr>
                        <td class=""><span class=""><?=$no?></span></td>
                        <td class=""><a href="../product.php?id=<?=$order->id_product ?>">
                                <img style="width:100px" src="/storage/<?= $order->product_image ?>" alt="" /></a></td>
                        <td class="">
                            <span
                                class=""><b><?=$order->product_name. ' (' .$order->product_code. ')'?></b></span><br>
                            <span class=""><?=$order->product_description ?></span><br>
                            <span class="">Category :
                                <?=$order->category_name. ' - ' .$order->subcategory_name ?></span>
                        </td>
                        <td class=""><span class="">Rp. <?=number_format($order->price) ?></span></td>
                        <td class="" style="text-align:center"><span class=""><?=$order->quantity ?></span>
                        </td>
                        <td class=""><span class="">Rp.
                                <?=number_format($order->quantity * $order->price) ?></span></td>
                    </tr>
                    <?php
                        $total_price += $order_price;
                    ?>
                    @endforeach

                    <tr>
                        <td colspan="3">Address : <?= $address ?></td>
                        <td colspan="2" style="text-align:right"><b>Total Price : </b></td>
                        <td>                         
                            <b>Rp. <?=number_format($total_price)?></b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
@push('page-scripts')
@endpush
