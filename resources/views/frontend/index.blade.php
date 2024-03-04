@extends('frontend.master')
@section('content')
<section class="main-slider clearfix">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
        "effect": "fade",
        "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
        },
        "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
        "delay": 5000
        }}'>
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="image-layer"
                    style="background-image: url({{asset('assets-frontend')}}/assets/images/cps/banner-1.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1"
                    style="background-image: url({{asset('assets-frontend')}}/assets/images/shapes/main-slider-shape-1.jpg);"></div>
                <div class="main-slider-shape-2 float-bob-x">
                    <img src="{{asset('assets-frontend')}}/assets/images/shapes/main-slider-shape-2.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">Coordinated. Connected. Committed.</p>
                                <h2 class="main-slider__title">Chakaria Probashi Society</h2>
                                <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn"> Discover more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer"
                    style="background-image: url({{asset('assets-frontend')}}/assets/images/cps/banner-2.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1"
                    style="background-image: url({{asset('assets-frontend')}}/assets/images/shapes/main-slider-shape-1.jpg);"></div>
                <div class="main-slider-shape-2 float-bob-x">
                    <img src="{{asset('assets-frontend')}}/assets/images/shapes/main-slider-shape-2.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">Coordinated. Connected. Committed.</p>
                                <h2 class="main-slider__title">Chakaria Probashi Society</h2>
                                <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn"> Discover more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- If we need navigation buttons -->
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-left-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow"></i>
            </div>
        </div>

    </div>
</section>
<!--Main Slider End-->

<!--About One Start-->
<section class="about-one" id="about">
    <div class="about-one__shape-box-1">
        <div class="about-one__shape-1"
            style="background-image: url({{asset('assets-frontend')}}/assets/images/shapes/about-one-shape-1.png);"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__left">
                    <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <div class="about-one__img">
                            <img src="{{asset('assets-frontend')}}/assets/images/cps/cps-about1.jpg" alt="">
                        </div>
                        <div class="about-one__img-border"></div>
                        <div class="about-one__shape-2 zoom-fade">
                            <img  src="{{asset('assets-frontend')}}/assets/images/shapes/about-one-shape-2.png" alt="">
                        </div>
                        <div class="about-one__shape-3 float-bob-y">
                            <img src="{{asset('assets-frontend')}}/assets/images/shapes/about-one-shape-3.png" alt="">
                        </div>
                        <div class="about-one__shape-4 zoominout">
                            <img src="{{asset('assets-frontend')}}/assets/images/shapes/about-one-shape-4.png" alt="">
                        </div>
                    </div>
                    <div class="mt-3 ms-5">
                    <h2>মাওলানা মোহাম্মদ ঈসা</h2>
                    <p>ভারপ্রাপ্ত চেয়ারম্যান</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 d-flex justify-content-center align-items-center">
                <div class="about-one__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Welcome to Chakaria Probashi Society</span>
                        <h2 class="section-title__title">Helping each other can make world better</h2>
                    </div>
                    <p class="about-one__text">We help companies develop powerful corporate social
                        responsibility, grantmaking, and employee engagement strategies. Our impact is about
                        more than moving money to where it’s needed most it’s also about helping nonprofits
                        access information and ideas that will help them listen, learn, and grow. </p>

                    <a href="#" class="thm-btn about-one__btn mt-5">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About One End-->




<!--Events One Start-->
<section class="events-one" id="events">
    <div class="events-one-shape-1" style="background-image: url({{asset('assets-frontend')}}/assets/images/shapes/events-one-shape-1.png)">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="events-one__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Upcoming events</span>
                        <h2 class="section-title__title">Join our upcoming events</h2>
                    </div>
                    <p class="events-one__text-1">There are many variations of passages of lorem ipsum available
                        but the majority have suffered.</p>
                    <a href="#" class="thm-btn events-one__btn">Discover More</a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="events-one__right">
                    <div class="events-one__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                        "loop": true,
                        "autoplay": true,
                        "margin": 20,
                        "nav": true,
                        "dots": false,
                        "smartSpeed": 500,
                        "autoplayTimeout": 10000,
                        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                        "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 2
                            },
                            "992": {
                                "items": 2
                            },
                            "1200": {
                                "items": 3
                            }
                        }
                    }'>
                        <div class="item">
                            <!--Events One Single Start-->
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{asset('assets-frontend')}}/assets/images/events/event-1.jpg" alt="">
                                    <div class="events-one__date">
                                        <p>15, 16, 17 Dec 2023</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                            <li><i class="fas fa-clock"></i>09:00am</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Dubai</li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="#">Bangladesh Book Fair Dubai,2023</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--Events One Single End-->
                        </div>
                        <div class="item">
                            <!--Events One Single Start-->
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{asset('assets-frontend')}}/assets/images/events/event-2.jpg" alt="">
                                    <div class="events-one__date">
                                        <p>2 Dec 2023</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                            <li><i class="fas fa-clock"></i>09:00am</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Dubai</li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="#">United Arab Emirates National Day</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--Events One Single End-->
                        </div>
                        <div class="item">
                            <!--Events One Single Start-->
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{asset('assets-frontend')}}/assets/images/events/event-3.jpg" alt="">
                                    <div class="events-one__date">
                                        <p>25 Nov 2023</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                            <li><i class="fas fa-clock"></i>9:00am</li>
                                            <li><i class="fas fa-map-marker-alt"></i>Chakaria</li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="#">Meet Up</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!--Events One Single End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Events One End-->

 <!-- Notice Start-->
 <section class="testimonial-one" id="notice">
    <div class="testimonial-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url({{asset('assets-frontend')}}/assets/images/backgrounds/testimonial-one-bg.jpg);"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="testimonial-one__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Latest Notices</span>
                        <h2 class="section-title__title">Chakaria Probashi Society</h2>
                    </div>
                    <p class="testimonial-one__text-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam earum tenetur at incidunt. Nulla dolore vel eius? Hic maiores fuga sed quos fugiat ex a deserunt, esse veniam? Fugiat, sint!</p>
                    <a href="#" class="thm-btn testimonial-one__btn">all Notice</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="testimonial-one__right">
                    <div class="testimonial-one__carousel owl-carousel owl-theme thm-owl__carousel"
                        data-owl-options='{
                                "loop": true,
                                "autoplay": true,
                                "margin": 50,
                                "nav": true,
                                "dots": false,
                                "smartSpeed": 500,
                                "autoplayTimeout": 10000,
                                "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                                "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 1
                                    },
                                    "992": {
                                        "items": 1
                                    },
                                    "1200": {
                                        "items": 1
                                    }
                                }
                            }'>
                        <div class="item">
                            <!--Testimonial One Single Start-->
                            <div class="testimonial-one__single">
                                <div class="testimonial-one__client-img">
                                    <img src="{{asset('assets-frontend')}}/assets/images/cps/cps-about.jpg" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <h3 class="testimonial-one__client-name">মাওলানা মোহাম্মদ ঈসা</h3>
                                    <p class="testimonial-one__client-sub-title">ভারপ্রাপ্ত চেয়ারম্যান</p>
                                </div>
                                <div class="testimonial-one__quote">
                                    <span class="icon-double-quotes"></span>
                                </div>
                                <p class="testimonial-one__text-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, assumenda adipisci? Facere quisquam modi porro voluptatum a, laudantium, quo fuga corrupti necessitatibus minus iusto officia corporis ad eius illo amet.</p>
                            </div>
                            <!--Testimonial One Single End-->
                        </div>
                        <div class="item">
                            <!--Testimonial One Single Start-->
                            <div class="testimonial-one__single">
                                <div class="testimonial-one__client-img">
                                    <img src="{{asset('assets-frontend')}}/assets/images/cps/cps-about.jpg" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <h3 class="testimonial-one__client-name">মাওলানা মোহাম্মদ ঈসা</h3>
                                    <p class="testimonial-one__client-sub-title">ভারপ্রাপ্ত চেয়ারম্যান</p>
                                </div>
                                <div class="testimonial-one__quote">
                                    <span class="icon-double-quotes"></span>
                                </div>
                                <p class="testimonial-one__text-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, assumenda adipisci? Facere quisquam modi porro voluptatum a, laudantium, quo fuga corrupti necessitatibus minus iusto officia corporis ad eius illo amet.</p>
                            </div>
                            <!--Testimonial One Single End-->
                        </div>
                        <div class="item">
                            <!--Testimonial One Single Start-->
                            <div class="testimonial-one__single">
                                <div class="testimonial-one__client-img">
                                    <img src="{{asset('assets-frontend')}}/assets/images/cps/cps-about.jpg" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <h3 class="testimonial-one__client-name">মাওলানা মোহাম্মদ ঈসা</h3>
                                    <p class="testimonial-one__client-sub-title">ভারপ্রাপ্ত চেয়ারম্যান</p>
                                </div>
                                <div class="testimonial-one__quote">
                                    <span class="icon-double-quotes"></span>
                                </div>
                                <p class="testimonial-one__text-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, assumenda adipisci? Facere quisquam modi porro voluptatum a, laudantium, quo fuga corrupti necessitatibus minus iusto officia corporis ad eius illo amet.</p>
                            </div>
                            <!--Testimonial One Single End-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Notice End-->

<!--Feature One Start-->
<section class="feature-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6  wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                <div class="feature-one__single">
                    <div class="feature-one__single-bg"
                        style="background-image: url({{asset('assets-frontend')}}/assets/images/shapes/feature-one-shape-1.png);"></div>
                    <div class="feature-one__top">
                        <div class="feature-one__top-inner">
                            <div class="feature-one__top-icon">
                                <span class="icon-help"></span>
                            </div>
                            <div class="feature-one__top-title-box">
                                <h3 class="feature-one__top-title"><a href="become-member.html">Join us &
                                        become <br> a
                                        member</a></h3>
                            </div>
                        </div>
                    </div>
                    <p class="feature-one__text">Mauris feugiat at orci ac congue. mauris ut <br> lacus quis
                        proin
                        diam.</p>
                    <ul class="list-unstyled feature-one__point">
                        <li>
                            <div class="icon">
                                <span class="fa fa-check"></span>
                            </div>
                            <div class="text">
                                <p>Sed et nulla a nunc finibus eleifend.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="fa fa-check"></span>
                            </div>
                            <div class="text">
                                <p>Mauris nulla nisl, pellentesque vetae.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="fa fa-check"></span>
                            </div>
                            <div class="text">
                                <p>Proin quis aliquam nisi.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="become-member.html" class="thm-btn feature-one__btn">View details</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6  wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                <div class="feature-one__single feature-one__single--two">
                    <div class="feature-one__single-bg"
                        style="background-image: url({{asset('assets-frontend')}}/assets/images/shapes/feature-one-shape-1.png);"></div>
                    <div class="feature-one__top">
                        <div class="feature-one__top-inner">
                            <div class="feature-one__top-icon feature-one__top-icon--two">
                                <span class="icon-gift-box"></span>
                            </div>
                            <div class="feature-one__top-title-box">
                                <h3 class="feature-one__top-title"><a href="#">Send
                                        a gift for <br>
                                        Organization</a></h3>
                            </div>
                        </div>
                    </div>
                    <p class="feature-one__text">Mauris feugiat at orci ac congue. mauris ut <br> lacus quis
                        proin
                        diam.</p>
                    <ul class="list-unstyled feature-one__point">
                        <li>
                            <div class="icon">
                                <span class="fa fa-check"></span>
                            </div>
                            <div class="text">
                                <p>Sed et nulla a nunc finibus eleifend.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="fa fa-check"></span>
                            </div>
                            <div class="text">
                                <p>Mauris nulla nisl, pellentesque vetae.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="fa fa-check"></span>
                            </div>
                            <div class="text">
                                <p>Proin quis aliquam nisi.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="thm-btn feature-one__btn">View details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Feature One End-->


<!--Gallery One Start-->
<section class="gallery-one" id="gallary">
    <div class="gallery-one__top">
        <h3 class="gallery-one__top-title">Our photo gallery</h3>
    </div>
    <div class="gallery-one__bottom">
        <div class="gallery-one__container">
            <ul class="list-unstyled gallery-one__list">
                <li class="gallery-one__single wow fadeInUp" data-wow-delay="100ms">
                    <div class="gallery-one__img">
                        <img src="{{asset('assets-frontend')}}/assets/images/gallery/gallary (1).jpg" alt="">
                        <a href="{{asset('assets-frontend')}}/assets/images/gallery/gallary (1).jpg" class="img-popup"></a>
                    </div>
                </li>
                <li class="gallery-one__single wow fadeInUp" data-wow-delay="200ms">
                    <div class="gallery-one__img">
                        <img src="{{asset('assets-frontend')}}/assets/images/gallery/gallary (2).jpg" alt="">
                        <a href="{{asset('assets-frontend')}}/assets/images/gallery/gallary (2).jpg" class="img-popup"></a>
                    </div>
                </li>
                <li class="gallery-one__single wow fadeInUp" data-wow-delay="300ms">
                    <div class="gallery-one__img">
                        <img src="{{asset('assets-frontend')}}/assets/images/gallery/gallary (3).jpg" alt="">
                        <a href="{{asset('assets-frontend')}}/assets/images/gallery/gallary (3).jpg" class="img-popup"></a>
                    </div>
                </li>
                <li class="gallery-one__single wow fadeInUp" data-wow-delay="400ms">
                    <div class="gallery-one__img">
                        <img src="{{asset('assets-frontend')}}/assets/images/gallery/gallary (6).jpg" alt="">
                        <a href="{{asset('assets-frontend')}}/assets/images/gallery/gallary (6).jpg" class="img-popup"></a>
                    </div>
                </li>
                <li class="gallery-one__single wow fadeInUp" data-wow-delay="500ms">
                    <div class="gallery-one__img">
                        <img src="{{asset('assets-frontend')}}/assets/images/gallery/gallary (5).jpg" alt="">
                        <a href="{{asset('assets-frontend')}}/assets/images/gallery/gallary (5).jpg" class="img-popup"></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="text-center">
        <a href="gallery.html" class="thm-btn about-one__btn  mt-5">View More</a>
    </div>
</section>
@endsection
