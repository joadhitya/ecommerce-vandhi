
@extends('client.layouts.master')
@section('content')

<?php
    $id_category = $category->id;
    $category_name = $category->category_name;
    $category_code = $category->category_code;
    $category_description = $category->category_description;
?>

<section class="section-features text-xs-center bg-faded " style="padding-top:120px">
    <h2 style="font-weight:bold;text-transform:uppercase"><?=$category_name?></h2>
    <hr>
    <div style="display:flex;justify-content:center">
    <b>Sort By :</b>&nbsp;&nbsp;

        
        <div class="product-sort">
            <select class="sort-product" style="width:200px"  onChange="sort_product_drop(<?= $id_category ?>,'')" id="sort_product_id">
                <option value="">Default softing</option>
                {{-- <option value="price_low" <?= $price_low_selected ?>>Sort by Price Low to High</option>
                <option value="price_high  <?= $price_high_selected ?>">Sort by Price High to Low</option>
                <option value="new" <?= $new_selected ?>>Sort by newness</option>
                <option value="old" <?= $old_selected ?>>Sort by oldests</option> --}}
            </select>
        </div>
    </div>

    <div class="container">
        <div class="row p-y-2 ">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card_category">
                    <div class="card-name">
                        <h5 style="font-weight:bold;"><?= $product->product_name ?></h5>
                    </div>
                    <div class="content" style=" width: 180px;height: auto;">
                        <a href="product.php?id=<?=$product->id?>">
                            <img style=" width:100%;align:center" src="/storage/<?= $product->product_image ?>"  alt="">

                        </a>
                    </div>
                    <div class="card__precis">
                        <a href="" class="card__icon">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </a>
                        <div>
                            <span class="card__preci card__preci--now"
                                style="font-size:18px"><?= $product->category_name ?></span>
                            <span class="card__preci card__preci--now">Rp. <?= number_format($product->product_price) ?></span>
                        </div>
                        <a href="javascript:void(0)" onclick="manage_cart('<?= $product->id ?>','add')"
                            class="card__icon">
                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

</section>


@endsection
