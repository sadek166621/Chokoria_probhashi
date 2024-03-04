<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Council;
use App\Models\Admin\Executive;
use App\Models\Admin\Member;
use App\Models\User;
use Toastr;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Hash;
class ExecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['council']) && $_GET['council']>0){
            $data['staffs'] = Council::where('location_id', $_GET['location'])->latest()->get();
        }else{
            $data['staffs'] = Executive::latest()->get();
        }
        $data['locations'] = Council::where('status',1)->latest()->get();

        return view('admin.executive.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['locations'] = Council::where('status',1)->latest()->get();
        return view('admin.executive.form', $data);
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
            'name' => 'required',
            'location_id' => 'required',
            'email' => 'required|max:255|unique:members',
            'password' => 'required',
        ]);

        if (!$request->status || $request->status == NULL) {
            $request->status = 0;
        } else {
            $request->status = 1;
        }

        $image = $request->file('image');
        if($image){
            $currentDate = Carbon::now()->toDateString();
            //dd($image->getClientOriginalExtension());

            $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('assets/images/uploads/executive')) {
                mkdir('assets/images/uploads/executive', 0777, true);
            }

            $image->move(public_path('assets/images/uploads/executive'), $imageName);

            $image = $imageName;
        }

        $staff = Executive::create([
            'name' => $request->name,
            'username' => Str::slug($request->name).Str::random(6),
            'location_id' => $request->location_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'join_date' => $request->join_date,
            'address' => $request->address,
            'image' => $image,
            'status' => $request->status,
        ]);

        $member = Member::create([
            'name' => $request->name,
            'username' => Str::slug($request->name).Str::random(6),
            'location_id' => $request->location_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'join_date' => $request->join_date,
            'address' => $request->address,
            'image' => $image,
            'status' => $request->status,
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->role_type = 'executive';
        $user->type = 3;
        $user->save();

        $staff->user_id = $user->id;
        $staff->save();

        $member->user_id = $user->id;
        $member->save();

        Toastr::success('Executive Council added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.executive.list');
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
        $data['staff'] = Executive::findOrFail($id);

        if($data['staff']){
            $data['locations'] = Council::where('status',1)->latest()->get();
            return view('admin.executive.form', $data);
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
        $staff = Executive::findOrFail($id);

        if($staff){
            $validated = $request->validate([
                'name' => 'required',
                'location_id' => 'required',
            ]);

            if (!$request->status || $request->status == NULL) {
                $request->status = 0;
            } else {
                $request->status = 1;
            }

            $target_image = $staff->image;
            $image = $request->file('image');
            if($image){
                $currentDate = Carbon::now()->toDateString();
                //dd($image->getClientOriginalExtension());

                $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                if (!file_exists('assets/images/uploads/executive')) {
                    mkdir('assets/images/uploads/executive', 0777, true);
                }

                $image->move(public_path('assets/images/uploads/executive'), $imageName);

                $target_image = $imageName;
            }

            if(strcmp($staff->name, $request->name) == 0) {
                $username = $staff->username;
            }else{
                $username = Str::slug($request->name).Str::random(6);
            }

            $staff->update([
                'name' => $request->name,
                'username' => $username,
                'location_id' => $request->location_id,
                'phone' => $request->phone,
                'email' => $request->email,
                'join_date' => $request->join_date,
                'address' => $request->address,
                'image' => $target_image,
                'status' => $request->status,
            ]);

            if($request->password){
                $staff->password = Hash::make($request->password);
                $staff->save();
            }

            Toastr::success('Executive updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('admin.executive.list');
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
        $staff = Executive::findOrFail($id);

        if($staff){
            $staff->delete();
            Toastr::success('Executive deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        }

        return back();
    }
}
