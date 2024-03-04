@extends('admin.layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New Executive Council</h1>
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
          <form action="@isset($staff){{ route('admin.executive.update', $staff->id) }}@else{{ route('admin.executive.store') }}@endisset"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" @isset($staff) value="{{ $staff->name }}" @endisset required>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="location_id">Council</label>
                    <select class="form-control" name="location_id" id="location_id" required>
                      <option value="">--Select Council--</option>
                      @foreach ($locations as $location)
                        @isset($staff)
                          <option value="{{ $location->id }}" @if($staff->location_id == $location->id) selected @endif>{{ $location->name }}</option>
                        @else
                          <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endisset
                      @endforeach
                    </select>
                  </div>
                </div>
                {{-- <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Desigantion</label>
                    <input type="text" name="designation" class="form-control" id="exampleInputEmail1" placeholder="Enter designation" @isset($staff) value="{{ $staff->designation }}" @endisset required>
                  </div>
                </div> --}}
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Join Date</label>
                    <input type="date" name="join_date" class="form-control" id="exampleInputEmail1" placeholder="Enter join date" @isset($staff) value="{{ $staff->join_date }}" @endisset required>
                  </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6" style="float: left">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email address" @isset($staff) value="{{ $staff->email }}" @endisset required>
                      </div>
                    </div>
                  </div>
                <div class="col-sm-6" style="float: left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" >
                  </div>
                </div>
              </div>

              {{-- <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password address" @isset($member) value="{{ $member->password }}" @endisset required>
            </div> --}}
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone No" @isset($staff) value="{{ $staff->phone }}" @endisset required>
              </div>

              <div class="form-group">
                @isset($staff) <img src="{{ asset('assets') }}/images/uploads/executive/{{ $staff->image }}" alt="Staff image" width="100px" height="100px"><br/> @endisset
                <label for="exampleInputFile">@isset($staff) Change Image @else Choose Image @endisset</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="form-control" @isset($staff) @else required @endisset>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <textarea name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">@isset($staff) {{ $staff->address }} @endisset</textarea>
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
