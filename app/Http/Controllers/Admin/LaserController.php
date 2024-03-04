<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Head;
use App\Models\Admin\Laser;
use Toastr;
use DB;
class LaserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['start_date']) && $_GET['end_date']>0){
            $laser = Laser::whereBetween('date', [$_GET['start_date'], $_GET['end_date']])->get();
            $totalIncome = 0;
            $totalExpense = 0;

            foreach ($laser as $l) {
                if ($l->type_id == 1) {
                    $totalIncome += $l->amount;
                } elseif ($l->type_id == 2) {
                    $totalExpense += $l->amount;
                }
            }
            $data['laser'] = Laser::whereBetween('date', [$_GET['start_date'], $_GET['end_date']])->get();
        }
        else{
        $laser = Laser::all();
        $totalIncome = 0;
        $totalExpense = 0;

        foreach ($laser as $l) {
            if ($l->type_id == 1) {
                $totalIncome += $l->amount;
            } elseif ($l->type_id == 2) {
                $totalExpense += $l->amount;
            }
        }
        $data['laser'] = Laser::latest()->get();
        }

        return view('admin.laser.list', $data , compact('totalIncome','totalExpense'));
    }

    public function weak(){
        $toda =date_format(date_create(date("Y-m-j")),"Y-m-d");
        $toda1 =date('Y-m-d', strtotime('-7 days'));

        $laser = Laser::whereBetween('date',[$toda1,$toda])->get();
        $totalIncome = 0;
        $totalExpense = 0;

        foreach ($laser as $l) {
            if ($l->type_id == 1) {
                $totalIncome += $l->amount;
            } elseif ($l->type_id == 2) {
                $totalExpense += $l->amount;
            }
        }
        $data['laser'] = Laser::whereBetween('date',[$toda1,$toda])->get();
        return view('admin.laser.weak', $data , compact('totalIncome','totalExpense'));
    }
    public function month(){
        $toda =date('Y-m-01', strtotime('-1 month'));
        $toda1 =date('Y-m-31', strtotime('-1 month'));

        $laser = Laser::whereBetween('date',[$toda1,$toda])->get();
        $totalIncome = 0;
        $totalExpense = 0;

        foreach ($laser as $l) {
            if ($l->type_id == 1) {
                $totalIncome += $l->amount;
            } elseif ($l->type_id == 2) {
                $totalExpense += $l->amount;
            }
        }
        $data['laser'] = Laser::whereBetween('date',[$toda1,$toda])->get();
        return view('admin.laser.month', $data , compact('totalIncome','totalExpense'));
    }
    public function year (){

        $toda =date('Y-m-01', strtotime('-12 month'));
        $toda1 =date('Y-m-31', strtotime('-12 month'));

        $laser = Laser::whereBetween('date',[$toda1,$toda])->get();
        $totalIncome = 0;
        $totalExpense = 0;

        foreach ($laser as $l) {
            if ($l->type_id == 1) {
                $totalIncome += $l->amount;
            } elseif ($l->type_id == 2) {
                $totalExpense += $l->amount;
            }
        }
        $data['laser'] = Laser::whereBetween('date',[$toda1,$toda])->get();
        return view('admin.laser.year', $data , compact('totalIncome','totalExpense'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['heads'] = Head::where('status',1)->latest()->get();
        return view('admin.laser.form',$data);

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
            'type_id' => 'required',
            'head_id' => 'required',
            'date' => 'required',
            'comment' => 'required',
            'amount' => 'required',
        ]);

        $staff = Laser::create([
            'type_id' => $request->type_id,
            'head_id' => $request->head_id,
            'date' => $request->date,
            'comment' => $request->comment,
            'amount' => $request->amount,
        ]);

        Toastr::success('Laser added successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.laser.list');
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
        $data['laser'] = Laser::findOrFail($id);
        $data['heads'] = Head::where('status',1)->latest()->get();
        if($data['laser']){
            return view('admin.laser.form', $data);
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
        $laser = Laser::findOrFail($id);

        if($laser){
            $validated = $request->validate([
                'type_id' => 'required',
                'head_id' => 'required',
                'date' => 'required',
                'comment' => 'required',
                'amount' => 'required',
            ]);


            $laser->update([
                'type_id' => $request->type_id,
                'head_id' => $request->head_id,
                'date' => $request->date,
                'comment' => $request->comment,
                'amount' => $request->amount,
            ]);

            Toastr::success('Laser Update successfully!', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('admin.laser.list');
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
        $laser = Laser::findOrFail($id);

        if($laser){
            $laser->delete();
            Toastr::success('laser deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        }

        return back();
    }
}
