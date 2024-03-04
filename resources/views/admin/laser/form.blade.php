@extends('admin.layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New Laser</h1>
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
          <form action="@isset($laser){{ route('admin.laser.update', $laser->id) }}@else{{ route('admin.laser.store') }}@endisset"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="col-sm-6" style="float: left">
                      <div class="form-group">
                        <label for="">Head</label>
                        <select id="" class="form-control" name="head_id" required>
                          <option value="">--Select Head--</option>
                              @foreach ($heads as $head)
                                  @isset($laser)
                                    <option value="{{ $head->id }}" @if($laser->head_id == $head->id) selected @endif>{{ $head->name }}</option>
                                  @else
                                    <option value="{{ $head->id }}">{{ $head->name }}</option>
                                  @endisset
                                @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6" style="float: left">
                        <div class="form-group">
                            <label for="">Type</label>
                            <select class="form-control" name="type_id" required>
                                <option value="">--Select Type--</option>

                                <option value="1" @isset($laser) @if($laser->type_id == 1) selected @endif @endisset >Income</option>
                              <option value="2" @isset($laser) @if($laser->type_id == 2) selected @endif @endisset>Expense</option>
                              </select>
                          </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-sm-6" style="float: left">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="Enter Date" @isset($laser) value="{{ $laser->date }}" @endisset required>
                          </div>
                    </div>
                    <div class="col-sm-6" style="float: left">

                          <div class="form-group">
                            <label for="exampleInputEmail1">Comment</label>
                            <input type="text" name="comment" class="form-control" id="exampleInputEmail1" placeholder="Enter Comment" @isset($laser) value="{{ $laser->amount }}" @endisset required>
                          </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" @isset($laser) value="{{ $laser->amount }}" @endisset required>
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
