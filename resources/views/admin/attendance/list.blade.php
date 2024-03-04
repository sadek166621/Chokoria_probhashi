@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1>Attendance</h1> --}}
      </div>
      <div class="col-sm-6">
        <a href="{{ route('admin.attendance.add') }}" class="btn btn-info float-right">Add New</a>
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
            <table id="myTable" class="table table-bordered table-striped">
                <h2 class="mb-xlg text-center" style="background-color: #F4F6F5 ; font-weight: bold;"> Todays Staff Attendance
                    <h3 class="mb-xlg text-center" style=" font-weight: bold;">Date:{{ date('d/m/Y') }}</h3>
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Image</th>
                  <th>Staff Name</th>
                  <th>Attendance</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                            @foreach($Attendances as $attendance)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <img src="{{ asset('assets') }}/images/uploads/staffs/{{ $attendance->image }}" width="50px" height="50px">
                                    </td>
                                    <td>{{ $attendance->name}}</td>
                                    @if ($attendance->attendance == 'present')
                                    <td style="color: green">{{ $attendance->attendance }}</td>
                                    @else
                                    <td style="color: red">{{ $attendance->attendance }}</td>
                                    @endif
                                    <td> {{ $attendance->date }}</td>
                                    <td class="center">
                                        <a href="{{ route('admin.attendance.view', $attendance->staff_id) }}" class="btn btn-success"><i class="fas fa-eye"></i> View</a>
                                        <a href="{{ route('admin.attendance.edit', $attendance->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        {{-- <a href="{{ route('admin.attendance.delete', $attendance->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a> --}}
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
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

@endpush
