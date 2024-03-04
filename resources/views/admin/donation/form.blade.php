@extends('admin.layouts.master')
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New Fee/Donation</h1>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
            </div>
        </div>
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
          <form action="@isset($donation){{ route('admin.donation.update', $donation->id) }}@else{{ route('admin.donation.store') }}@endisset"
            method="post" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class="card-body">
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter title" @isset($staff) value="{{ $staff->name }}" @endisset required>
                  </div> --}}
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="location_id">Type</label>
                    <select id="paymentType" class="form-control" name="type" required>
                      <option value="">--Select Type--</option>
                          <option value="1" @isset($donation) @if($donation->type == 1) selected @endif @endisset >Fee</option>
                          <option value="2" @isset($donation) @if($donation->type == 2) selected @endif @endisset>Donation</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                    <div class="form-group">
                        <label for="">Members</label>
                        <select class="form-control" name="member_id" required>
                            <option value="">--Select Members--</option>
                            @foreach ($members as $member)
                              @isset($donation)
                                <option value="{{ $member->id }}" @if($donation->member_id == $member->id) selected @endif>{{ $member->name }}</option>
                              @else
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                              @endisset
                            @endforeach
                          </select>
                      </div>
                </div>
              </div>
              <style>
                .hidden {
                  display: none;
                }
              </style>
              @isset($donation)
              <div>
              @else
              <div id="monthYearFields"  class="hidden" >
              @endisset
                <div class="col-sm-12">
                    <div class="col-sm-6" style="float: left">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Month</label>
                        <select name="month" class="form-control">
                            <option value=''>--Select Month--</option>
                            <option @isset($donation) @if($donation->month == 'Janaury') selected @endif  @endisset selected value='Janaury'>Janaury</option>
                            <option @isset($donation) @if($donation->month == 'February') selected @endif  @endisset value='February'>February</option>
                            <option @isset($donation) @if($donation->month == 'March') selected @endif  @endisset value='March'>March</option>
                            <option @isset($donation) @if($donation->month == 'April') selected @endif  @endisset value='April'>April</option>
                            <option @isset($donation) @if($donation->month == 'May') selected @endif  @endisset value='May'>May</option>
                            <option @isset($donation) @if($donation->month == 'June') selected @endif  @endisset value='June'>June</option>
                            <option @isset($donation) @if($donation->month == 'July') selected @endif  @endisset value='July'>July</option>
                            <option @isset($donation) @if($donation->month == 'August') selected @endif  @endisset value='August'>August</option>
                            <option @isset($donation) @if($donation->month == 'September') selected @endif  @endisset value='September'>September</option>
                            <option @isset($donation) @if($donation->month == 'October') selected @endif  @endisset value='October'>October</option>
                            <option @isset($donation) @if($donation->month == 'November') selected @endif  @endisset value='November'>November</option>
                            <option @isset($donation) @if($donation->month == 'December') selected @endif  @endisset value='December'>December</option>
                            </select>
                      </div>
                    </div>
                    <div class="col-sm-6" style="float: left">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Year</label>
                          <select name="year" class="form-control">
                            <option value="">--Select Year--</option>
                            <option  @isset($donation) @if($donation->year == '2016') selected @endif  @endisset  value="2016">2016</option>
                            <option  @isset($donation) @if($donation->year == '2017') selected @endif  @endisset value="2017">2017</option>
                            <option  @isset($donation) @if($donation->year == '2018') selected @endif  @endisset value="2018">2018</option>
                            <option  @isset($donation) @if($donation->year == '2019') selected @endif  @endisset value="2019">2019</option>
                            <option  @isset($donation) @if($donation->year == '2020') selected @endif  @endisset value="2020">2020</option>
                            <option  @isset($donation) @if($donation->year == '2021') selected @endif  @endisset value="2021">2021</option>
                            <option  @isset($donation) @if($donation->year == '2022') selected @endif  @endisset value="2022">2022</option>
                            <option  @isset($donation) @if($donation->year == '2023') selected @endif  @endisset value="2023">2023</option>
                            <option  @isset($donation) @if($donation->year == '2024') selected @endif  @endisset value="2024">2024</option>
                            <option  @isset($donation) @if($donation->year == '2025') selected @endif  @endisset value="2025">2025</option>
                            <option  @isset($donation) @if($donation->year == '2026') selected @endif  @endisset value="2026">2026</option>
                            <option  @isset($donation) @if($donation->year == '2027') selected @endif  @endisset value="2027">2027</option>
                            <option  @isset($donation) @if($donation->year == '2028') selected @endif  @endisset value="2028">2028</option>
                            <option  @isset($donation) @if($donation->year == '2029') selected @endif  @endisset value="2029">2029</option>
                            <option  @isset($donation) @if($donation->year == '2030') selected @endif  @endisset value="2030">2030</option>
                        </select>
                        </div>
                      </div>
                  </div>
              </div>

              <div class="form-group" id="project_field">
                <label for="exampleInputEmail1">Project</label>
                <select name="project_id" id="projectSelect" class="form-control">
                    <option value=''>--Select Month--</option>
                    @foreach ($projects as $project)
                        @isset($donation)
                            <option value="{{ $project->id }}" @if($project->id == $donation->project_id) selected @endif>{{ $project->title }}</option>
                        @else
                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                        @endisset
                    @endforeach
                </select>
            </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Amount</label>
                <input type="text" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" @isset($donation) value="{{ $donation->amount }}" @endisset required>
              </div>
              <div class="form-check">
                <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" @isset($staff) @if($staff->status == 1) checked @endif @else checked @endisset>
                <label class="form-check-label" for="exampleCheck1">Active</label>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('#paymentType').change(function () {
            if ($(this).val() === '1') {
                $('#monthYearFields').removeClass('hidden');
                $('#project_field').addClass('hidden');
            } else {
                $('#monthYearFields').addClass('hidden');
                $('#project_field').removeClass('hidden');
            }
        });
    });
</script>
@endpush
