@extends('frontend.master')
@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/cps/cps-4.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Executive Councilor List</li>
            </ul>
            <h2>Executive Councilor List</h2>
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
                        <h2>Executive Councilor Details</h2>
                    </div>

                    <div class="bd-example">
                        <table id="myTable"  class="table table-bordered  table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Council</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Picture</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($executives as $key => $executive )
                                <tr>
                                    <th scope="col">{{ $key+1 }}</th>
                                    <th scope="col">{{ $executive->name }}</th>
                                    <th scope="col">{{ $executive->Council->name }}</th>
                                    <th scope="col">{{ $executive->email }}</th>
                                    <th scope="col">{{ $executive->phone }}</th>
                                    <th scope="col" class="text-center"><img class="table-img text-center" src="{{ asset('assets') }}/images/uploads/executive/{{ $executive->image }}" alt="Picture"></th>
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
