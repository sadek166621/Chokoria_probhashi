<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Models\Admin\Donation;
use Toastr;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Hash;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.list',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.form');
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
            'description' => 'required',
            'image' => 'required',
        ]);

        if (!$request->status || $request->status == NULL) {
            $request->status = 0;
        } else {
            $request->status = 1;
        }

        if (!$request->close || $request->close == NULL) {
            $request->close = 0;
        } else {
            $request->close = 1;
        }

        $image = $request->file('image');
        if($image){
            $currentDate = Carbon::now()->toDateString();
            //dd($image->getClientOriginalExtension());

            $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('assets/images/uploads/project')) {
                mkdir('assets/images/uploads/project', 0777, true);
            }

            $image->move(public_path('assets/images/uploads/project'), $imageName);
            // $image->move(base_path().'/assets/images/uploads/project', $imageName);

            $image = $imageName;
        }

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,
            'close' => $request->close,
        ]);

        if( $request->cost == Null){
            $project->cost = 0;
            $project->save();
        }
        else{
            $project->cost = $request->cost;
            $project->save();
        }
        if($request->income == Null){
            $project->income = 0;
            $project->save();
        }
        else{
            $project->income = $request->income;
            $project->save();
        }

        Toastr::success('Project added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.project.list');
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
        $data['project'] = Project::find($id);
        return view('admin.projects.form',$data);
    }

    public function detail($id)
    {

    $project = Project::findOrFail($id);
    $totalProjectAmount = $project->cost;
    $totalDonationAmount = Donation::where('project_id', $id)->sum('amount');
    $netProfit = $project->income - $totalProjectAmount;
    $members = Donation::where('project_id',$id)->get();
    return view('admin.projects.detail', compact('project', 'totalProjectAmount', 'totalDonationAmount', 'netProfit','members'));

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
        $project = Project::find($id);

        // if (!$request->status || $request->status == NULL) {
        //     $request->status = 0;
        // } else {
        //     $request->status = 1;
        // }

        // if (!$request->close || $request->close == NULL) {
        //     $request->close = 0;
        // } else {
        //     $request->close = 1;
        // }

        $target_image = $project->image;
        $image = $request->file('image');
        if($image){
            $currentDate = Carbon::now()->toDateString();
            //dd($image->getClientOriginalExtension());

            $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('assets/images/uploads/project')) {
                mkdir('assets/images/uploads/project', 0777, true);
            }

            $image->move(public_path('assets/images/uploads/project'), $imageName);
            // $image->move(base_path().'/assets/images/uploads/project', $imageName);

            $target_image = $imageName;
        }
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $target_image,
            'status' => $request->status,
        ]);

        if( $request->cost == Null){
            $project->cost = 0;
            $project->save();
        }
        else{
            $project->cost = $request->cost;
            $project->save();
        }
        if($request->income == Null){
            $project->income = 0;
            $project->save();
        }
        else{
            $project->income = $request->income;
            $project->save();
        }

        Toastr::success('Project updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.project.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('admin.project.list');
    }
}
