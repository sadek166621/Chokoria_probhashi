@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Member Meeting Link</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('admin.member-meeting.add') }}" class="btn btn-info float-right">Add New</a>
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
                <div class="col-md-2">
                    <form action="{{ route('admin.staff-meeting.list') }}" method="get" class="form-inline mb-2">
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

                </div>
                <div class="col-md-2">
                    <div class="form-group mx-sm-3 mb-2">
                        <select class="form-control" name="class" id="class" required>
                          <option value="">--Staff Class--</option>
                            {{-- @isset($staff)
                              <option value="1" @if($_GET['class'] == 1) selected  @endif>প্রথম শ্রেণী</option>
                              <option value="2" @if($_GET['class'] == 2) selected @endif>দ্বিতীয় শ্রেণী</option>
                              <option value="3" @if($_GET['class'] == 3) selected @endif>তৃতীয় শ্রেণী</option>
                              <option value="4" @if($_GET['class'] == 4) selected @endif>চতুর্থ শ্রেণী</option>
                            @else
                              <option value="1">প্রথম শ্রেণী</option>
                              <option value="2">দ্বিতীয় শ্রেণী</option>
                              <option value="3">তৃতীয় শ্রেণী</option>
                              <option value="4">চতুর্থ শ্রেণী</option>
                            @endisset
                        </select>
                      </div>
                </div>
                <button type="submit" style=" height: 36px; " class="btn btn-primary mb-2">Search</button>

                      </form>
            </div> --}}

            <table id="myTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>title</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Link</th>
                  {{-- <th>Link</th> --}}
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($Staffmetting) > 0)
                  @foreach ($Staffmetting as $key => $staff)
                    <tr>
                      <td>{{ $key+1 }}</td>

                      <td>{{ $staff->title}}</td>
                      <td>{{ $staff->date}}</td>
                      <td>{{ $staff->time}}</td>

                        <td class="text-center">
                            @if($staff->link)
                              <a href="https://{{ $staff->link }}" target="_blank"><i class="fas fa-link"></i></a>
                            @endif
                          </td>

                      <td>
                        @if ($staff->status == 1)
                          <span class="badge bg-success">Active</span>
                        @else
                          <span class="badge bg-danger">Inactive</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('admin.member-meeting.edit', $staff->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('admin.member-meeting.delete', $staff->id) }}" onclick="if(!confirm('Are You Sure?')){return false}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                @else
                    <td colspan="10" class="text-center">No Memeber-Metting-Link found</td>
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
