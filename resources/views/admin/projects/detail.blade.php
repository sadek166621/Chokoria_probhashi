@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 >Project Details</h1>
      </div>
      {{-- <div class="col-sm-6">
        <a href="{{ route('admin.project.add') }}" class="btn btn-info float-right">Add New Project</a>
      </div> --}}
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">

    <!-- /.row -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .project-container {
            max-width: 1190px;
            margin: 0 auto;
        }

        .project-image {
            max-width: 100%;
            height: auto;
        }

        .amount-details {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .total-amount,
        .total-donation,
        .net-profit {
            flex: 1;
            text-align: center;
        }
    </style>
</head>

    <div class="project-container">
        <div class="row">
            <div class="col-md-9" style="padding-right: 15px;">
                <h4><strong>Title :</strong> {{ $project->title }}</h4>
                <div class="d-flex" style="text-align: justify"> {!! $project->description !!} </div>
            </div>
            <div class="col-md-3">
                <img class="project-image" src="{{ asset('assets') }}/images/uploads/project/{{ $project->image }}" alt="Project Image" style="height: 200px; width:200px">

            </div>
        </div>
       <br>
        <div class="amount-details">
            <div class="total-amount shadow bg-white mx-3 " style="border: 1px solid black;border-radius: 14px;padding-top: 11px;background-color: white; padding-bottom: 11px;">
                <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
                <h3>Project Cost</h3>
                <strong style="color: green">{{ $totalProjectAmount }} TK</strong>
            </div>
            <div class="total-amount shadow bg-white mx-3 " style="border: 1px solid black;border-radius: 14px;padding-top: 11px;background-color: white; padding-bottom: 11px;">
                <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
                <h3>Project Income</h3>
                <strong style="color: green">{{ $project->income }} TK</strong>
            </div>
            <div class="total-donation shadow mx-2 bg-white"style="border: 1px solid black;border-radius: 14px;padding-top: 11px;background-color: white; padding-bottom: 11px;">
                <i class="fab fa-gg" aria-hidden="true"></i>
                <h3>Total Donation Amount</h3>
                <strong style="color: green">{{ $totalDonationAmount }} TK</strong>
            </div>
            @if ($project->status == 2)
            <div class="net-profit shadow mx-3 bg-white"style="border: 1px solid black;border-radius: 14px;padding-top: 11px;background-color: white; padding-bottom: 11px;">
                <i class="fas fa-money-check-alt" aria-hidden="true"></i>
                <h3>Net Profit</h3>
                @if ($totalProjectAmount > $project->income)
                <strong style="color: red">{{ $project->income - $project->cost }} TK ( {{ ($netProfit / $project->income) *100}}% Loss)</strong>
                @else
                <strong style="color: green">{{ $project->income - $project->cost }} TK ( {{ number_format(($netProfit / $project->income) *100,2)}}% Profit)</strong>
                @endif

            </div>
            @else
            @endif
        </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-12">
      <div class="card" id="invoice_wrapper">
        <!-- /.card-header -->
        <div class="card-body">
          <h3>Members Donation List</h3>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($members as $key=> $member )
              <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $member->member->name }}</td>
                  <td>
                  <img src="{{ asset('assets') }}/images/uploads/members/{{ $member->member->image }}" alt="project image" width="100px" height="100px">
                  </td>
                  <td>{{ $member->amount }}</td>
                </tr>
              @endforeach

            </tbody>
            {{-- <tfoot>
              <tr>
                  <td colspan="3"></td>
                  <td><strong>Project Amount: {{ $totalProjectAmount }}Tk</strong></td>
                  <td><strong>Total Donation Amount: {{ $totalDonationAmount }}Tk</strong></td>
                  <td colspan="2"></td>
              </tr>
              <tr>
                  <td colspan="3"></td>
                  <td colspan="2">

                     @if ($totalProjectAmount > $totalDonationAmount )
                     <strong class="bg-green d-flex justify-content-center">
                      Net Income: {{ $netProfit}}
                       </strong>
                     @else
                     <strong class="bg-red d-flex justify-content-center">
                      Net Income: {{ $netProfit}}
                       </strong>
                     @endif

                      </td>
                  <td colspan="2"></td>
              </tr>
          </tfoot> --}}
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection

@push('js')
<script src="{{asset('assets-frontend/js/vendor/modernizr-3.6.0.min.js ') }}"></script>
<script src="{{asset('assets-frontend/js/vendor/jquery-3.6.0.min.js ') }}"></script>
   <!-- Invoice JS -->
   <script src="{{asset('assets-frontend')}}/js/invoice/jspdf.min.js"></script>
   <script src="{{asset('assets-frontend')}}/js/invoice/invoice.js"></script>

   <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
   </script>

@endpush
