@extends('admin.layouts.master')
@section('content')
<br>

    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card" id="invoice_wrapper">
                    <div class="table-responsive">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                        <table id="myTable" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <h2 class="mb-xlg text-center" style="background-color: #dee2e6 ; font-weight: bold;">View Attendances </h2>

                            <span style="font-weight:bold">
                                Name : {{ $data->name}}
                                <br>
                                Image :<img src="{{ asset('assets') }}/images/uploads/staffs/{{ $data->image }}" width="50px" height="50px">

                            </span>

                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Date</th>
                                <th>Attendance</th>
                                <th>Month</th>
                                <th>Year</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; ?>
                            @foreach($Attendances as $attendance)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td> {{ $attendance->date }}</td>
                                    @if ($attendance->attendance == 'absence')
                                    <td style="color:red ">Absence</td>
                                    @else
                                    <td >Present</td>
                                    @endif
                                    <td> {{ $attendance->month }}</td>
                                    <td> {{ $attendance->year }}</td>

                                </tr>
                                <?php $i++; ?>
                            @endforeach

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
