
@extends('frontend.master')
@section('content')
{{-- <section class="page-header">

    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">

    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Dashboard</li>
            </ul>
            <h2>Dashboard</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Page Header End-->
<section class="product">
    <!-- profile Start -->
    <div id="dashboard" class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3">
                <div class="product__sidebar">
                    <div class="shop-category product__sidebar-single">
                        <h3 class="product__sidebar-title">Options</h3>
                        <ul class="list-unstyled">
                            <li class="active"><a href="#dashboard">Dashboard</a></li>
                            <li><a href="#transaction">Transaction History</a></li>
                            <li><a href="#personalinfo">Personal Information</a></li>
                            <li><a href="#">ID Card</a></li>
                            <li><a href="#meetinglink">Meeting Link</a></li>
                            <li><a href="#">Certification</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9">
                <div class="product__items">
                    <div class="product__all">
                        <div class="row d-flex align-items-center">
                            <!--Information Start-->
                            <div class="col-xl-8 col-lg-8 col-md-6">
                                <div class="product__all-single">
                                    {{-- <h2 class="mb-3 fw-bold">{{ $member->name }}</h2> --}}
                                    {{-- <h6 class="fw-bold" style="color: #057234;">{{ $member->Council->name }}</h6>
                                    <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="float: left">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <!--Information End-->

                            <!--Image Start-->
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="product__all-single">
                                    <div class="product__all-single-inner">
                                        <div class="product__all-img" style="height: 280px; ">
                                            @if ($member->location_id==2)
                                            <img src="{{ asset('assets') }}/images/uploads/members/{{ $member->image }}" alt="">
                                            @else
                                            <img src="{{ asset('assets') }}/images/uploads/executive/{{ $member->image }}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Image End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- profile End -->

    <!-- Transaction History Start -->
    <div id="transaction" class="container mt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-3">

            </div>

            <div class="col-xl-9 col-lg-9">
                <div class="billing_details">
                    <div class="billing_title">
                        <h2>Transaction History</h2>
                    </div>

                    <div class="bd-example">
                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Fees / Donations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donation as $key=> $donation )
                                <tr>
                                    <th scope="col">{{ $key+1 }}</th>
                                    <th scope="col">{{ $donation->created_at}}</th>
                                    <th scope="col" style="text-align: center">{{ $donation->amount}}Tk</th>
                                </tr>
                                @endforeach
                                <tr>
                                    <th colspan="2" style="text-align: right;">Total=</th>
                                    <th colspan="2" style="text-align: center">{{ $amount }}Tk</th>
                                    {{-- <th scope="col">00 Tk</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Transaction History End -->

    <!-- Personal Information Start -->
    <div id="personalinfo" class="container mt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-3">

            </div>
            <div class="col-xl-9 col-lg-9">
                <div class="billing_details">
                    <div class="billing_title">
                        <h2>Personal Information</h2>
                    </div>

                    <div class="row donate-now__personal-info">
                        <div class="row">
                            <div class="col-xl-6">
                                <p>Name:</p>
                            </div>
                            <div class="col-xl-6 ">
                                <p>{{ $member->name }}</p>
                            </div>
                        </div>
                        @if ($member->father_name !=null)
                        <div class="row">
                            <div class="col-xl-6">
                                <p>Father Name:</p>
                            </div>
                            <div class="col-xl-6 ">
                                <p>{{ $member->father_name }}</p>
                            </div>
                        </div>
                        @endif
                        @if ($member->mother_name !=null)
                        <div class="row">
                            <div class="col-xl-6">
                                <p>Mother Name:</p>
                            </div>
                            <div class="col-xl-6 ">
                                <p>{{ $member->mother_name }}</p>
                            </div>
                        </div>
                        @endif
                        @if ($member->date_of_birth !=null)
                        <div class="row">
                            <div class="col-xl-6">
                                <p>Date of Birth </p>
                            </div>
                            <div class="col-xl-6 ">
                                <p>{{ $member->date_of_birth }}</p>
                            </div>
                        </div>
                        @endif
                        @if ($member->gender !=null)
                        <div class="row">
                            <div class="col-xl-6">
                                <p>Gender:</p>
                            </div>
                            <div class="col-xl-6 ">
                                <p>{{ $member->gender }}</p>
                            </div>
                        </div>
                        @endif
                        @if ($member->blood_group !=null)
                        <div class="row">
                            <div class="col-xl-6">
                                <p>Blood Group:</p>
                            </div>
                            <div class="col-xl-6 ">
                                <p>{{ $member->blood_group }}</p>
                            </div>
                        </div>
                        @endif
                        @if ($member->religion !=null)
                        <div class="row">
                            <div class="col-xl-6">
                                <p>Religion:</p>
                            </div>
                            <div class="col-xl-6 ">
                                <p>{{ $member->religion }}</p>
                            </div>
                        </div>
                        @endif
                        @if ($member->country_name !=null)
                        <div class="row">
                            <div class="col-xl-6">
                                <p>Nationality:</p>
                            </div>
                            <div class="col-xl-6 ">
                                <p>{{ $member->country_name }}</p>
                            </div>
                        </div>
                        @endif
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
    <!-- Personal Information End -->

    <!-- Meet link  Start-->
    <div id="meetinglink" class="container mt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-3">

            </div>

            <div class="col-xl-9 col-lg-9">
                <div class="billing_details">
                    <div class="billing_title">
                        <h2>Meeting Link</h2>
                    </div>

                    <div class="bd-example">
                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Meet Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $key=> $link )
                                <tr>
                                    <th scope="col">{{ $key+1 }}</th>
                                    <th scope="col">{{ $link->date }}</th>
                                    <th scope="col">{{ $link->time }}</th>
                                    <th scope="col"><a href="https://{{ $link->link }}">{{ $link->link }}</a></th>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Meet link  End-->
</section> --}}
<!--Page Header End-->
<section class="product">
    <!-- profile Start -->
    <div class="accordion" id="accordionExample">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="row">
                        <div>
                            <div class="product__sidebar">
                                <div class="shop-category product__sidebar-single">
                                    <h3 class="product__sidebar-title">Options</h3>
                                    <ul class="list-unstyled">
                                        <li id="headingOne"><a type="button" data-bs-toggle="collapse"
                                                data-bs-target="#dashboard" aria-expanded="true"
                                                aria-controls="dashboard">Dashboard</a></li>
                                        <li id="headingTwo"><a class="collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#transaction"
                                                aria-expanded="false" aria-controls="transaction">Transaction
                                                History</a></li>
                                        <li id="headingThree"><a class="collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#personalinfo"
                                                aria-expanded="false" aria-controls="personalinfo">Personal
                                                Information</a></li>

                                        <li id="headingFive"><a class="collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#meetinglink"
                                                aria-expanded="false" aria-controls="meetinglink">Meeting
                                                Link</a></li>
                                                <li id="headingFour"><a class="collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#idcard"
                                                    aria-expanded="false" aria-controls="idcard">ID
                                                    Card</a></li>
                                        <li id="headingSix"><a class="collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#certification"
                                                aria-expanded="false"
                                                aria-controls="certification">Certification</a>
                                            </li>
                                        <li id=""><a class="" type="button"
                                                data-bs-toggle="" data-bs-target=""
                                                aria-expanded="false"
                                                aria-controls=""href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
                                            </li>

                                                <li>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                             @csrf
                                                         </form>
                                                </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row" style="background-color: #f9f4e8; border-radius: 20px;">
                        <!-- Profile Start -->
                        <div id="dashboard" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="padding: 27px 15px 13px;">
                            <div class="product__items">
                                <div class="product__all">
                                    <div class="row d-flex align-items-center">
                                        <!--Information Start-->
                                        <div class="col-xl-8 col-lg-8 col-md-6">
                                            <div class="product__all-single">
                                                <h2 class="mb-3 fw-bold">{{ $member->name }}</h2>
                                                <h6 class="fw-bold" style="color: #057234;">{{ $member->Council->name }}</h6>
                                            </div>
                                        </div>
                                        <!--Information End-->

                                        <!--Image Start-->
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="product__all-single">
                                                <div class="product__all-single-inner">
                                                    <div class="product__all-img" style="height: 280px; ">
                                                        @if ($member->location_id==2)
                                                        <img src="{{ asset('assets') }}/images/uploads/members/{{ $member->image }}" alt="">
                                                        @else
                                                        <img src="{{ asset('assets') }}/images/uploads/executive/{{ $member->image }}" alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Image End-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profile End -->

                        <!-- Transaction History Start -->
                        <div id="transaction" class="accordion-collapse collapse"
                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="padding: 27px 15px 13px;">
                            <div class="billing_details">
                                <div class="billing_title">
                                    <h2>Transaction History</h2>
                                </div>

                                <div class="bd-example">
                                    <table id="" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Serial</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Fees / Donations</th>
                                                <th scope="col">Project</th>
                                                <th scope="col">Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($donation as $key=> $donation )
                                            @php
                                            if($donation->project_id != null) {
                                            $total_income = $donation->project->income;
                                            foreach ($project_donation as $key => $value)
                                            {
                                                if ($value->project_id == $donation->project_id){
                                                    $amount = $value->amount;
                                                    break;
                                                }
                                            }

                                            $donation_amount = $donation->amount;
                                            // dd($donation->amount);
                                            // $profit_percent = $amount*100/$total_income;
                                            $profit_percent = $donation->amount/$amount*100;
                                            $project_profit = $total_income - $donation->project->cost;
                                            $profit = ($profit_percent*$project_profit)/100;
                                            }
                                            @endphp
                                            <tr>
                                                <th scope="col">{{ $key+1 }}</th>
                                                <th scope="col">{{ $donation->created_at}}</th>
                                                <th scope="col" style="text-align: left">{{ $donation->amount}}Tk

                                                        @if ($donation->type==2)
                                                        (Donation)
                                                        @else
                                                        (Fee)
                                                        @endif
                                                </th>
                                                <th>@if ($donation->project_id != null)
                                                    {{ $donation->project->title }}
                                                    @endif
                                                </th>
                                                @if($donation->project_id != null)
                                                @if ($donation->project->status == 2)
                                                <th>{{ number_format($profit, 2)}}Tk ({{number_format($profit_percent,2) }}%)</th>
                                                @endif
                                                @endif
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th colspan="2" style="text-align: right;">Total=</th>
                                                <th colspan="2" style="text-align: left">{{ $totalamounts }}Tk</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Transaction History End -->

                        <!-- Personal Information Start -->
                        <div id="personalinfo" class="accordion-collapse collapse"
                            aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="padding: 27px 15px 13px;">


                            <div class="billing_details">
                                <div class="billing_title">
                                    <h2>Personal Information</h2>
                                </div>

                                <div class="row donate-now__personal-info">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <p>Name:</p>
                                        </div>
                                        <div class="col-xl-6 ">
                                            <p>{{ $member->name }}</p>
                                        </div>
                                    </div>
                                    @if ($member->father_name !=null)
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <p>Father Name:</p>
                                        </div>
                                        <div class="col-xl-6 ">
                                            <p>{{ $member->father_name }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($member->mother_name !=null)
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <p>Mother Name:</p>
                                        </div>
                                        <div class="col-xl-6 ">
                                            <p>{{ $member->mother_name }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($member->date_of_birth !=null)
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <p>Date of Birth </p>
                                        </div>
                                        <div class="col-xl-6 ">
                                            <p>{{ $member->date_of_birth }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($member->gender !=null)
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <p>Gender:</p>
                                        </div>
                                        <div class="col-xl-6 ">
                                            <p>{{ $member->gender }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($member->blood_group !=null)
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <p>Blood Group:</p>
                                        </div>
                                        <div class="col-xl-6 ">
                                            <p>{{ $member->blood_group }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($member->religion !=null)
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <p>Religion:</p>
                                        </div>
                                        <div class="col-xl-6 ">
                                            <p>{{ $member->religion }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($member->country_name !=null)
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <p>Nationality:</p>
                                        </div>
                                        <div class="col-xl-6 ">
                                            <p>{{ $member->country_name }}</p>
                                        </div>
                                    </div>
                                    @endif
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
                        <!-- Personal Information End -->

                        <!-- Meet link  Start-->
                        <div id="meetinglink" class="accordion-collapse collapse"
                            aria-labelledby="headingFive" data-bs-parent="#accordionExample" style="padding: 27px 15px 13px;">
                            <div class="billing_details">
                                <div class="billing_title">
                                    <h2>Meeting Link</h2>
                                </div>

                                <div class="bd-example">
                                    <table id="" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Title</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Meet Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($links as $key=> $link )
                                            <tr>
                                                <th scope="col">{{ $key+1 }}</th>
                                                <th scope="col">{{ $link->date }}</th>
                                                <th scope="col">{{ $link->time }}</th>
                                                <th scope="col"><a href="https://{{ $link->link }}">{{ $link->link }}</a></th>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="certification" class="accordion-collapse collapse"
                            aria-labelledby="headingFive" data-bs-parent="#accordionExample" style="padding: 27px 15px 13px;">
                            <div class="billing_details">
                                <div class="billing_title">
                                    <h2><a href="{{ route('member-certificate-generate', $member->id) }}">Click Here For Download Your Certificate</a></h2>
                                </div>
                            </div>
                        </div>
                        <!-- Meet link  End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- profile End -->
</section>
@endsection
