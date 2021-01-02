@extends('client.layouts.master')
@section('content')

<section class="section-features text-xs-center bg-faded "
    style="padding-top:120px;min-height: -webkit-fill-available;">
    <!-- CART -->
    <h4>Shopping Cart</h4>
    <div class="container">
        <div>

            <table id="dtBasicExample" style="text-align:left" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>No.
                        </th>
                        <th style="width:20%;text-align:center">Product
                        </th>
                        <th>Product Details
                        </th>
                        <th>Price
                        </th>
                        <th style="width:10%">Quantity
                        </th>
                        <th>Total Price
                        </th>
                        <th style="width:2%;font-size:12px">Actions
                        </th>
                    </tr>
                </thead>
                <tbody>               
                    <?php
                        $total_price = 0;
                        $no = 1;
                    ?>
                    @foreach ($cart_product as $product)
                    <tr stlye="text-align:left">
                        <td stlye=""><?=$no?></td>
                        <td style="text-align:center"><img style="width:40%;" src="/storage/<?= $product['product_image'] ?>" alt="product img" /></td>
                        <td><b><?= $product['product_name'] ?></b><br><?= $product['category_name']. ' - ' .$product['subcategory_name'] ?></td>
                        <td>Rp. <?= number_format($product['product_price'] ) ?></td>
                        <td style="text-align:left">
                            <input style="width:45px;padding-right:5px;margin-bottom:-30px" class="form-control"
                                id="<?php echo $product['product_id']  ?>qty" type="number" value="<?= $product['product_quantity']  ?>">
                            <br>
                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $product['product_id']  ?>', 'update')"
                                style="color:#9090ff">Update</a> </td>
                        <td>Rp. <?= number_format($product['product_price'] * $product['product_quantity']) ?></td>
                        <td style="text-align:center">
                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $product['product_id']  ?>', 'remove')">
                                <i class="fas fa-trash" style="color:#ff7272"></i> </a>
                        </td>
                    </tr>

                    <?php

                        $total_price += $product['total_price_item'];
                        $no++;
                    ?>
                    @endforeach
                    <tr stlye="text-align:left">
                    </tr>
                </tbody>
            </table>  
            <div style="display:flex;margin-top:20px">
                <h5>Total Transaction :
                </h5>
                <h5>Rp. <?=number_format($total_price)?>
                </h5>
            </div>
        </div>
        <div style="display:flex;justify-content:space-between;margin-top:30px">
            <a href="/vandhi" class="btn btn-primary-outline">Continue Shopping</a>
            <a href="/checkout" class="btn btn-primary-outline">Checkout</a>
        </div>
    </div>
</section>
@endsection
