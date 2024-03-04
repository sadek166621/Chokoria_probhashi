<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Staff;
use App\Models\Admin\Attendance;
use DB;
use Toastr;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Date('d/m/Y');
        $Attendances = DB::table('attendances')
        ->join('staff', 'attendances.staff_id', '=', 'staff.id')
        ->select('staff.name','staff.image','attendances.*')
        ->where('attendances.date',$date)
        ->get();
        // return view('admin.attendance.manage-attendance',compact('Attendances'));
        return view('admin.attendance.list', compact('Attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $data['attendace'] = Staff::all();
        return view('admin.attendance.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $attendance = DB::table('attendances')->where('date',$request->date)->first();

        if($attendance){

            Toastr::error('Todays Attendance Taken Already', '', ["positionClass" => "toast-top-right"]);
            return back();

        }
        else{

            foreach($request->staff_id as $id){
                $data[]= [
                "staff_id" => $id,
                "attendance" => $request->attendance[$id],
                "date" => $request->date,
                "year" => $request->year,
                "month" => $request->month,
                ];
            }

          $att = DB::table('attendances')->insert($data);
          if($att){

            Toastr::success('New Attendance take Successfully', '', ["positionClass" => "toast-top-right"]);
            return back();
          }


        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $Attendances = DB::table('attendances')->where('staff_id',$staff_id)->orderby('id','desc')->get();
        // $data = DB::table('attendances')
        // ->join('employeers', 'attendances.id', '=', 'employeers.id')
        // ->select('employeers.name','employeers.photo')
        // ->where('attendances.emp_id',$emp_id)
        // ->first();

        //    return view('admin.attendance.view-attendance',[
        //        'Attendances'=>$Attendances,
        //        'data'=>$data
        //    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $data['attendace'] = Staff::all();
        $data['atd'] = Attendance::findOrFail($id);
        return view('admin.attendance.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $staff = Attendance::findOrFail($id);

            $staff->update([
                'attendance' => $request->attendance,
            ]);

            Toastr::success('Attendance updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('admin.attendance.list');


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view($staff_id){
        $Attendances = DB::table('attendances')->where('staff_id',$staff_id)->orderby('id','desc')->get();
        $data = DB::table('attendances')
        ->join('staff', 'attendances.staff_id', '=', 'staff.id')
        ->select('attendances.*','staff.*')
        ->where('attendances.staff_id',$staff_id)
        ->first();

           return view('admin.attendance.view-attendance',[
               'Attendances'=>$Attendances,
               'data'=>$data
           ]);
       }
}
