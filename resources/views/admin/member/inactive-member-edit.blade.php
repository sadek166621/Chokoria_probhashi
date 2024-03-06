@extends('admin.layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New member</h1>
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
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
                            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

          <form action="@isset($member){{ route('admin.member.inactive-member-update', $member->id) }}@else{{ route('admin.member.store') }}@endisset"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label for="exampleInputEmail1">Serial</label>
                <input type="text" class="form-control" id="serialNumber" name="serial" @isset($member) value="{{ $member->serial }}" @endisset>
                <strong id="error-message" style="color: red;"></strong>
            </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter title" @isset($member) value="{{ $member->name }}" @endisset required>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="location_id">Country</label>
                    <select class="form-control" name="country_name" >
                      <option value="">--Select Country--</option>
                      @foreach ($countries as $country)
                        @isset($member)
                          <option value="{{ $country->country_name }}" @if($member->country_name == $country->country_name) selected @endif>{{ $country->country_name }}</option>
                        @else
                          <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                        @endisset
                      @endforeach
                    </select>
                  </div>
                </div>
                {{-- <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Desigantion</label>
                    <input type="text" name="designation" class="form-control" id="exampleInputEmail1" placeholder="Enter designation" @isset($member) value="{{ $member->designation }}" @endisset required>
                  </div>
                </div> --}}
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Join Date</label>
                    <input type="date" name="join_date" class="form-control" id="exampleInputEmail1" placeholder="Enter join date" @isset($member) value="{{ $member->join_date }}" @endisset >
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter phone no" @isset($member) value="{{ $member->phone }}" @endisset >
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                    <div class="form-group">
                        @isset($member) <img src="{{ asset('assets') }}/images/uploads/members/{{ $member->image }}" alt="member image" width="100px" height="100px"><br/> @endisset
                        <label for="exampleInputFile">@isset($member) Change member Image @else Choose member Image @endisset</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image" class="form-control" @isset($member) @else  @endisset>
                          </div>
                        </div>
                      </div>
                </div>

              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email address" @isset($member) value="{{ $member->email }}" @endisset required>
                  </div>
                </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password address" @isset($member) value="{{ $member->password }}" @endisset required>
                  </div>
                </div>

              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Full Address</label>
                <textarea name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter address">@isset($member) {{ $member->address }} @endisset</textarea>
              </div>
              <div class="form-check">
                <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" @isset($member) @if($member->status == 1) checked @endif @else checked @endisset>
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
    function delay(callback, ms){
        var timer = 0;
        return function(){
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function(){
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    function checkSerial() {
        var serialNumber = $("#serialNumber").val();

        $.ajax({
            url: '{{ route("admin.member.serial") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                serialNumber: serialNumber
            },
            success: function(response) {
                if (response.exists) {
                    $("#error-message").text("Serial number already exists!");
                    $("#submitBtn").prop("disabled", true);
                } else {
                    $("#error-message").text("");
                    $("#submitBtn").prop("disabled", false);
                }
            },
            error: function() {
                console.log("Error checking serial number");
            }
        });
    }

    $("#serialNumber").on("input", delay(function() {
        var serialNumber = $("#serialNumber").val();
        if (serialNumber.trim() === "") {
            $("#error-message").text(""); // Clear the error message when input is empty
            $("#submitBtn").prop("disabled", true); // Disable submit button when input is empty
        } else {
            checkSerial();
        }
    }, 50));

    // Disable the submit button initially
    $("#submitBtn").prop("disabled", true);
    </script>

@endpush
