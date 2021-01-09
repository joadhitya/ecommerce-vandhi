@extends('admin.layouts.master')
@section('content')



<input type="hidden" id="path_trans" value="../../storage/" />
<div class="main-content-inner mt-4">
    <div class="row">
        <div class="col-xl-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                                    $transaction_code = $header_orders[0]->transaction_code;
                                    $user_id = $header_orders[0]->id_customer;
                                    $transaction_id = $header_orders[0]->id;
                                    $transfer_photo = $header_orders[0]->transfer_photo;
                                    $dc = date_create($header_orders[0]->created_at);
                                    $created_at = date_format($dc,"d-M-Y");  
                                    $order_status = $header_orders[0]->order_status;
                                    $order_status_name = $header_orders[0]->status_name;
                            ?>
                            <h4 class="header-title">Order : #<?=$transaction_code?></h4>
                            <h4 class="header-title">Date Transaction : <?=$created_at?></h4>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" id="id_transaction" name="id_transaction" value="<?=$transaction_id?>">
                            <div class="row">
                                <div class="col-md-5" style="text-align:end">
                                    <b style="font-size:16px">Transaction Status</b>
                                    <br>

                                    <a href="#" onclick="show_user('<?=$user_id?>')"><i
                                            class="fa fa-user fa-lg mr-4"></i></a>&nbsp;
                                    <b <?php
                                        if($order_status == '1'){
                                            echo ' style="color:#fd791b"';
                                        }elseif($order_status == '2'){
                                            echo ' style="color:#9090ff"';
                                        }elseif($order_status == '3'){
                                            echo ' style="color:#ff00b1"';
                                        }elseif ($order_status == '4') {
                                            echo ' style="color:#ff0018"';
                                        }elseif ($order_status == '5') {
                                            echo ' style="color:#028200"';
                                        }
                                        ?>>
                                        <?php echo $order_status_name ?>
                                    </b>&nbsp;
                                    <a href="#" onclick="show_attachment('<?=$transfer_photo?>')"><i
                                            class="fa fa-paperclip fa-lg"></i></a>
                                </div>
                                <div class="col-md-7" style="display:flex;justify-content:space-between">
                                    <form method="post">
                                        <div style="display:flex">
                                            <select <?php if($order_status == '5'){ echo ' style="display:none" '; }?>
                                                name="update_order_status" class="form-control" id="order_status">
                                                <option value="">Select Status </option>

                                                @foreach ($status as $data)

                                                @if ($data->id == $order_status)
                                                <option value="<?=$data->id?>" selected> <?=$data->status_name?>
                                                </option>
                                                @else
                                                <option value="<?=$data->id?>"> <?=$data->status_name?></option>
                                                @endif
                                                @endforeach

                                                {{-- <?php
                                                    $sql_status_list = "SELECT * FROM order_status ORDER by name ASC";
                                                    $res = mysqli_query($con,"SELECT * FROM order_status ORDER by STATUS_NAME ASC");
                                                    while($row=mysqli_fetch_assoc($res)){
                                                        if($row['ID_ORDER_STATUS']==$order_status){
                                                            echo "<option selected value=".$row['ID_ORDER_STATUS']."> ".$row['STATUS_NAME']."</option>";
                                                        }else{
                                                            echo "<option value=".$row['ID_ORDER_STATUS']."> ".$row['STATUS_NAME']."</option>";
                                                        }
                                                        
                                                    }
                                                ?> --}}
                                            </select>
                                            <button type="button" id="process_data" onclick="processDataTransaction()"
                                                class="btn btn-primary btn-xs btn-rounded ml-3"
                                                <?php if($order_status == '5'){ echo ' style="display:none" '; }?>>
                                                <i class="fa fa-check-circle-o"></i> <b> PROCESS</b>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="" id="user_data" style="display:none">
                            {{-- <input id="user_name" style="text-transform:capitalize" type="text" value=<?=$header_order['USERNAME']?>>
                            <input id="email" type="text" value=<?=$header_order['EMAIL']?>>
                            <input id="province" type="text" value=<?=$header_order['PROVINCE']?>>
                            <input id="city" type="text" value=<?=$header_order['CITY']?>>
                            <input id="address" type="text" value=<?=$header_order['ADDRESS']?>>
                            <input id="raja_payment" type="text" value=<?=$header_order['RAJA_PAYMENT']?>>
                            <input id="type_payment" type="text" style="text-transform:uppercase" value=<?=$header_order['TYPE_PAYMENT']?>> --}}
                        </div>
                    </div>
                    <hr>
                    <div class="data-tables">
                        <style>
                            table.table-bordered.dataTable tbody th,
                            table.table-bordered.dataTable tbody td {
                                padding-top: 0px;
                                padding-bottom: 0px;
                            }

                            .dataTables_info {
                                display: none;
                            }

                        </style>
                        <table id="dataTable" class="table-bordered table-hover">
                            <thead class="bg-light text-capitalize">
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
                                            <img style="" src="/storage/<?= $order->product_image ?>" alt="" /></a></td>
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
                            </tbody>
                        </table>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <h5>Total Price :
                                    <span style="font-weight:bold; ">Rp.
                                        <?= number_format($total_price) ?></span>
                                    {{-- <span
                                        style="font-weight:bold; <?php if($header_order['COUPON_CODE'] == '') { echo ' display:none'; } ?>">Rp.
                                        <?= number_format($total_price - $header_order['COUPON_VALUE']) ?></span> --}}
                                </h5>
                            </div>
                            {{-- <?php
                                if($header_order['COUPON_CODE'] != ''){
                                ?>
                            <div class="col-md-6">
                                <div class="alert alert-primary" role="alert">
                                    <strong>Vocher Used!</strong>Code Vocher : <?=$coupon_code?> | Discount :
                                    <?=$coupon_value?>
                                </div>
                            </div>
                            <?php }
                            ?> --}}

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

    function show_attachment(image) {
        path = $("#path_trans").val()
        tp = path + image;
        Swal.fire({
            title: 'Attachment Transaction',
            imageUrl: tp,
            imageAlt: 'Attachment',
        })
    }

    function processDataTransaction() {
        var idTransaction = $("#id_transaction").val();
        var statusValue = $("#order_status").val();

        $.ajax({
        url: `/master-transaction/update_status/${idTransaction}`,
        method: "post",
        data: {statusValue},
        success: function (response){
            alert('SUCCESS UPDATE DATA!')
            window.location.href = '/master-transaction/orders'

        },
        error: function(err) {
            console.log(err);
        }
    });

    }

</script>
@endpush
