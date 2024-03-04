<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Home </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets-frontend')}}/assets/images/resources/logo.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets-frontend')}}/assets/images/resources/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets-frontend')}}/assets/images/resources/logo.png" />
    <link rel="manifest" href="{{asset('assets-frontend')}}/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="CPS" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bangla Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/oxpins-icons/style.css">
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/vendors/timepicker/timePicker.css" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <!-- template styles -->
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/css/oxpins.css" />
    <link rel="stylesheet" href="{{asset('assets-frontend')}}/assets/css/oxpins-responsive.css" />
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->


    <div class="page-wrapper">
        @include('frontend.include.header')

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Main Slider Start-->

        @yield('content')

       @include('frontend.include.footer')


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo"><img class="logo-mobile" src="{{asset('assets-frontend')}}/assets/images/resources/logo.png"
                        width="143" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="#">admincps@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="#">+88 01700-000000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>


    <script src="{{asset('assets-frontend')}}/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/odometer/odometer.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/swiper/swiper.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/wow/wow.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/isotope/isotope.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/countdown/countdown.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/vegas/vegas.min.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/timepicker/timePicker.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/circleType/jquery.circleType.js"></script>
    <script src="{{asset('assets-frontend')}}/assets/vendors/circleType/jquery.lettering.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <!-- template js -->
    <script src="{{asset('assets-frontend')}}/assets/js/oxpins.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
    @stack('js')
</body>

</html>
