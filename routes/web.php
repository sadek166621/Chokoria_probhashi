<?php
use App\Http\Controllers\Admin\Dashboard\DashboardController;
//ADMIN CONTROLLERS
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HeadController;
use App\Http\Controllers\Admin\LaserController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\ClassroutineController;
use App\Http\Controllers\Admin\ExamroutineController;
use App\Http\Controllers\Admin\StaffmettingController;
use App\Http\Controllers\Admin\CouncilController;
use App\Http\Controllers\Admin\ExecutiveController;
use App\Http\Controllers\CertificateController;

//APP
Use App\Http\Controllers\PagesController;
Use App\Http\Controllers\AppAuthController;
use Illuminate\Support\Facades\Route;

// CUSTOMER PANEl ROUTES
Route::get('/register', [AppAuthController::class, 'register'])->name('register');
Route::POST('/registerAction', [AppAuthController::class, 'registerAction'])->name('registerAction');


//ADMIN PANEL
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/login', [AppAuthController::class, 'login'])->name('login');
    Route::post('/loginAction', [AppAuthController::class, 'loginAction'])->name('loginAction');
    Route::post('/logout', [AppAuthController::class, 'logout'])->name('logout');
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('admin')->group(function () {
        Route::group(['as' => 'slider.', 'prefix' => 'slider'], function () {
            Route::get('/list', [SliderController::class, 'index'])->name('list');
            Route::get('/add', [SliderController::class, 'create'])->name('add');
            Route::post('/submit', [SliderController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [SliderController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'department.', 'prefix' => 'department'], function () {
            Route::get('/list', [DepartmentController::class, 'index'])->name('list');
            Route::get('/add', [DepartmentController::class, 'create'])->name('add');
            Route::post('/submit', [DepartmentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [DepartmentController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'teacher.', 'prefix' => 'teacher'], function () {
            Route::get('/list', [TeacherController::class, 'index'])->name('list');
            Route::get('/add', [TeacherController::class, 'create'])->name('add');
            Route::post('/submit', [TeacherController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [TeacherController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [TeacherController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'student.', 'prefix' => 'student'], function () {
            Route::get('/list', [StudentController::class, 'index'])->name('list');
            Route::get('/add', [StudentController::class, 'create'])->name('add');
            Route::post('/submit', [StudentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'council.', 'prefix' => 'council'], function () {
            Route::get('/list', [CouncilController::class, 'index'])->name('list');
            Route::get('/add', [CouncilController::class, 'create'])->name('add');
            Route::post('/submit', [CouncilController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CouncilController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CouncilController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CouncilController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'staff.', 'prefix' => 'staff'], function () {
            Route::get('/list', [StaffController::class, 'index'])->name('list');
            Route::get('/add', [StaffController::class, 'create'])->name('add');
            Route::post('/submit', [StaffController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StaffController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [StaffController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [StaffController::class, 'destroy'])->name('delete');
        });

        // -----------Attendance----------

        Route::group(['as' => 'attendance.', 'prefix' => 'attendance'], function () {
            Route::get('/list', [AttendanceController::class, 'index'])->name('list');
            Route::get('/add', [AttendanceController::class, 'create'])->name('add');
            Route::post('/submit', [AttendanceController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AttendanceController::class, 'edit'])->name('edit');
            Route::get('/view/{staff_id}', [AttendanceController::class, 'view'])->name('view');
            Route::post('/update/{id}', [AttendanceController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [AttendanceController::class, 'destroy'])->name('delete');
            Route::get('/show/{id}', [AttendanceController::class, 'show'])->name('show');
        });

        // ----------End Attendance-----------

        Route::group(['as' => 'executive.', 'prefix' => 'executive'], function () {
            Route::get('/list', [ExecutiveController::class, 'index'])->name('list');
            Route::get('/add', [ExecutiveController::class, 'create'])->name('add');
            Route::post('/submit', [ExecutiveController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ExecutiveController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ExecutiveController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ExecutiveController::class, 'destroy'])->name('delete');
        });
// ===================================== Projects Module =====================

        Route::group(['as' => 'project.', 'prefix' => 'project'], function () {
            Route::get('/list', [ProjectController::class, 'index'])->name('list');
            Route::get('/add', [ProjectController::class, 'create'])->name('add');
            Route::post('/submit', [ProjectController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
            Route::get('/detail/{id}', [ProjectController::class, 'detail'])->name('detail');
            Route::post('/update/{id}', [ProjectController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ProjectController::class, 'destroy'])->name('delete');
        });
// ===================================== End Project Module===================

        Route::group(['as' => 'member-meeting.', 'prefix' => 'member-meeting'], function () {
            Route::get('/list', [StaffmettingController::class, 'index'])->name('list');
            Route::get('/add', [StaffmettingController::class, 'create'])->name('add');
            Route::post('/submit', [StaffmettingController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StaffmettingController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [StaffmettingController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [StaffmettingController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'member.', 'prefix' => 'member'], function () {
            Route::get('/list', [MemberController::class, 'index'])->name('list');
            Route::get('/add', [MemberController::class, 'create'])->name('add');
            Route::get('/inactive', [MemberController::class, 'inactive'])->name('inactive');
            Route::post('/submit', [MemberController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('edit');
            Route::get('/certificate-generate/{id}', [MemberController::class, 'certificategenerate'])->name('certificate-generate');
            Route::get('/inactive-member-edit/{id}', [MemberController::class, 'inactivememberedit'])->name('inactive-member-edit');
            Route::post('/update/{id}', [MemberController::class, 'update'])->name('update');
            Route::post('/inactive-member-update/{id}', [MemberController::class, 'inactivememberupdate'])->name('inactive-member-update');
            Route::get('/delete/{id}', [MemberController::class, 'destroy'])->name('delete');
            Route::post('/serial', [MemberController::class, 'checkSerial'])->name('serial');
        });

        Route::group(['as' => 'certificate.', 'prefix' => 'certificate'], function () {
            Route::get('/list', [CertificateController::class, 'index'])->name('list');
            Route::get('/add', [CertificateController::class, 'create'])->name('add');
            Route::post('/submit', [CertificateController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CertificateController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CertificateController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CertificateController::class, 'destroy'])->name('delete');
            Route::post('/create-result', [CertificateController::class, 'createResult'])->name('createResult');
        });

        Route::group(['as' => 'notice.', 'prefix' => 'notice'], function () {
            Route::get('/list', [NoticeController::class, 'index'])->name('list');
            Route::get('/add', [NoticeController::class, 'create'])->name('add');
            Route::post('/submit', [NoticeController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [NoticeController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [NoticeController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [NoticeController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'news.', 'prefix' => 'news'], function () {
            Route::get('/list', [NewsController::class, 'index'])->name('list');
            Route::get('/add', [NewsController::class, 'create'])->name('add');
            Route::post('/submit', [NewsController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [NewsController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [NewsController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'photogallery.', 'prefix' => 'photogallery'], function () {
            Route::get('/list', [PhotoController::class, 'index'])->name('list');
            Route::get('/add', [PhotoController::class, 'create'])->name('add');
            Route::post('/submit', [PhotoController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PhotoController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [PhotoController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [PhotoController::class, 'destroy'])->name('delete');
        });
        Route::group(['as' => 'examroutine.', 'prefix' => 'examroutine'], function () {
            Route::get('/list', [ExamroutineController::class, 'index'])->name('list');
            Route::get('/add', [ExamroutineController::class, 'create'])->name('add');
            Route::post('/submit', [ExamroutineController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ExamroutineController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ExamroutineController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ExamroutineController::class, 'destroy'])->name('delete');
        });
        Route::group(['as' => 'classroutine.', 'prefix' => 'classroutine'], function () {
            Route::get('/list', [ClassroutineController::class, 'index'])->name('list');
            Route::get('/add', [ClassroutineController::class, 'create'])->name('add');
            Route::post('/submit', [ClassroutineController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ClassroutineController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ClassroutineController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ClassroutineController::class, 'destroy'])->name('delete');
        });
        Route::group(['as' => 'donation.', 'prefix' => 'donation'], function () {
            Route::get('/list', [DonationController::class, 'index'])->name('list');
            Route::get('/add', [DonationController::class, 'create'])->name('add');
            Route::post('/submit', [DonationController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [DonationController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [DonationController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [DonationController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'group.', 'prefix' => 'group'], function () {
            Route::get('/list', [GroupController::class, 'index'])->name('list');
            Route::get('/add', [GroupController::class, 'create'])->name('add');
            Route::post('/submit', [GroupController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [GroupController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [GroupController::class, 'destroy'])->name('delete');
        });



        Route::group(['as' => 'head.', 'prefix' => 'head'], function () {
            Route::get('/list', [HeadController::class, 'index'])->name('list');
            Route::get('/add', [HeadController::class, 'create'])->name('add');
            Route::post('/submit', [HeadController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [HeadController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [HeadController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [HeadController::class, 'destroy'])->name('delete');
        });



        Route::group(['as' => 'laser.', 'prefix' => 'laser'], function () {
            Route::get('/list', [LaserController::class, 'index'])->name('list');
            Route::get('/weak', [LaserController::class, 'weak'])->name('weak');
            Route::get('/month', [LaserController::class, 'month'])->name('month');
            Route::get('/year', [LaserController::class, 'year'])->name('year');
            Route::get('/add', [LaserController::class, 'create'])->name('add');
            Route::post('/submit', [LaserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [LaserController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [LaserController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [LaserController::class, 'destroy'])->name('delete');
        });




        Route::group(['as' => 'result.', 'prefix' => 'result'], function () {
            Route::get('/list', [ResultController::class, 'index'])->name('list');
            Route::get('/add', [ResultController::class, 'create'])->name('add');
            Route::post('/submit', [ResultController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ResultController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ResultController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ResultController::class, 'destroy'])->name('delete');
            Route::post('/create-result', [ResultController::class, 'createResult'])->name('createResult');
        });



        Route::group(['as' => 'setting.', 'prefix' => 'setting'], function () {
            Route::get('/edit', [DashboardController::class, 'site_edit'])->name('edit');
            Route::post('/update/{id}', [DashboardController::class, 'site_update'])->name('update');
        });
    });

    Route::middleware('panel')->group(function () {
        Route::prefix('panel')->as('panel.')->group(function () {
            // USER PANEL
            Route::get('/', [DashboardController::class, 'panel'])->name('index');
        });
    });
});

Route::get('/app/get-gateway/{id}', [DashboardController::class, 'getGateway'])->name('getGateway');


//Front END
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/vice-principal-message', [PagesController::class, 'vicePrincipalMessage'])->name('vicePrincipalMessage');
Route::get('/principal-message', [PagesController::class, 'principalMessage'])->name('principalMessage');
Route::get('/campus-history', [PagesController::class, 'campushistory'])->name('campushistory');
Route::get('/view-photo-gallery', [PagesController::class, 'viewgallery'])->name('view-gallery');
Route::get('/faculties', [PagesController::class, 'teacher'])->name('teacher.list');
Route::get('/faculties/profile/{username}', [PagesController::class, 'teacherShow'])->name('teacher.view');
Route::get('/staffs', [PagesController::class, 'staff'])->name('staff.list');
Route::get('/staffs/profile/{username}', [PagesController::class, 'staffShow'])->name('staff.view');
Route::get('/Students-data', [PagesController::class, 'Studentsdata'])->name('student.list');
Route::get('/Class-routine', [PagesController::class, 'Classroutine'])->name('classroutine.list');
Route::get('/graduate-routine', [PagesController::class, 'graduateroutine'])->name('graduate.list');
Route::get('/graduate-syllabus', [PagesController::class, 'graduatesyllabus'])->name('graduate.syllabus');
Route::get('/higher-syllabus', [PagesController::class, 'highersyllabus'])->name('higher.syllabus');
Route::get('/exam-routine', [PagesController::class, 'examroutine'])->name('examroutine.list');


Route::get('/notices', [PagesController::class, 'notice'])->name('notice.list');
Route::get('/notices-general', [PagesController::class, 'noticeGeneral'])->name('notice.list.general');
Route::get('/result-list', [PagesController::class, 'resultlist'])->name('result.list');
Route::get('/search-result', [PagesController::class, 'searchresult'])->name('search-result');
Route::get('/notices-other', [PagesController::class, 'noticeOther'])->name('notice.list.other');
Route::get('/notice/{id}', [PagesController::class, 'noticeShow'])->name('notice.show');

Route::get('/news', [PagesController::class, 'news'])->name('news.list');
Route::get('/news/{id}', [PagesController::class, 'newsShow'])->name('news.show');

Route::get('/important-links', [PagesController::class, 'importantlinks'])->name('important-links');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/become-a-member', [PagesController::class, 'becomeamember'])->name('become-a-member');
Route::post('/member-data-submit', [PagesController::class, 'memberdatasubmit'])->name('member-data-submit');


Route::get('/member-list', [PagesController::class, 'memberlist'])->name('member-list');
Route::get('/view-member-details/{id}', [PagesController::class, 'viewmemberdetails'])->name('view-member-details');
Route::get('/member-login', [PagesController::class, 'memberlogin'])->name('member-login');
Route::post('/member-submit', [PagesController::class, 'membersubmit'])->name('member-submit');
Route::post('/update-member-info-dash/{id}', [PagesController::class, 'updatememberinfodash'])->name('update-member-info-dash');

Route::get('/member-dashboard', [PagesController::class, 'memberdashboard'])->name('member-dashboard');
// Route::get('/view-member', [PagesController::class, 'viewmember'])->name('view-member');
Route::get('/executive-list', [PagesController::class, 'executivedashboard'])->name('executive-dashboard');
Route::get('member-certificate-generate/{id}', [MemberController::class, 'membercertificategenerate'])->name('member-certificate-generate');

