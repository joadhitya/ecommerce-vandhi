@extends('client.layouts.master')
@section('content')

<section id="login_section" class="section-features text-xs-center"
    style="padding-top:120px;min-height: -webkit-fill-available;">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div id="process_transaction">
                    <div class="card" style="background: transparent">
                        <h3 class="display-3 text-uppercase" style="font-weight:bold;text-align:left;font-size:2em">
                            Process
                            Transaction
                        </h3>
                        <form id="payment-form" method="post" class="payment" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="address"
                                            name="address" placeholder="Address">
                                        <span class="field_error" id="address_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select type="text" class="form-control form-control-lg" id="province"
                                            name="province" placeholder="Province">
                                            <option value="">Select Province</option>
                                            <option value="1">Yogyakarta</option>
                                        </select>
                                        <span class="field_error" id="province_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select type="text" class="form-control form-control-lg" id="city" name="city"
                                            placeholder="City">
                                            <option value="">Select City</option>
                                            <option value="2">Sleman</option>
                                            <option value="2">Depok</option>
                                            <option value="2">Kota Yogyakarta</option>
                                        </select>
                                        <span class="field_error" id="city_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="zip_code"
                                            name="zip_code" placeholder="Zip Code">
                                        <span class="field_error" id="zip_code_error"></span>
                                    </div>
                                </div>
                            </div>

                            <hr style="margin-top:0px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select type="text" class="form-control form-control-lg" id="raja_payment"
                                            name="raja_payment" placeholder="raja_payment" onChange="ongkir_payment()">
                                            <option value="">Select Delivery Payment</option>
                                            <option value="4">JNE</option>
                                        </select>
                                        <span class="field_error" style="margin-left:1px;"
                                            id="raja_payment_error"></span>
                                        <input id="weight" name="weight" type="hidden"
                                            value="<?=count($_SESSION['cart']);?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Payment Type</h5>
                                        <div style="display:flex;justify-content:space-between">
                                            <div class="custom-control custom-radio custom-control-inline ">
                                                <input type="radio" checked="" id="cod" name="type_payment"
                                                    class="custom-control-input" value="cod">
                                                <label class="custom-control-label" for="cod">Cash On Delivery</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline mx-2">
                                                <input type="radio" id="credit_card" name="type_payment"
                                                    class="custom-control-input" value="credit_card">
                                                <label class="custom-control-label" for="credit_card">Midtrans</label>
                                            </div>

                                        </div>
                                        <span class="field_error" style="margin-left:1px;"
                                            id="type_payment_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2" style="margin-top:10px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Transfer Photo</h5>
                                        <style>
                                            #transfer_photo input[type=file] {
                                                display: none;
                                            }

                                            .field_error {
                                                margin-left: 1px;
                                                /* display:flex; */
                                            }

                                        </style>
                                        <input type="file" class="form-control form-control-lg" id="transfer_photo"
                                            name="transfer_photo" placeholder="Photo">
                                        <span style="margin-left:1px" class="field_error" id="photo_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-right:10px;padding-left:1px">
                                    <img style="width:20%" src="./img/bca.png" alt=""> 999-3123-423123
                                    <h5>Aga Aulia Gandhi</h5>
                                    <h6>Please Transfer your Total Payment to our Account</h6>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary-outline btn-block" id="order_product"
                                        value="Submit" />
                                </div>
                                <div class="col-md-6 " style="text-align:left;padding-top:10px">

                                    <a href="index.php" class="pull-left" style="text-align:left">Back to Shop</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5" style="padding-left:1.2rem">
                <div class="card" style="background: transparent">
                    <h3 class="display-3 text-uppercase" style="font-weight:bold;text-align:left;font-size:2em">Checkout
                    </h3>
                    <div class="card-body">
                        <div class="order">
                            <h5>Order #0101</h5>
                            <ul class="order-list">
                                {{-- SCRIPT?? --}}
                                <?php
                                    $total_price = 0;
                                ?>
                                @foreach ($cart_product as $product)
                                <li>
                                    <img src="/storage/<?= $product['product_image'] ?>">
                                    <h4><?=$product['product_name']?></h4>
                                    <div style="padding-left:70px;display:flex;justify-content:space-between">
                                        <h5 style="font-size:14px;">Qty : <b><?= $product['product_quantity']?></b></h5>
                                        <h5 style="font-size:14px;">Rp.
                                            <b><?= number_format($product['total_price_item']) ?></b> </h5>
                                        <a href="javascript:void(0)"
                                            onclick="manage_cart('<?php echo $product['product_id'] ?>', 'remove')"
                                            stlye="margin-bottom:0.5rem"><i
                                                style="font-size:14px;cursor:pointer;color:#fb8181"
                                                class="fas fa-trash"></i></a>
                                    </div>
                                </li>
                                <?php
                                    $total_price += $product['total_price_item'];
                                ?>
                                @endforeach

                            </ul>
                            <span class="field_error" style="margin-left:1px;display:table-header-group"
                                id="coupon_result"></span>

                            <h5 class="total" style="margin-top:15px">Total Transaction</h5>
                            <h3 style="margin-bottom:0px">Rp. <span
                                    id="total_transaction"><?= number_format($total_price) ?></span> </h3>
                            <input type="hidden" id="total_transaction_input" name="total_transaction_input" value="0">
                            <h3 id="fix" style="display:none;font-weight:bold">Rp. <span id="fixed_price"
                                    value=""></span></h3>
                            <input type="hidden" id="fixed_price_input" name="fixed_price_input" value="">
                            <div id="alert" style="display:none" class="alert alert-success" role="alert">
                                <strong>Vocher Applied Succesfully!</strong>
                                <span>Discount Rp. <span id="voc_disc"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




@push('page-scripts')
<script>
    $.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

    $(document).on('submit', '#payment-form', function (e) {
        e.preventDefault()
        data = new FormData(this);
        $('#address_error').html('');
        $('#province_error').html('');
        $('#city_error').html('');
        $('#zip_code_error').html('');
        $('#raja_payment_error').html('');
        $('#type_payment_error').html('');
        $('#photo_error').html('');
        msg = '';
        var address = $('#address').val();
        var province = $('#province').val();
        var city = $('#city').val();
        var zip_code = $('#zip_code').val();
        var raja_payment = $('#raja_payment').val();
        var type_payment = $('[name="type_payment"]').val();
        var extension = $('#transfer_photo').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#transfer_photo').val('');
                $('#photo_error').html('Only for image Extentions (JPG, PNG, JPEG)');
                msg = 'error'
                return false;
            }
        }

        if (address == '') {
            $('#address_error').html('Please Enter Your Address');
            msg = 'error'
        }
        if (province == '') {
            $('#province_error').html('Select Your Province');
            msg = 'error'
        }
        if (city == '') {
            $('#city_error').html('Select Your City');
            msg = 'error'
        }
        if (zip_code == '') {
            $('#zip_code_error').html('Please Enter Zip Code');
            msg = 'error'
        }
        if (raja_payment == '') {
            $('#raja_payment_error').html('Select Your Delivery Payment');
            msg = 'error'
        }
        if (type_payment == '') {
            $('#type_payment_error').html('Choose Payment Type');
            msg = 'error'
        }
        if (extension == '') {
            $('#photo_error').html('Insert Your Transaction Attachment');
            msg = 'error'
        }


        if (msg == '') {
            deliver_to = address
            name = "Aga Aulia"
            weight = "5 kg"
            paid_by = "Cash on Delivery"
            delivery_fee = 50000

            if ($("#fixed_price_input").val() != '') {
                total_price = $("#fixed_price_input").val()
            } else {
                total_price = $("#total_transaction_input").val()
            }

            var total_pembayaran = $("#total_transaction").text();

            total_payment = parseInt(delivery_fee) + parseInt(total_price)
            
            // total_payment = "Rp. 2.300.000"
            Swal.fire({
                title: 'Transaction Recap',
                html: "This is your order recap Mr. " + name +
                    "</br> <div style='margin-top:15px'> <table style='text-align:left'> <tr> <td style='width:30%'>Delivered to </td> <td>:</td> <td style='font-weight:bold;'> " +
                    deliver_to +
                    "</td> </tr> <tr> <td style='width:30%'>Paid using</td> <td>:</td> <td style='font-weight:bold'>" +
                    paid_by +
                    "</td> </tr> <tr> <td style='width:30%'>Price</td> <td>:</td> <td style='font-weight:bold'>" +
                        total_pembayaran +
                    "</td> </tr> </table> </div> <hr> <h3 style='color:red;text-transform:uppercase;font-weight:bold'>Total Payment : " +
                        total_pembayaran + "</h3>",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, procced'
            }).then((result) => {
                if (result.value) {

                    $("#login_section").LoadingOverlay("show", {
                        background: "transparent"
                    });
                    $("#order_product").attr('disabled', true)
                    $.ajax({
                        url: '/client/transaction/checkout',
                        type: 'post',
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function (result) {
                            $("#login_section").LoadingOverlay("hide")
                            Swal.fire({
                                position: 'top-start',
                                icon: 'success',
                                title: 'Transaction Order Sucecesfully',
                                showConfirmButton: false,
                                timer: 1000
                            })
                            window.location.href = '/vandhi'

                        },
                        error : function(err){
                            console.log(err)
                        }
                    })

                }
            })
        }


    })

</script>
@endpush
