@extends('client.layouts.master')

@section('content')
<section class="section-features text-xs-center bg-faded " style="padding-top:120px">
    <div class="container">
        @foreach ($product as $item)

        <div class="card_product">
            <div class="shoeBackground">
                <div class="gradients">
                    <div class="gradient second"></div>
                </div>
                <h1 class="nike"><?=$item->product_name?></h1>
                <img src="/storage/<?=$item->product_image?>" alt="" class="shoe show" style="width:100%">

            </div>
            <div class="info">
                <div class="shoeName">
                    <div>

                        <h1 class="big" style="font-size:24px"><?= $item->product_name?></h1>
                        {{-- <?php if($get_product['RECOMENDED'] == '1'){ ?>

                        <span class="new" style="font-weight:bold"><i class="fas fa-star"></i> Recomended</span>

                        <?php } ?> --}}
                    </div>
                    <h6 class="" style="text-align:left"><?= $item->category_name ?> -
                        <?= $item->subcategory_name ?></h6>
                </div>
                <div class="description">
                    <h3 style="margin-bottom:5px" class="title">Product Info</h3>
                    <p class="text" style="margin-block-end:5px;line-height:25px"><?= $item->product_description ?>.</p>
                </div>
                <style>
                    .select2 {
                        width: 50px;
                        margin-left: 10px;
                    }

                </style>
                <div class="description">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="display:flex">
                                <div style="margin-top:20px">
                                    <h3 class="title">Availability: <span
                                            style="text-transform:capitalize;color:gray">In Stock</span> </h3>
                                </div>

                                <div style="margin-left:20px;margin-top:8px">
                                    <label for="" style='font-size:22px;font-weight:600'>Quantity</label>
                                    : <span
                                        style="text-transform:capitalize;color:gray"><?=$item->product_stock?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buy-price">
                    <a href="javascript:void(0)" onclick="manage_cart('<?= $item->product_price ?>','add')"
                        class="btn btn-primary-outline " style="margin-top:15px"><i class="fas fa-shopping-cart"></i>Add
                        to Cart</a>
                    <div class="price">Rp. <h1><?= number_format($item->product_price) ?></h1>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection


@push('page-scripts')
<script src="{{asset('script/client/index.js')}}"></script>
@endpush
