@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">

    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $member }}</h3>

            <p>Total Members</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.member.list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $executive }}<sup style="font-size: 20px"></sup></h3>

            <p>Total Executive Council</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route('admin.executive.list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $staff }}</h3>

            <p>Total Staff</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('admin.staff.list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $inactive }}</h3>

            <p>Inactive Members</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ route('admin.member.inactive') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-6">

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
                          <section class="content-header">
                            <div class="container-fluid">
                              <div class="row mb-2">
                                <div class="col-sm-6">
                                  <h1>Member List</h1>
                                </div>
                                <div class="col-sm-6">
                                  <a href="{{ route('admin.member.add') }}" class="btn btn-info float-right">Add New</a>
                                </div>
                              </div>
                            </div><!-- /.container-fluid -->
                          </section>

                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if (count($members) > 0)
                                @foreach ($members as $key => $member)
                                  <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>
                                      <img src="{{ asset('assets') }}/images/uploads/members/{{ $member->image }}" alt="member image" width="100px" height="100px">
                                    </td>

                                    <td>
                                      @if ($member->status == 1)
                                        <span class="badge bg-success">Active</span>
                                      @else
                                        <span class="badge bg-danger">Inactive</span>
                                      @endif
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
        </div>






        <div class="col-6">

              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card" id="invoice_wrapper">
                        <!-- /.card-header -->
                        <div class="card-body">
                                       @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                       @endforeach
                                      </ul>
                                  </div>
                              @endif
                              <section class="content-header">
                                <div class="container-fluid">
                                  <div class="row mb-2">
                                    <div class="col-sm-6">
                                      <h1>Executive Council List</h1>
                                    </div>
                                    <div class="col-sm-6">
                                      <a href="{{ route('admin.executive.add') }}" class="btn btn-info float-right">Add New</a>
                                    </div>
                                  </div>
                                </div><!-- /.container-fluid -->
                              </section>

                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>council</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if (count($staffs) > 0)
                                @foreach ($staffs as $key => $staff)
                                  <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->Council->name }}</td>
                                    <td>{{ $staff->phone }}</td>
                                    <td>
                                      <img src="{{ asset('assets') }}/images/uploads/executive/{{ $staff->image }}" alt="Staff image" width="100px" height="100px">
                                    </td>

                                    <td>
                                      @if ($staff->status == 1)
                                        <span class="badge bg-success">Active</span>
                                      @else
                                        <span class="badge bg-danger">Inactive</span>
                                      @endif

                                  </tr>
                                @endforeach
                              @else
                                  <td colspan="10" class="text-center">No staff found</td>
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
        </div>
    </div>

  </div><!-- /.container-fluid -->
</section>
@endsection
