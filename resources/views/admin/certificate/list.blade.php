@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Certificate Genaration List</h1>
      </div>
      {{-- <div class="col-sm-6">
        <a href="{{ route('admin.member.add') }}" class="btn btn-info float-right">Add New</a>
      </div> --}}
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
                  <th>Name</th>
                  <th>Country</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($members) > 0)
                  @foreach ($members as $key => $member)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $member->name }}</td>
                      <td>{{ $member->country_name}}</td>
                      <td>{{ $member->phone }}</td>
                      <td>
                        <img src="{{ asset('assets') }}/images/uploads/members/{{ $member->image }}" alt="member image" width="100px" height="100px">
                      </td>
                      <td>
                        <a href="{{ route('admin.member.certificate-generate', $member->id) }}" class="btn btn-default"><i class="fas fa-certificate"></i> C-G</a>
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
