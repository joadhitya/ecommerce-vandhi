<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Vandhi E-Commerce</title>
  <link rel="stylesheet" href="{{asset('assets/client/css/landio.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/custom.css')}}">  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/9a2e3a210e.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300;1,400&display=swap"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
  <script src="https://unpkg.com/scrollreveal@4.0.5/dist/scrollreveal.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  {{-- CUSTOM CSS --}}
  <link rel="stylesheet" href="{{asset('assets/client/css/custom/loader.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/custom/best_product.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/custom/slick.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/custom/card_product.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/custom/card_checkout.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/custom/card_shop.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/custom/card_category.css')}}">

</head>

<?php
  // session_start();
?>

<body>
  <input type="hidden" id="uri" value="<?= ucfirst(basename($_SERVER['PHP_SELF'], '.php'))?>">
  <div class="loader_bg">
    <div class="loader"></div>
  </div>
  
  <nav class="navbar navbar-dark bg-inverse bg-inverse-custom navbar-fixed-top" >
    <div class="container">
      <a class="navbar-brand" href="/vandhi">
        <span class="" style="font-size:30px;"><img src="{{asset('assets/admin/images/icon/Vandhi.png')}}" style="position:absolute;width:10%" alt=""></span>
      </a>
      <a class="navbar-toggler hidden-md-up pull-xs-right mobile-view" data-toggle="collapse" href="#collapsingNavbar"
        aria-expanded="false" aria-controls="collapsingNavbar">
        &#9776;
      </a>
      <a class="navbar-toggler navbar-toggler-custom hidden-md-up pull-xs-right mobile-view" data-toggle="collapse"
        href="#collapsingMobileUser" aria-expanded="false" aria-controls="collapsingMobileUser">
        <span class="icon-user"></span>
      </a>
      <div id="collapsingNavbar" class="collapse navbar-toggleable-custom" role="tabpanel"
        aria-labelledby="collapsingNavbar">
        <ul class="nav navbar-nav pull-xs-right">
          <li class="nav-item nav-item-toggable">
            <a class="nav-link" href="shop/category?id=1">Baju</a>
          </li>
          <li class="nav-item nav-item-toggable">
            <a class="nav-link" href="shop/category?id=2">Celana</a>
          </li>
          <li class="nav-item nav-item-toggable">
            <a class="nav-link" href="shop/category?id=3">Sandal</a>
          </li>
          <li class="nav-item nav-item-toggable">
            <a class="nav-link" href="shop">Shop Now</a>
          </li>
          <li class="nav-item nav-item-toggable hidden-md-up">
            <form class="navbar-form" action="search.php" method="get">
              <input id="search_igs" class="search_igs form-control navbar-search-input" type="text"
                placeholder="Type your search &amp; hit Enter&hellip;">
                <button type="submit"></button>
            </form>
          </li>
          <li class="navbar-divider hidden-sm-down"></li>
          <li class="nav-item dropdown nav-dropdown-search hidden-sm-down">
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-search" aria-labelledby="dropdownMenu1">
              <form class="navbar-form">
                <input class="form-control navbar-search-input" type="text"
                  placeholder="Type your search &amp; hit Enter&hellip;">
              </form>
            </div>
          </li>
          @if (isset($_SESSION['USER_LOGIN']))

          <?php
            $src = "../assets/client/image/man.png";
          ?>
              
          <li id="user" class="nav-item dropdown hidden-sm-down textselect-off">
            <a class="nav-link dropdown-toggle nav-dropdown-user" id="dropdownMenu2" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img src="{{ $src }}" height="40" width="40" alt="Avatar" class="img-circle"> <span
                class="icon-caret-down"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-user dropdown-menu-animated"
              aria-labelledby="dropdownMenu2">
              <div class="media">
                <div class="media-left">
                  <img src="<?=$src?>" height="60" width="60" alt="Avatar" class="img-circle">
                </div>
                <div class="media-body media-middle">
                  <h5 class="media-heading"><?=$_SESSION['USER_NAME']?></h5>
                  <h6><?=$_SESSION['EMAIL']?></h6>
                </div>
              </div>
              <a href="/order" class="dropdown-item text-uppercase">Order</a>
              <a href="/profile" class="dropdown-item text-uppercase">Profile</a>
              <span  onclick="logout()" style="cursor:pointer" class="dropdown-item text-uppercase text-muted">Log out</span>
              <a href="#" class="btn-circle has-gradient pull-xs-right">
                <span class="sr-only">Edit</span>
                <span class="icon-edit"></span>
              </a>
            </div>
          </li>

          @else
          <li class="nav-item nav-item-toggable">
            <a class="nav-link" href="/sign-in">Sign In</a>
          </li>
          @endif
          <li class="nav-item nav-item-toggable">
            <a class="nav-link icon-custom" href="#" target="_blank"><i class="fas fa-heart"></i></a>
          </li>
          <li class="nav-item nav-item-toggable">
            <div class="shop-cart" style="position:relative">
              <a class="nav-link icon-custom" href="/cart"><i class="fas fa-shopping-basket fa-lg"></i></span>
                <?php
                  if(isset($_SESSION['cart'])){
                    $totalProduct = count($_SESSION['cart']);      
                  }
                  else{
                    $totalProduct = 0;
                  }
                ?>
                <span id="check_cart" class="count-shop"><?=$totalProduct?></a>
            </div>
          </li>

        </ul>
      </div>
      <div id="collapsingMobileUser" class="collapse navbar-toggleable-custom dropdown-menu-custom p-x-1 hidden-md-up"
        role="tabpanel" aria-labelledby="collapsingMobileUser">
        <div class="media m-t-1">
          <div class="media-left">
            {{-- <?=$src?> --}}
            <img src="" height="60" width="60" alt="Avatar" class="img-circle">
          </div>
          <div class="media-body media-middle">
            {{-- <h5 class="media-heading"><?=$row['USERNAME']?></h5>
            <h6><?=$row['EMAIL']?></h6> --}}
          </div>
        </div>
        <a href="#" class="dropdown-item text-uppercase">Profile</a>
        <a href="#" class="dropdown-item text-uppercase">Orders</a>
        <a href="#" class="dropdown-item text-uppercase text-muted">Log out</a>
        <a href="#" class="btn-circle has-gradient pull-xs-right m-b-1">
          <span class="sr-only">Edit</span>
          <span class="icon-edit"></span>
        </a>
      </div>
    </div>
  </nav>

