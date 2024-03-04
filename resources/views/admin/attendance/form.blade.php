@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    {{-- <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1>Attendance</h1> --
      </div>
      <div class="col-sm-6">
        <a href="{{ route('admin.attendance.add') }}" class="btn btn-info float-right">Add New</a>
      </div>
    </div> --}}
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card" id="invoice_wrapper">
          <!-- /.card-header -->
          <div class="card-body">
            <table  class="table table-bordered table-striped">
                <h2 class="mb-xlg text-center" style="background-color: #F4F6F5 ; font-weight: bold;"> Todays Staff Attendance
                    <h3 class="mb-xlg text-center" style=" font-weight: bold;">Date:{{ date('d/m/Y') }}</h3>
              <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Attendace</th>
                </tr>
              </thead>
              <tbody>
                <form action="@isset($atd){{ route('admin.attendance.update',$atd->id) }}@else{{ route('admin.attendance.store') }} @endisset" method="post" enctype="multipart/form-data">
                    @csrf
                    <?php $i = 1; ?>
                    @foreach($attendace as $row)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row->name}}</td>
                            <td>
                                <img src="{{ asset('assets') }}/images/uploads/staffs/{{ $row->image }}" alt="Staff image" width="100px" height="100px">
                            </td>
                            <input type="hidden" name="staff_id[]" value="{{ $row->id }}" >
                            <td>
                                <input type="radio" name="attendance[{{ $row->id }}]" @isset($atd) @if ($atd->attendance == 'present') checked  @endif @endisset required value="present"> Present
                                <input type="radio" name="attendance[{{ $row->id }}]" @isset($atd) @if($atd->attendance == 'absence') checked  @endif @endisset required value="absence"> Absence
                            </td>

                            <input type="hidden" name="date" value="{{ date('d/m/Y') }}">
                            <input type="hidden" name="year" value="{{ date('Y') }}">
                            <input type="hidden" name="month" value="{{ date('F') }}">

                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <button style="float: right;" type="submit" class="btn btn-primary">Submit Attendance</button>
            </form>
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
