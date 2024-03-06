 <!--Site Footer Start-->
 <footer class="site-footer mt-5">
    <div class="site-footer-bg" style="background-image: url({{asset('assets-frontend')}}/assets/images/backgrounds/site-footer-bg.jpg);">
    </div>
    <div class="site-footer__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__about-logo">
                            <a href="{{ route('home') }}"><img class="logo" src="{{asset('assets-frontend')}}/assets/images/resources/logo.png"
                                    alt=""></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text">Chokoria Probashi Society <br>
                                অরাজনৈতিক ও প্রবাসী সেবামূলক সংগঠন
                                </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__links clearfix">
                        <h3 class="footer-widget__title">Links</h3>
                        <ul class="footer-widget__links-list list-unstyled clearfix">
                            <li><a href="#">About us</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="#">Notice</a></li>
                            <li><a href="#">Events</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__non-profit clearfix">
                        <h3 class="footer-widget__title">Resources</h3>
                        <ul class="footer-widget__non-profit-list list-unstyled clearfix">
                            <li><a href="{{ route('become-a-member') }}">Member Registration</a></li>
                            @auth
                            <li><a href="{{ route('member-dashboard') }}">Dashboard</a></li>
                                @else
                                <li><a href="{{ route('member-login') }}">Member LogIn</a></li>
                            @endauth

                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__contact">
                        <h3 class="footer-widget__title">Contact</h3>
                        <p class="footer-widget__contact-text">চকরিয়া সিটি সেন্টার, ১৫ নং (৩য় তলা),<br> ৮ নং ওয়ার্ড, চকরিয়া পৌরসভা, চকরিয়া, কক্সবাজার ।

                        </p>
                        <ul class="list-unstyled footer-widget__contact-list">
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="text">
                                    <p><a href="#">chakariaprobashisociety@gmail.com</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="text">
                                    <p><a href="#">+971554681115</a></p>
                                </div>
                            </li>
                        </ul>
                        <div class="site-footer__social">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text"><i class="fa-regular fa-copyright"></i> Chakaria
                            Probashi Society | All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->
