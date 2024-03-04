@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Project List</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('admin.project.add') }}" class="btn btn-info float-right">Add New Project</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card" id="invoice_wrapper">
          <!-- /.card-header -->
          <div class="card-body">
            {{-- <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.staff.list') }}" method="get" class="form-inline mb-2">
                        <div class="form-group mx-sm-3 mb-2">
                          <select name="location" id="location" class="form-control">
                            <option value="">--Select Location--</option>
                            @foreach ($locations as $location)
                              @isset($_GET['location'])
                                <option value="{{ $location->id }}" @if($_GET['location'] == $location->id) selected @endif>{{ $location->name }}</option>
                              @else
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                              @endisset
                            @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                      </form>
                </div>
                <div class="col-md-6">
                    <a id="invoice_download_btn" class="btn btn-success" style="float: right">
                        Download
                    </a>
                </div>
            </div> --}}

            <table id="myTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Title</th>
                  <th>Desc</th>
                  <th>Cost</th>
                  <th>Income</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($projects) > 0)
                  @foreach ($projects as $key => $project)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $project->title }}</td>
                      <td> {!! nl2br($project->description) !!}</td>
                      <td>{{ $project->cost }}</td>
                      <td>{{ $project->income }}</td>
                      <td>
                        <img src="{{ asset('assets') }}/images/uploads/project/{{ $project->image }}" alt="project image" width="100px" height="100px">
                      </td>
                      <td>
                        @if ($project->status == 1)
                          <span class="badge bg-success">Active</span>
                        @elseif($project->status == 2)
                          <span class="badge bg-danger">Closed</span>
                          @else
                          <span class="badge bg-danger">Inactive</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('admin.project.detail', $project->id) }}" class="btn btn-secondary"><i class="fas fa-info-circle"></i> Details</a>
                        <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('admin.project.delete', $project->id) }}" onclick="if(!confirm('Are You Sure?')){return false}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                @else
                    <td colspan="10" class="text-center">No Member found</td>
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
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
