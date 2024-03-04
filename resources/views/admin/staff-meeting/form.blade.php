@extends('admin.layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>@isset($Staffmetting) Update @else Add New @endisset Link</h1>
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
          <form action="@isset($Staffmetting){{ route('admin.member-meeting.update', $Staffmetting->id) }}@else{{ route('admin.member-meeting.store') }}@endisset"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" @isset($Staffmetting) value="{{ $Staffmetting->title }}" @endisset required>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date</label>
                        <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Date" @isset($Staffmetting) value="{{ $Staffmetting->date }}" @endisset required>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Time</label>
                        <input type="time" name="time" class="form-control" id="exampleInputEmail1" placeholder="Enter Time" @isset($Staffmetting) value="{{ $Staffmetting->time }}" @endisset required>
                      </div>
                </div>
              </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="Enter Link" @isset($Staffmetting) value="{{ $Staffmetting->link }}" @endisset required >
                      </div>
                      <div class="form-check ">
                        <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" @isset($Staffmetting) @if($Staffmetting->status == 1) checked @endif @else checked @endisset>
                        <label class="form-check-label" for="exampleCheck1">Active</label>
                      </div>
                  </div>


                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
            </div>
            <!-- /.card-body -->

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
        $('#description').summernote();
     });
</script>
@endpush
