<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Member;
use App\Models\Admin\Donation;
use App\Models\Admin\laser;
use App\Models\Admin\Project;
use Toastr;
use DB;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['payments'] = DB::table('donations')
        ->join('members', 'donations.member_id', '=', 'members.id')
        ->join('projects', 'donations.project_id', '=', 'projects.id')
        ->select('donations.*','members.image','members.name','projects.title')
        ->get();

        // $data['project'] = DB::table('donations')
        // ->join('projects', 'projects.id', '=', 'donations.project_id')
        // ->select('projects.title')
        // ->get();
       return view('admin.donation.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['members'] = Member::latest()->get();
        $data['projects'] = Project::latest()->where('status', 1)->get();
        return view('admin.donation.form',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'member_id' => 'required',
        ]);

        if (!$request->status || $request->status == NULL) {
            $request->status = 0;
        } else {
            $request->status = 1;
        }

        $staff = Donation::create([
            'type' => $request->type,
            'project_id' => $request->project_id,
            'member_id' => $request->member_id,
            'month' => $request->month,
            'year' => $request->year,
            'status' => $request->status,
            'amount' => $request->amount,
        ]);

        $laser = Laser::create([
            'type_id' => 1,
            'head_id' => 6,
            'date' => date('Y-m-d'),
            'comment' => 'Income on Fees and Donations',
            'amount' => $request->amount,
        ]);

        Toastr::success('Month Fee/Donation added successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.donation.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['donation'] = Donation::findOrFail($id);
        $data['projects'] = Project::latest()->get();
        $data['members'] = Member::latest()->get();
        if($data['donation']){
            return view('admin.donation.form', $data);
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
        $donation = Donation::findOrFail($id);

        if($donation){
            $validated = $request->validate([
                'type' => 'required',
                'member_id' => 'required',
            ]);

            if (!$request->status || $request->status == NULL) {
                $request->status = 0;
            } else {
                $request->status = 1;
            }

            $donation->update([
            'type' => $request->type,
            'project_id' => $request->project_id,
            'member_id' => $request->member_id,
            'month' => $request->month,
            'year' => $request->year,
            'status' => $request->status,
            'amount' => $request->amount,
            ]);

            Toastr::success('Monthly Fee/Donation Update successfully!', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('admin.donation.list');
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
       $donation = Donation::find($id);
       $donation->delete();
       Toastr::success('Delete successfully!', 'Success', ["positionClass" => "toast-top-right"]);
       return back();

    }
}
