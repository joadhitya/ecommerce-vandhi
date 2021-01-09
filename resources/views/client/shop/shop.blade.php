@extends('client.layouts.master')
@section('content')

<?php
    $category = '';
    $subcategory = '';
    $sort_order = '';

    // if(isset($_GET->category)){
    //     $category = $_GET->category;
    // }
    // if(isset($_GET->subcategory)){
    //     $subcategory = $_GET->subcategory;
    // }

    $price_high_selected="";
    $price_low_selected="";
    $new_selected="";
    $old_selected="";

    $link = $_SERVER['REQUEST_URI'];

?>

<section class="section-features text-xs-center" style="padding-top:100px">
    <h2 style="font-weight:bold;text-transform:uppercase">I GOT SUPPLIES</h2>
    <hr>
    <div style="display:flex;justify-content:center">
        <b>Sort By :</b>&nbsp;&nbsp;

        {{-- <input type="hidden" style="width:500px" id="url" value="<?=$link?>"> --}}
        <div class="product-sort">
            <select class="sort-product" style="width:200px"
                onChange="sort_product_drop('<?= $category ?>','<?=$link?>')" id="sort_product_id">
                <option value="">Default softing</option>
                <option value="price_low" <?= $price_low_selected ?>>Sort by Price Low to High</option>
                <option value="price_high  <?= $price_high_selected ?>">Sort by Price High to Low</option>
                <option value="new" <?= $new_selected ?>>Sort by newness</option>
                <option value="old" <?= $old_selected ?>>Sort by oldests</option>
            </select>
        </div>
    </div>

    <div class="container" style="margin-top:5px;max-width:1450px">
        <div class="row p-y-2 ">
            <div class="col-md-2">
                <div class="menu">
                    <nav>
                        <ul class="mcd-menu">
                            <li>
                                <a href="shop" class="active">
                                    <!-- <i class="fa fa-edit"></i> -->
                                    <strong>Category</strong>
                                </a>
                            </li>

                            @foreach ($categories as $category)
                            <li>
                                <a href="/shop.php?category=<?=$category->id?>">
                                    <strong><?=$category->category_name?></strong>
                                </a>
                                {{-- <?php
                                            $cat_id = $category->ID_CATEGORY;
                                            $sub_cat_res = mysqli_query($con, "SELECT * FROM subcategory WHERE status = '1' AND ID_CATEGORY = '$cat_id' ");
                                            // echo $sub_cat_res;
                                            if(mysqli_num_rows($sub_cat_res) > 0){
                                                ?>
                                <ul>
                                    <?php
                                        while($sub_cat_rows = mysqli_fetch_assoc($sub_cat_res)){
                                            echo '<li><a href="shop.php?category='.$category->ID_CATEGORY.'&subcategory='.$sub_cat_rows->ID_SUBCATEGORY.'">'.$sub_cat_rows->SUBcategory_name.'</a></li> ';
                                        }
                                    ?>
                                    <?php } ?>
                                </ul> --}}
                            </li>
                            @endforeach
                            {{-- <?php
                                foreach($cat_arr as $category){ ?>
                            <li>
                                <a <?php if(isset($_GET->category) && $_GET->category == $category->ID_CATEGORY){
                                    echo ' class="active"';
                                } ?> href="./shop.php?category=<?=$list->ID_CATEGORY?>">
                                    <!-- <i class="fa fa-comments-o"></i> -->
                                    <strong><?=$list->category_name?></strong>
                                </a>
                                <?php
                                            $cat_id = $list->ID_CATEGORY;
                                            $sub_cat_res = mysqli_query($con, "SELECT * FROM subcategory WHERE status = '1' AND ID_CATEGORY = '$cat_id' ");
                                            // echo $sub_cat_res;
                                            if(mysqli_num_rows($sub_cat_res) > 0){
                                                ?>
                                <ul>
                                    <?php
                                        while($sub_cat_rows = mysqli_fetch_assoc($sub_cat_res)){
                                            echo '<li><a href="shop.php?category='.$list->ID_CATEGORY.'&subcategory='.$sub_cat_rows->ID_SUBCATEGORY.'">'.$sub_cat_rows->SUBcategory_name.'</a></li> ';
                                        }
                                    ?>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?> --}}
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-md-10" style="padding-left:30px;padding-right:40px">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-3" style="margin-top:25px">
                        <div class="page-wrapper">
                            <div class="page-inner">
                                <div class="row">
                                    <div class="el-wrapper">
                                        <div class="box-up">
                                            {{-- <?= PRODUCT_IMAGE_SITE_PATH .$product->IMAGE ?> --}}
                                            <img style="max-width:180px" class="img" src="/storage/<?= $product->product_image ?>" alt="">
                                            <div class="info-inner">
                                                <a href="product.php?id=<?=$product->id?>"><span class="p-name"><b><?= $product->product_name ?></b> </span></a>
                                                <span class="p-company"><?= $product->category_name ?></span>
                                            </div>
                                            <div class="a-size">Description :
                                                <span class="size"><br><?= $product->product_description ?></span>
                                            </div>
                                        </div>
                                        <div style="display:flex;justify-content:center;">
                                            <a href="javascript:void(0)" onclick="manage_cart('<?= $product->id ?>','add')"
                                                class="card__icon">
                                                <i class="fas fa-heart" aria-hidden="true"></i>
                                            </a>
                                            <h5 style="margin:15px">Rp. <?= number_format($product->product_price) ?></h5>
                                            <a href="javascript:void(0)" onclick="manage_cart('<?= $product->id ?>','add')"
                                                class="card__icon">
                                                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <?php
                        foreach($get_product as $list){
                    ?>
                    <div class="col-md-3" style="margin-top:25px">
                        <div class="page-wrapper">
                            <div class="page-inner">
                                <div class="row">
                                    <div class="el-wrapper">
                                        <div class="box-up">
                                            <img style="max-width:180px" class="img" src="<?= PRODUCT_IMAGE_SITE_PATH .$list->IMAGE ?>" alt="">
                                            <div class="info-inner">
                                                <a href="product.php?id=<?=$list->id?>"><span class="p-name"><b><?= $list->product_name ?></b> </span></a>
                                                <span class="p-company"><?= $list->category_name ?></span>
                                            </div>
                                            <div class="a-size">Description :
                                                <span class="size"><br><?= $list->product_description ?></span>
                                            </div>
                                        </div>
                                        <div style="display:flex;justify-content:center;">
                                            <a href="javascript:void(0)" onclick="manage_cart('<?= $list->id ?>','add')"
                                                class="card__icon">
                                                <i class="fas fa-heart" aria-hidden="true"></i>
                                            </a>
                                            <h5 style="margin:15px">Rp. <?= number_format($list->PRICE) ?></h5>
                                            <a href="javascript:void(0)" onclick="manage_cart('<?= $list->id ?>','add')"
                                                class="card__icon">
                                                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?> --}}
                </div>
            </div>

        </div>

</section>
@endsection
