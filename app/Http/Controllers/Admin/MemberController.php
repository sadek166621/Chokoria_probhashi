<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Member;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Toastr;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Hash;
use Session;
use Auth;
use Mpdf\Mpdf;
// use PDF;
// use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function index()
    {

        $data['members'] = Member::where('location_id',2)->latest()->get();

        return view('admin.member.list', $data);
    }

    public function checkSerial(Request $request)
    {
        $serialNumber = $request->input('serialNumber');

        // Perform a query to check if the serial number exists in the database
        $exists = Member::where('serial', $serialNumber)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function create()
    {
        $data['countries'] = DB::table('apps_countries')->get();
        return view('admin.member.form',$data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255|unique:members'
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

            if (!file_exists('assets/images/uploads/members')) {
                mkdir('assets/images/uploads/members', 0777, true);
            }

            $image->move(public_path('assets/images/uploads/members'), $imageName);
            // $image->move(base_path().'/assets/images/uploads/members', $imageName);

            $image = $imageName;
        }

        $member = Member::create([
            'serial' => $request->serial,
            'name' => $request->name,
            'username' => Str::slug($request->name).Str::random(6),
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'nominee_name' => $request->nominee_name,
            'relation' => $request->relation,
            'blood_group' => $request->blood_group,
            'country_name' => $request->nationality,
            'date_of_birth' => $request->date_of_birth,
            'religion' => $request->religion,
            'gender' => $request->gender,
            'passport_no' => $request->passport_no,
            'nid' => $request->nid,
            'e_nid' => $request->e_nid,
            'phone' => $request->phone,
            'family_phone' => $request->family_phone,
            'whatsapp_number' => $request->whatsapp_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permanent_a_village' => $request->permanent_a_village,
            'permanent_word_no' => $request->permanent_word_no,
            'permanent_union' => $request->permanent_union,
            'permanent_upazila' => $request->permanent_upazila,
            'address' => $request->address,
            'image' => $image,
            'status' => $request->status,
        ]);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        $user->role_type = 'member';
        $user->type = 2;
        $user->save();

        //event(new Registered($user));
        //Auth::login($user);

        $member->user_id = $user->id;
        $member->location_id = 2;

        $member->save();

        Toastr::success('Member added successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.member.list');
    }


    public function edit($id)
    {
        $data['member'] = Member::findOrFail($id);
        $data['countries'] = DB::table('apps_countries')->get();
            return view('admin.member.form', $data);
        return back();
    }

    public function certificategenerate($id)
    {
        $member = Member::find($id);
        if (!$member) {
            // Handle member not found, redirect or display an error
            return redirect()->back()->with('error', 'Member not found.');
        }

        $mpdf = new Mpdf();

        // Your HTML content goes here (replace with your actual certificate design)
        $html = view('admin.certificates.template', ['member' => $member])->render();
        // $pdf = PDF::loadView('admin.certificates.template', ['member' => $member]);
        // return $pdf->stream('template.pdf');


        // Write HTML content to the PDF
        $mpdf->WriteHTML($html);

        // Output the PDF for download
        $mpdf->Output('certificate_' . $member->id . '.pdf', 'D');

        $member->update([
            'certificate_status'=> '1',
        ]);


    }
    public function membercertificategenerate ($id){
        $member = Member::find($id);
        if (!$member) {
            // Handle member not found, redirect or display an error
            return redirect()->back()->with('error', 'Member not found.');
        }

        $mpdf = new Mpdf();

        // Your HTML content goes here (replace with your actual certificate design)
        $html = view('admin.certificates.template', ['member' => $member])->render();
        // $pdf = PDF::loadView('admin.certificates.template', ['member' => $member]);
        // return $pdf->stream('template.pdf');


        // Write HTML content to the PDF
        $mpdf->WriteHTML($html);

        // Output the PDF for download
        $mpdf->Output('certificate_' . $member->id . '.pdf', 'D');
    }

    public function inactivememberedit($id){
        $data['member'] = Member::findOrFail($id);
        $data['countries'] = DB::table('apps_countries')->get();
            return view('admin.member.inactive-member-edit', $data);
        return back();
    }
    public function update(Request $request, $id)
    {
        // return $request;
        $member = Member::findOrFail($id);

        if($member){
            $validated = $request->validate([
                'name' => 'required',
            ]);

            if (!$request->status || $request->status == NULL) {
                $request->status = 0;
            } else {
                $request->status = 1;
            }

            $target_image = $member->image;
            $image = $request->file('image');
            if($image){
                $currentDate = Carbon::now()->toDateString();
                //dd($image->getClientOriginalExtension());

                $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                if (!file_exists('assets/images/uploads/members')) {
                    mkdir('assets/images/uploads/members', 0777, true);
                }

                $image->move(public_path('assets/images/uploads/members'), $imageName);
                // $image->move(base_path().'/assets/images/uploads/members', $imageName);

                $target_image = $imageName;
            }

            if(strcmp($member->name, $request->name) == 0) {
                $username = $member->username;
            }else{
                $username = Str::slug($request->name).Str::random(6);
            }

            $member->update([
                'name' => $request->name,
                'username' => Str::slug($request->name).Str::random(6),
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'nominee_name' => $request->nominee_name,
                'relation' => $request->relation,
                'blood_group' => $request->blood_group,
                'country_name' => $request->nationality,
                'date_of_birth' => $request->date_of_birth,
                'religion' => $request->religion,
                'gender' => $request->gender,
                'passport_no' => $request->passport_no,
                'nid' => $request->nid,
                'e_nid' => $request->e_nid,
                'phone' => $request->phone,
                'family_phone' => $request->family_phone,
                'whatsapp_number' => $request->whatsapp_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'permanent_a_village' => $request->permanent_a_village,
                'permanent_word_no' => $request->permanent_word_no,
                'permanent_union' => $request->permanent_union,
                'permanent_upazila' => $request->permanent_upazila,
                'address' => $request->address,
                'image' => $image,
                'status' => $request->status,
                'image' => $target_image,
                'status' => $request->status,
            ]);

            $user = User::where('id', $member->user_id)->first();
            $user->status = $request->status;
            $user->save();
            // $user = User::create([

            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),

            // ]);
            // $user->role_type = 'member';
            // $user->type = 2;
            // $user->save();

            Toastr::success('member updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('admin.member.list');
        }

        return back();
    }

    public function inactivememberupdate(Request $request, $id){
        // return $request;
        $member = Member::findOrFail($id);

        if($member){
            $validated = $request->validate([
                'name' => 'required',
            ]);

            if (!$request->status || $request->status == NULL) {
                $request->status = 0;
            } else {
                $request->status = 1;
            }

            $target_image = $member->image;
            $image = $request->file('image');
            if($image){
                $currentDate = Carbon::now()->toDateString();
                //dd($image->getClientOriginalExtension());

                $imageName = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                if (!file_exists('assets/images/uploads/members')) {
                    mkdir('assets/images/uploads/members', 0777, true);
                }

                $image->move(public_path('assets/images/uploads/members'), $imageName);
                // $image->move(base_path().'/assets/images/uploads/members', $imageName);

                $target_image = $imageName;
            }

            if(strcmp($member->name, $request->name) == 0) {
                $username = $member->username;
            }else{
                $username = Str::slug($request->name).Str::random(6);
            }

            $member->update([
            'name' => $request->name,
            'username' => Str::slug($request->name).Str::random(6),
            'country_name' => $request->country_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'join_date' => $request->join_date,
            'address' => $request->address,
            'image' => $target_image,
            'status' => $request->status,
            // 'card' => str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT),
            ]);
            $counter = $member->id;
            $member->card = sprintf('%04d', $counter);
            $member->save();

            $user = User::where('id', $member->user_id )->first();
            $user->status = $request->status;
            $user->save();
            Toastr::success('member updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('admin.member.list');
        }

        return back();
    }
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        if($member){
            $member->delete();
            Toastr::success('Member deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        }

        return back();
    }

    public function inactive(){
        $data['members'] = Member::where('status',0)->where('location_id',2)->latest()->get();
        return view('admin.member.inactive',$data);
    }

}
