<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\Admin\Slider;
use App\Models\Admin\Teacher;
use App\Models\Admin\Department;
use App\Models\Admin\Donation;
use App\Models\Admin\Staffmetting;
use App\Models\Admin\Location;
use App\Models\Admin\Staff;
use App\Models\Admin\Notice;
use App\Models\Admin\News;
use App\Models\Admin\Photo;
use App\Models\Admin\Student;
use App\Models\Admin\Group;
use App\Models\Admin\Classroutine;
use App\Models\Admin\Examroutine;
use App\Models\Admin\result;
use App\Models\Admin\Member;
use App\Models\Admin\Executive;
use App\Models\User;
use DB;
use Toastr;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Hash;
use Session;
use Mpdf\Mpdf;
// use PDF;


class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['setting'] = Setting::first();
        $data['notices'] = Notice::where('status', 1)->limit(5)->get();
        $data['news'] = News::where('status', 1)->limit(5)->get();
        $data['photogallery'] = Photo::where('status', 1)->limit(4)->get();
        return view('frontend.index', $data);
    }

    public function vicePrincipalMessage()
    {
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['setting'] = Setting::first();
        return view('frontend.vice_principal_message', $data);
    }

    public function principalMessage()
    {
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['setting'] = Setting::first();
        return view('frontend.principal_message', $data);
    }
    public function campushistory(){
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['setting'] = Setting::first();
        return view ('frontend.campus_history', $data);
    }

    public function viewgallery(){
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['photogallery'] = Photo::get();
        $data['setting'] = Setting::first();
        return view ('frontend.view_gallery', $data);
    }

    public function Studentsdata(){
        if(isset($_GET['group']) && $_GET['group']>0){
            $data['students'] = Student::where('group_id', $_GET['group'])->get();
        }else{
            $data['students'] = Student::where('status', 1)->get();
        }
        $data['groups'] = Group::where('status',1)->latest()->get();
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.student-data', $data);
    }

    public function teacher()
    {
        if(isset($_GET['department']) && $_GET['department']>0){
            $data['teachers'] = Teacher::where('department_id', $_GET['department'])->latest()->get();
        }else{
            $data['teachers'] = Teacher::where('status', 1)->get();
        }
        $data['departments'] = Department::where('status',1)->latest()->get();
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.teachers', $data);
    }
    public function staff()
    {
        if(isset($_GET['location']) && $_GET['location']>0){
            $data['staffs1st'] = Staff::where('location_id', $_GET['location'])->where('class', 1)->latest()->get();
            $data['staffs2nd'] = Staff::where('location_id', $_GET['location'])->where('class', 2)->latest()->get();
            $data['staffs3rd'] = Staff::where('location_id', $_GET['location'])->where('class', 3)->latest()->get();
            $data['staffs4th'] = Staff::where('location_id', $_GET['location'])->where('class', 4)->latest()->get();
        }else{
            $data['staffs1st'] = Staff::where('status', 1)->where('class', 1)->get();
            $data['staffs2nd'] = Staff::where('status', 1)->where('class', 2)->get();
            $data['staffs3rd'] = Staff::where('status', 1)->where('class', 3)->get();
            $data['staffs4th'] = Staff::where('status', 1)->where('class', 4)->get();
        }
        $data['locations'] = Location::where('status',1)->latest()->get();
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.staffs', $data);
    }
    public function teacherShow($username)
    {
        $data['teacher'] = Teacher::where('username', $username)->first();
        if($data['teacher']){
            $data['setting'] = Setting::first();
            $data['sliders'] = Slider::where('status', 1)->get();
            $data['locations'] = Department::where('status',1)->latest()->get();
            return view('frontend.teacher_profile', $data);
        }
        return redirect()->route('teacher.list');
    }

    public function staffShow($username){
        $data['staff'] = Staff::where('username', $username)->first();
        if($data['staff']){
            $data['setting'] = Setting::first();
            $data['sliders'] = Slider::where('status', 1)->get();
            $data['locations'] = Department::where('status',1)->latest()->get();
            return view('frontend.staff_profile', $data);
        }
        return redirect()->route('staff.list');
    }

    public function notice()
    {
        if(isset($_GET['type']) && $_GET['nottypeice']>0){
            $data['notices'] = Notice::where('notice_id', $_GET['notice'])->latest()->get();
        }else{
            $data['notices'] = Notice::where('status', 1)->get();
        }
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.notices', $data);
    }

    public function noticeGeneral()
    {
        $data['notices'] = Notice::where('status', 1)->where('type', 1)->get();

        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.notices', $data);
    }

    public function noticeOther()
    {
        $data['notices'] = Notice::where('status', 1)->where('type', 2)->get();

        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.notices', $data);
    }

    public function noticeShow($id)
    {
        $data['notice'] = Notice::findOrFail($id);

        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.notice_single', $data);
    }

    public function news()
    {
        $data['news'] = News::where('status', 1)->latest()->get();
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.news', $data);
    }
    public function contact(){

        return view('frontend.contact.contact');
    }

    public function newsShow($id)
    {
        $data['news'] = News::findOrFail($id);

        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        return view('frontend.news_single', $data);
    }

    public function importantlinks(){

    }
    public function Classroutine(){
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['classroutines'] = Classroutine::where('vercity_routine',0)->latest()->get();

        return view('frontend.classroutine', $data);
    }
    public function graduateroutine(){
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['classroutines'] = Classroutine::where('vercity_routine',1)->latest()->get();
        return view('frontend.graduateroutine', $data);
    }
    public function graduatesyllabus(){
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['syllabus'] = Classroutine::where('vercity_routine',1)->where('syllabus', '<>', '')->latest()->get();
        return view('frontend.graduatesyllabus', $data);
    }
    public function highersyllabus(){
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['syllabus'] = Classroutine::where('vercity_routine',0)->where('syllabus', '<>', '')->latest()->get();
        return view('frontend.highersyllabus', $data);
    }
    public function examroutine(){
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['examroutines'] = Examroutine::latest()->get();

        return view('frontend.Examroutine', $data);
    }

    public function resultlist(){
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['examroutines'] = Examroutine::latest()->get();
        $data['groups'] = Group::latest()->get();
        return view('frontend.result-list',$data);
    }

    public function searchresult(Request $request){
        // return $request;
        $data['setting'] = Setting::first();
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['examroutines'] = Examroutine::latest()->get();
        // $data['groups'] = Group::latest()->get();
        // return $request;
        $reg = result::where('roll', '=' ,$request->roll)
        ->where('session','=',$request->session)
        // ->where('section','=',$request->section)
        ->where('exam','=',$request->exam)
        ->where('section','=',$request->section)
        ->first();
        if($reg){
            $data['result'] = DB::table('results')
        ->join('students', 'students.id', '=', 'results.student_id')
        ->select('results.*', 'students.first_name','students.last_name','students.image','students.father_name','students.mother_name')
        // ->where('results.roll','=', $request->roll)
        // ->where('results.session','=',$request->session)
        // ->where('results.section','=',$request->section)
        // ->where('results.exam','=',$request->exam)
        ->first();
        Toastr::success('Here It Is!', 'Success', ["positionClass" => "toast-top-right"]);
        return view('frontend.result-list',$data);
        }
        else{
            Toastr::error('No Result Found', 'Error', ["positionClass" => "toast-top-right"]);
            return view('frontend.result-list',$data);
        }


    }

    public function becomeamember(){
        return view('frontend.become-a-member');
    }
    public function memberdatasubmit(Request $request){

        // return $request;
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|max:255|unique:members',
            'phone' => 'required|min:11|max:14',
            'permanent_word_no' => 'required',
            'permanent_union' => 'required',
            'permanent_upazila' => 'required',
            'family_phone' => 'nullable|min:11|max:14',
            'whatsapp_number' => 'required|min:11|max:14',
            'phone' => 'required|min:11|max:14',
        ]);

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
        ]);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        $user->role_type = 'member';
        $user->type = 2;
        $user->status = 0;
        $user->save();

        //event(new Registered($user));
        //Auth::login($user);

        $member->user_id = $user->id;
        $member->location_id = 2;
        $member->status = 0;

        $member->save();

        Toastr::success('Thank You For Register!', 'Wait For Admin Response', ["positionClass" => "toast-top-right"]);

        return back();
    }
    public function memberlist(){
       $data['members'] = Member::where('location_id',2)->latest()->get();
        return view('frontend.member.member-list',$data);
    }

    public function viewmemberdetails($id){
        $member = Member::find($id);
        return view('frontend.member.view-member-details',compact('member'));
    }
    public function memberlogin(){
        return view('frontend.member.member-login');
    }
    public function membersubmit(Request $request){
        // return $request;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->status == 1){
                if (Auth::user()->type == 2 || Auth::user()->type == 3  ) {
                    Toastr::success('Successfully Login', 'Title', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('member-dashboard');
                }
                else{
                    Auth::logout();
                    Toastr::error(' Email Or Password is incorrect', 'Error', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }
            else{
                Auth::logout();
                    Toastr::error(' Incorrect', 'Error', ["positionClass" => "toast-top-right"]);
                    return back();
              }

        }else {
            Toastr::error(' Email Or Password is incorrect', 'Error', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
    public function memberdashboard(){
        if (Auth::check()) {
            $data['project_donation'] = Donation::select('project_id')->selectRaw('SUM(amount) as amount')->groupBy('project_id')->get();
            $data['member'] = Member::where('user_id', Auth::user()->id)->first();
            $memberid = Member::where('user_id', Auth::user()->id)->first();
            $data['donation'] = Donation::where('member_id',  $memberid->id)->get();
            $data['totalamounts'] = Donation::where('member_id',  $memberid->id)->sum('amount');
            $data['links'] = Staffmetting::where('status',1)->latest()->get();
            return view('frontend.member.member-dashboard', $data);

        } else {
            return redirect()->route('member-login');
        }

    }
    public function executivedashboard(){
        $data['executives'] = Executive::latest()->get();
        return view('frontend.executive.executive-dashboard',$data);
    }



    public function membercertificategenerate($id){
        $member = Member::where('id', $id)->where('certificate_status',1)->first();
        if (!$member) {
            // Handle member not found, redirect or display an error
            return redirect()->back()->with('error', 'Certificate Not Genarated');
        }

        // $mpdf = new Mpdf();

        // Your HTML content goes here (replace with your actual certificate design)
        // $html = view('admin.certificates.template', ['member' => $member])->render();
        // $pdf = PDF::loadView('admin.certificates.template',
        // [
        //   'title' => 'Certificate',
        //   'format' => 'A4-L',
        //   'orientation' => 'L'
        // ]);
        // return $pdf->stream('template.pdf');


        // // Write HTML content to the PDF
        // // $mpdf->WriteHTML($html);

        // // Output the PDF for download
        // $mpdf->Output('certificate_' . $member->id . '.pdf', 'D');
        // Create mPDF instance with A4 portrait size
    $mpdf = new Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4', // Set the page size to A4
        'orientation' => 'P', // Set orientation to Portrait
    ]);

    // Load the Blade view into the mPDF instance
    $html = view('admin.certificates.template', [
        'member' => $member,
        'title' => 'Certificate',
        'format' => 'A4-L',
        'orientation' => 'L'
    ])->render();

    // Add the HTML content to mPDF
    $mpdf->WriteHTML($html);

    // Output the PDF to the browser
    $mpdf->Output('template.pdf', 'I');
    }
}
