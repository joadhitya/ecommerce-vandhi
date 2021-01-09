@extends('admin.layouts.master')
@section('content')

<div class="main-content-inner mt-4">
    <div class="row">
        <div class="col-xl-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="title-card">
                        <h4 class="header-title">List Data Order Transaction</h4>
                    </div>
                    <div class="data-tables">
                        <table id="dataTable" class="table-bordered table-hover">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th class="" style="width:3%">No.
                                    </th>
                                    <th class="" style="width:20%;text-align:center">Transaction Code
                                    </th>
                                    <th class="" style="width:14%">Order Date
                                    </th>
                                    <th class="">Destination
                                    </th>
                                    <th class="" style="width:20%">Payment
                                    </th>
                                    <th class="" style="width:14%">Order Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1;  ?>
                                @foreach ($transactions as $transaction)
                                <?php                                    
                                    $d_ca =date_create($transaction->created_at);
                                    $created_at = date_format($d_ca,"d-M-yy"); 
                                ?>
                                <tr>
                                    <td class="no"><span class="no"><?=$no ?></span></td>
                                    <td class="" style="text-align:center">
                                        <a style="color:black" href="order_detail/<?=$transaction->id ?>">(<?=$transaction->id ?>)
                                            - <?=$transaction->transaction_code?> <i class="fa fa-pencil"></i> </a>
                                        <br>
                                        <a style="color:#6363ff" href="order_pdf.php?id=<?=$transaction->id?>">PDF <i
                                                class="fa fa-file-pdf-o"></i> </a>
                                    </td>
                                    <td class=""><span class=""><?=$created_at ?></span></td>
                                    <td class=""><span
                                            class=""><?=$transaction->address.',' .$transaction->province. ',' .$transaction->city. ',' .$transaction->zip_code  ?></span>
                                    </td>
                                    <td class=""><span class="">Type Payment: <b
                                                style="text-transform:uppercase"><?=$transaction->type_payment ?> </b>
                                        </span><br><span>Status Payment : <b style="text-transform:capitalize">
                                                <?=$transaction->payment_status ?></b></span> </td>
                                    <td class=""><span class="" <?php
                            if($transaction->order_status == '1'){
                                echo ' style="color:#fd791b"';
                            }elseif($transaction->order_status == '2'){
                                echo ' style="color:#9090ff"';
                            }elseif($transaction->order_status == '3'){
                                echo ' style="color:#ff00b1"';
                            }elseif ($transaction->order_status == '4') {
                                echo ' style="color:#ff0018"';
                            }elseif ($transaction->order_status == '5') {
                                echo ' style="color:#028200"';
                            }
                        ?>><b><?=$transaction->STATUS_NAME ?></b></span></td>
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
</div>
@endsection

@section('modal')
@endsection

@push('page-scripts')

@endpush
