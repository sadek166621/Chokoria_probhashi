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
                <li class="active">Member List</li>
            </ul>
            <h2>Member List</h2>
        </div>
    </div>
</section>
<!--Page Header End-->


<!--Start Checkout Page-->
<section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="billing_details">
                    <div class="billing_title">
                        <h2>Member Details</h2>
                    </div>

                    <div class="bd-example">
                        <table id="myTable"  class="table table-bordered  table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Picture</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ( $members as $key => $member )
                                <tr>
                                    <th scope="col">{{ $key+1 }}</th>
                                    <th scope="col">{{ $member->name }}</th>
                                    <th scope="col">{{ $member->email }}</th>
                                    <th scope="col">{{ $member->phone }}</th>
                                    <th scope="col">{{ $member->country_name }}</th>
                                    <th scope="col" class="text-center"><img class="table-img text-center" src="{{ asset('assets') }}/images/uploads/members/{{ $member->image }}" alt="Picture"></th>
                                    <th scope="col"><a href="{{ route('view-member-details',$member->id) }}"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </a></th>

                                </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--End Checkout Page-->
@endsection
@push('js')

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endpush


