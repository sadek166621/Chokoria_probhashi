@extends('frontend.master')

@section('content')

<!--Page Header Start-->
 <section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/cps/cps-4.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Member Login</li>
            </ul>
            <h2>Member Login</h2>
        </div>
    </div>
</section>
<!--Page Header End-->


<!--Start Checkout Page-->
{{-- <section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="billing_details">
                    <form action="{{ route('member-submit') }}" method="Post">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>

    </div>
</section> --}}

<!--End Checkout Page-->

<!--Become Volunteer Page Start-->
<section class="become-volunteer-page">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Login yourself with us</span>

        </div>
        <div class="row d-flex align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="become-volunteer-page__left">
                    <div class="become-volunteer-page__img">
                        <img class="w-75" src="assets/images/resources/logo.png" alt="logo">
                    </div>

                    <div class="become-volunteer__call">
                        <div class="become-volunteer__call-icon">
                            <span class="icon-chat"></span>
                        </div>
                            @php
                            $setting = getSetting();
                            @endphp
                        <div class="become-volunteer__call-content">
                            <span>Call Anytime</span>
                            <p><a href="tel:01700-000000">{{ $setting->site_contact_no }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div style="padding: 60px 60px 60px;">
                        <form action="{{ route('member-submit') }}" class="become-volunteer-page__form" method="Post">
                            @csrf
                        <div class="row">
                            <div class="col-xl-12 mb-4">
                                <h2 class="gallery-one__top-title mb-2">Sign In</h2>
                                <p class="text-primary"><a class="text-danger fw-medium"
                                        href="{{ route('become-a-member') }}">Create an Account</a></p>
                            </div>
                            <div class="col-xl-12">
                                <div class="become-volunteer-page__input">
                                    <label for="inputEmail" class="form-label text-color fw-medium">Type Your Email or Phone
                                        Number <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" id="inputEmail"
                                        placeholder="Type Your Email or Phone Number" required>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="become-volunteer-page__input">
                                    <label for="inputPassword" class="form-label text-color fw-medium">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="********"
                                    required>
                                </div>
                            </div>
                            {{-- <div class="col-xl-12 d-none">
                                <a class="text-danger fw-semibold" href="">Forgot Password?</a>
                            </div> --}}

                            <div class="col-xl-12">
                                <div class="become-volunteer-page__input">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                        <label class="form-check-label" for="gridCheck">
                                            Confirm
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12">
                                <div class="become-volunteer-page__btn-box">
                                    <button type="submit" class="thm-btn become-volunteer-page__btn">Sign In</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Become Volunteer Page End-->
@endsection
@push('js')

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endpush


