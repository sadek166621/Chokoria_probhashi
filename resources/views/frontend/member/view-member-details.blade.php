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
                <li class="active">Member Information</li>
            </ul>
            <h2>Member Information</h2>
        </div>
    </div>
</section>
<!--Page Header End-->


<!--Start Checkout Page-->
<section class="donate-now">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="donate-now__right">
                    <div class="causes-one__single">
                        <div class="causes-one__img">
                            <img src="{{ asset('assets') }}/images/uploads/members/{{ $member->image }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="donate-now__left">
                    <div class="donate-now__personal-info-box">
                        <h3 class="donate-now__title">Personal info</h3>
                        <div class="row donate-now__personal-info">
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Name:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Father Name:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->father_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Mother Name:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->mother_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Date of Birth </p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->date_of_birth }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Gender:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->gender }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Blood Group:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->blood_group }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Religion:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->religion }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Nationality:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->country_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Personal Phone No:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Email:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Permanent Address:</p>
                                </div>
                                <div class="col-xl-6 ">
                                    <p>{{ $member->address }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End Checkout Page-->
@endsection
