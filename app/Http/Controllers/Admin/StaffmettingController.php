<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Staffmetting;
use Toastr;
use Carbon\Carbon;

class StaffmettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data['Staffmetting'] = Staffmetting::latest()->get();
            return view('admin.staff-meeting.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff-meeting.form');

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
        $validated = $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        if (!$request->status || $request->status == NULL) {
            $request->status = 0;
        } else {
            $request->status = 1;
        }

        $Staffmetting = Staffmetting::create([
            'title' => $request->title,
            'link' => $request->link,
            'date' => $request->date,
            'time' => $request->time,
            'status' => $request->status
        ]);


        Toastr::success('Member-Metting added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.member-meeting.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['Staffmetting'] = Staffmetting::findOrFail($id);

        if($data['Staffmetting']){
            return view('admin.staff-meeting.form', $data);
        }

        return back();
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
        $Staffmetting = Staffmetting::findOrFail($id);
        if($Staffmetting){
            $validated = $request->validate([
                'title' => 'required',
                'link' => 'required',
            ]);

            if (!$request->status || $request->status == NULL) {
                $request->status = 0;
            } else {
                $request->status = 1;
            }

            $Staffmetting->update([
                'title' => $request->title,
                'link' => $request->link,
                'date' => $request->date,
                'time' => $request->time,
                'status' => $request->status
            ]);

            $Staffmetting->save();
            Toastr::success('Member-Metting Update successfully!', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.member-meeting.list');
        }
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
        Staffmetting::find($id)->delete();

        Toastr::success('Member-Metting Link Delete successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
