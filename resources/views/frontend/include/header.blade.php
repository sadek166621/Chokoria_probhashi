<header class="main-header">
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        <a href="{{ route('home') }}"><img class="logo" src="{{asset('assets-frontend')}}/assets/images/resources/logo.png"
                                alt=""></a>
                    </div>
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__right-top">
                        <div class="main-menu__right-top-right">
                            <div class="main-menu__right-top-address">
                                <ul class="list-unstyled main-menu__right-top-address-list">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-phone-call"></span>
                                        </div>
                                        <div class="content">
                                            <p>Helpline</p>
                                            <h5><a href="#">+971554681115</a></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-message"></span>
                                        </div>
                                        <div class="content">
                                            <p>Send email</p>
                                            <h5><a href="#">chakariaprobashisociety@gmail.com</a>
                                            </h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-location"></span>
                                        </div>
                                        <div class="content" style="color: black;">
                                            <p>চকরিয়া সিটি সেন্টার,</p>
                                            <h5> কক্সবাজার ।
                                            </h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="main-menu__right-top-social">
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu__right-bottom">
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class=" current megamenu">
                                    <a href="{{ route('home') }}">Home </a>
                                </li>
                                <li>
                                    <a href="#about">About</a>
                                </li>
                                <li>
                                    <a href="#events">Events</a>
                                </li>
                                <li>
                                    <a href="#notice">Notice</a>
                                </li>
                                <li>
                                    <a href="#gallary">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                                <li>
                                    <a href="#">Search</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item nav-link fw-bolder text-color"
                                                href="{{ route('member-list') }}">Member</a>
                                        </li>
                                        <li><a class="dropdown-item nav-link fw-bolder text-color" href="{{ route('executive-dashboard') }}">Executive Councilor</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu__main-menu-content-box">
                            <div class="main-menu__search-cat-btn-box">
                                <div class="main-menu__btn-box">
                                    <a href="{{ route('become-a-member') }}" class="main-menu__btn fw-bolder"> <span
                                            class="fa fa-heart"></span>Join Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
