


  <footer class="section-footer bg-inverse" role="contentinfo" style="background-color:#181818">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <div class="media">
                    <div class="media-left">
                        <span class="media-object icon-logo display-1"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <ul class="nav nav-inline">
                    <li class="nav-item"><a class="nav-link" href="">Best Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Recomended</a></li>
                    <li class="nav-item"><a class="nav-link" href="">About Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
<script src="{{asset('assets/client/js/landio.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{asset('assets/client/js/main.js')}}"></script>
<script>
    AOS.init();
    var owl = $('#carousel_bg');
    owl.owlCarousel({
        items:3,
        loop:true,
        autoplay:true,
        autoplayTimeout:1000
    });
    $(document).ready(function () {
        setTimeout(function () {
            $(".loader_bg").fadeToggle()
        }, 500)
        
        $(".slider-two").not(".slick-intialized").slick({
                autoplay: true,
                autoplaySpeed: 1500,
                dots: true,
                prevArrow: ".site-slider-two .prev",
                nextArrow: ".site-slider-two .next",
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    }
                ]
            });

    });
</script>
@stack('page-scripts')
</body>

</html>