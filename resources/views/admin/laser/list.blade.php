@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Laser List</h1>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('admin.laser.add') }}" class="btn btn-info float-right">Add New</a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <form method="get" action="{{ route('admin.laser.list') }}" class="mb-3">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" required>

                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" required>

                <button type="submit" class="btn btn-primary">Filter by Date</button>
            </form>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Date</th>
                  <th>Head</th>
                  <th>Income</th>
                  <th>Expense</th>
                  <th>Comment</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($laser) > 0)
                  @foreach ($laser as $key => $laser)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $laser->date }}</td>
                      <td>{{ $laser->head->name }}</td>
                      <td>
                        @if ($laser->type_id == 1)
                        {{ $laser->amount }}Tk
                        @else

                        @endif
                      </td>
                      <td>
                        @if ($laser->type_id == 2)
                        {{ $laser->amount }}Tk
                        @else

                        @endif
                      </td>
                      <td>{{ $laser->comment }}</td>
                      <td>
                        <a href="{{ route('admin.laser.edit', $laser->id) }}" class="text-dark"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('admin.laser.delete', $laser->id) }}" class="text-danger"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                @else
                    <td colspan="8" class="text-center">No laser found</td>
                @endif
              </tbody>
              <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total Income: {{ $totalIncome }}Tk</strong></td>
                    <td><strong>Total Expense: {{ $totalExpense }}Tk</strong></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">

                       @if ($totalIncome > $totalExpense )
                       <strong class="bg-green d-flex justify-content-center">
                        Net Income: {{ $totalIncome - $totalExpense }}
                         </strong>
                       @else
                       <strong class="bg-red d-flex justify-content-center">
                        Net Income: {{ $totalIncome - $totalExpense }}
                         </strong>
                       @endif

                        </td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
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
