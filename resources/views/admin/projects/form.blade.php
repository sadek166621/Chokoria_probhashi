@extends('admin.layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New project</h1>
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

          <form action="@isset($project){{ route('admin.project.update', $project->id) }}@else{{ route('admin.project.store') }}@endisset"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" @isset($project) value="{{ $project->title }}" @endisset required>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea  name="description" class="form-control" id="summernote" placeholder="Enter description">@isset($project) {{ $project->description }} @endisset</textarea>
                  </div>
              </div>
                    <div class="col-md-12" >
                        <div class="form-group">
                          <label for="exampleInputEmail1">Cost</label>
                          <input type="number" name="cost" class="form-control" id="exampleInputEmail1" placeholder="Enter Project Cost" @isset($project) value="{{ $project->cost }}" @endisset >
                        </div>
                      </div>
                    <div class="col-md-12" >
                        <div class="form-group">
                          <label for="exampleInputEmail1">Income</label>
                          <input type="number" name="income" class="form-control" id="exampleInputEmail1" placeholder="Enter Project Income" @isset($project) value="{{ $project->income }}" @endisset >
                        </div>
                      </div>
                <div class="col-md-12" >
                        <div class="form-group">
                            @isset($project) <img src="{{ asset('assets') }}/images/uploads/project/{{ $project->image }}" alt="project image" width="100px" height="100px"><br/> @endisset
                            <label for="exampleInputFile">@isset($project) Change project Image @else Choose project Image @endisset</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="image" class="form-control" @isset($project) @else required @endisset>
                              </div>
                            </div>
                          </div>
                    </div>



             {{-- <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Address</label>
                    <textarea  name="address" class="form-control" id="summernote" placeholder="Enter address">@isset($project) {{ $project->address }} @endisset</textarea>
                  </div>
             </div> --}}

             <div class="col-sm-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select name="status" class="form-control">
                    <option value="">--Select Status--</option>
                    <option  @isset($project) @if($project->status == '1') selected @endif  @endisset selected value="1">Active</option>
                    <option  @isset($project) @if($project->status == '0') selected @endif  @endisset  value="0">Inactive</option>
                    <option  @isset($project) @if($project->status == '2') selected @endif  @endisset value="2">Closed</option>
                </select>
                </div>
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
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@endpush
