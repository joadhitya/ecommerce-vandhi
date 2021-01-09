@extends('client.layouts.master')

@section('content')

<header id="landioCarousel" data-aos="zoom-out" data-aos-duration="2000"
    class="carousel carousel-header slide bg-inverse" data-ride="carousel" data-interval="0" role="banner">
    <ol class="carousel-indicators">
        <li data-target="#landioCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div id="" class="carousel-inner" role="listbox">
        {{-- url({{asset('assets/client/img/bg.png')}}) --}}
        <div class="carousel-item active" style="background: #70a3e9 ;background-size:cover">
            <div class="carousel-caption">
                <h1 class="display-3">Vandhi E-Commerce</h1>
                <h2 class="m-b-3">'I still have my body on the world – I just wear better shirt. '</h2>
                <a class="btn btn-secondary-outline m-b-1" href="./shop.php" role="button">Shop
                    Now</a>

            </div>
        </div>
    </div>
</header>
<section class="section-pricing bg-faded text-xs-center" style="padding-top:50px">
    <div class="container">
        <h3>Recomended Product</h3>
        <div class="row p-y-2">

            @foreach ($best_products as $best_product)

            <div class="col-md-4 p-t-md wp wp-5" style="margin-top:20px">
                <div class="bd-grid">
                    <article class="card_custom">
                        <div class="card__img" style="padding-top:1rem">
                            {{-- product.php?id=<?= $best_product->id ?> --}}
                            <a href="">
                                <img style="width:120%" src="/storage/<?=$best_product->product_image?>" alt="">

                            </a>
                        </div>
                        <div class="card__name">
                            <p style="text-transform:uppercase"><?= $best_product->product_name ?></p>
                        </div>
                        <div class="card__precis">
                            <a href="" class="card__icon">
                                <i class="fas fa-heart"></i>
                            </a>
                            <div>
                                <a href="#" class="card__icon" style="color:#ffdc2e">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </a>
                                <span class="card__preci card__preci--now"
                                    style="font-size:14px"><?= $best_product->category_name ?> -
                                    <?= $best_product->subcategory_name ?></span>
                                <span class="card__preci card__preci--now">Rp.
                                    <?= number_format($best_product->product_price) ?></span>
                            </div>
                            <a href="javascript:void(0)" onclick="manage_cart('<?= $best_product->id ?>','add')"
                                class="card__icon">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="features-extended section" style="padding-top:150px">

    <h1 style="text-align:center;font-weight:bold;z-index:100;margin-top:-50px" data-aos="zoom-in">Best
        Product</h1>
    <div class="features-extended-inner section-inner">
        <div class="features-extended-wrap">
            <div class="container" stlye="width:1000px;padding:0px;">
                <div class="feature-extended">
                    <div class="feature-extended-image" data-aos="fade-right" data-aos-duration="1000">
                        <div class="mockup-bg">
                            <img src="{{asset('assets/client/img/iphone-feature-bg-01.svg')}}" alt="trasher">
                        </div>
                        <img style="margin-left:-50px;margin-top:20px" class="device-mockup is-revealing"
                            src="{{asset('assets/client/media/best.jpg')}}" alt="trasher">
                    </div>
                    <div class="feature-extended-body is-revealing" data-aos="flip-right" data-aos-duration="1500">
                        <h3 class="mt-0 mb-16">H&M Best Shirt Tuday</h3>
                        <p class="m-0">Our Best product for our beloved customers.
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <h4
                                    style="text-decoration:line-through;text-decoration-color:#fb8181; text-decoration-thickness: 10px;">
                                    Rp. 750.000,00</h4>
                                <h2><b>Rp. 550.000,00</b> </h2>
                            </div>
                            <div class="col-md-6">
                                <button type="button" style="width:200px" class="btn btn-primary-outline btn-block"><i
                                        class="fas fa-shopping-basket"></i> Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-news" style="margin-top:60px">
    <div class="container">
        <h3 style="text-align:center;">Our Products</h3>&nbsp;
        <hr>
        <div class="site-slider-two">
            <div class="row slider-two text-center">
                @foreach ($products as $product)
                <div class="col-md-3 products">
                    <img src="/storage/<?=$product->product_image?>" alt="">
                    <span class="text-center" style="font-weight:bold"><?= $product->product_name ?></span><br>
                    <a href="#" class="card__icon"
                        style="color:#ffdc2e<?php if($product->product_recomended == '0' || $product->product_recomended == ''){ echo ' ;display:none'; } ?>">
                        <i class="fas fa-star"></i>
                    </a>
                    <span class="text-center">Rp. <?= number_format($product->product_price)?></span>
                    <a href="javascript:void(0)" onclick="manage_cart('<?= $product->id ?>','add')" class="card__icon">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- 
<section data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1500"
    class="section-testimonials text-xs-center bg-inverse"
    style="background: rgb(185,183,228);
background: radial-gradient(circle, rgba(185,183,228,1) 0%, rgba(207,207,242,1) 51%, rgba(218,221,222,1) 100%);padding-top:5px;background: url({{asset('assets/client/img/bg_bw.jpg')}});background-size:cover">
<div class="container">
    <h3 class="" style="text-align:center;margin-top:20px;margin-bottom:15px">Testimonials</h3>
    <div id="carousel-testimonials" class="carousel slide" data-ride="carousel" data-interval="0">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <blockquote class="blockquote">
                    <img src="{{asset('assets/client/media/testimonials/1_test.png')}}" height="300" width="300"
                        alt="Avatar" class="img-circle">
                    <p class="h3">Untuk pertama kalinya dalam sejarah kita merasakan keadaan yang sama dalam
                        menjalani hidup, namun menjalani kesehariannya dengan cara yang berbeda dari sebelumnya.</p>
                    <footer>Gabriel Edwin</footer>
                </blockquote>
            </div>
            <div class="carousel-item">
                <blockquote class="blockquote">
                    <img src="{{asset('assets/client/media/testimonials/2_test.png')}}" height="300" width="300"
                        alt="Avatar" class="img-circle">
                    <p class="h3">Untuk pertama kalinya dalam sejarah kita merasakan keadaan yang sama dalam
                        menjalani hidup, namun menjalani kesehariannya dengan cara yang berbeda dari sebelumnya.</p>
                    <footer>Gading Condro</footer>
                </blockquote>
            </div>
            <div class="carousel-item">
                <blockquote class="blockquote">
                    <img src="{{asset('assets/client/media/testimonials/3_test.png')}}" height="300" width="300"
                        alt="Avatar" class="img-circle">
                    <p class="h3">Untuk pertama kalinya dalam sejarah kita merasakan keadaan yang sama dalam
                        menjalani hidup, namun menjalani kesehariannya dengan cara yang berbeda dari sebelumnya.</p>
                    <footer>Ucok Alias Abah Lala</footer>
                </blockquote>
            </div>
            <div class="carousel-item">
                <blockquote class="blockquote">
                    <img src="{{asset('assets/client/media/testimonials/4_test.png')}}" height="300" width="300"
                        alt="Avatar" class="img-circle">
                    <p class="h3">Untuk pertama kalinya dalam sejarah kita merasakan keadaan yang sama dalam
                        menjalani hidup, namun menjalani kesehariannya dengan cara yang berbeda dari sebelumnya.</p>
                    <footer>Gading Condro Prakoso S.KOM!!!</footer>
                </blockquote>
            </div>
        </div>
        <ol class="carousel-indicators" style="margin-top:-50px">
            <li class="active"><img src="{{asset('assets/client/media/testimonials/1_test.png')}}"
                    alt="Navigation avatar" data-target="#carousel-testimonials" data-slide-to="0"
                    class="img-fluid img-circle"></li>
            <li><img src="{{asset('assets/client/media/testimonials/2_test.png')}}" alt="Navigation avatar"
                    data-target="#carousel-testimonials" data-slide-to="1" class="img-fluid img-circle"></li>
            <li><img src="{{asset('assets/client/media/testimonials/3_test.png')}}" alt="Navigation avatar"
                    data-target="#carousel-testimonials" data-slide-to="2" class="img-fluid img-circle"></li>
            <li><img src="{{asset('assets/client/media/testimonials/4_test.png')}}" alt="Navigation avatar"
                    data-target="#carousel-testimonials" data-slide-to="3" class="img-fluid img-circle"></li>
        </ol>
    </div>
</div>
</section> --}}


@endsection


@push('page-scripts')
<script src="{{asset('script/client/index.js')}}"></script>
<script>
    function logout() {
        $.ajax({
            url: '/client/auth/logout',
            type: 'get',
            success: function (result) {
                if(result === 'logout'){
                    window.location.href = 'vandhi';
                }
            },
            errors: function(err){
                console.log(err)
            }
        })
    }

</script>
@endpush
