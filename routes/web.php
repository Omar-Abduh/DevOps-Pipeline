<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BoardMemberController;
use App\Http\Controllers\CommunitiesController;
use App\Http\Controllers\CommunitiesDataController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDataController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        // login
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        // register
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
        // login authenticate
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        // logout
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        // dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // forms
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        // table
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');

        // Academic year Managment
        // academic year -> create
        Route::get('academic-year/create', [AcademicYearController::class, 'create'])->name('academic-year.create');
        // academic year -> store
        Route::post('academic-year/store', [AcademicYearController::class, 'store'])->name('academic-year.store');
        // academic year -> view
        Route::get('academic-year/view', [AcademicYearController::class, 'index'])->name('academic-year.index');
        // academic year -> delete
        Route::get('academic-year/delete/{id}', [AcademicYearController::class, 'destroy'])->name('academic-year.delete');
        // academic year -> edit
        Route::get('academic-year/edit/{id}', [AcademicYearController::class, 'edit'])->name('academic-year.edit');
        // academic year -> update
        Route::post('academic-year/update', [AcademicYearController::class, 'update'])->name('academic-year.update');

        // Annoucement Managment
        // announcement -> create
        Route::get('announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
        // announcement -> store
        Route::post('announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
        // announcement -> view
        Route::get('announcement/view', [AnnouncementController::class, 'index'])->name('announcement.view');
        // announcement -> delete
        Route::get('announcement/delete/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.delete');
        // announcement -> edit
        Route::get('announcement/edit/{id}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
        // announcement -> update
        Route::post('announcement/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');

        // Major Data Managment
        // major  -> create
        Route::get('major/create', [MajorController::class, 'create'])->name('major.create');
        // major  -> store
        Route::post('major/store', [MajorController::class, 'store'])->name('major.store');
        // major  -> view
        Route::get('major/view', [MajorController::class, 'index'])->name('major.index');
        // major  -> delete
        Route::get('major/delete/{id}', [MajorController::class, 'destroy'])->name('major.delete');
        // major  -> edit
        Route::get('major/edit/{id}', [MajorController::class, 'edit'])->name('major.edit');
        // major  -> update
        Route::post('major/update', [MajorController::class, 'update'])->name('major.update');

        // communities Data Managment
        // communities  -> create
        Route::get('communittee/create', [CommunitiesController::class, 'create'])->name('communities.create');
        // // communities data  -> create
        // Route::get('communittee-data/create', [CommunitiesDataController::class, 'create'])->name('communities-data.create');
        // communities  -> store
        Route::post('communittee/store', [CommunitiesController::class, 'store'])->name('communities.store');
        // communities  -> view
        Route::get('communities/view', [CommunitiesController::class, 'index'])->name('communities.index');
        // communities  -> delete
        Route::get('communittee/delete/{id}', [CommunitiesController::class, 'destroy'])->name('communities.delete');
        // communities  -> edit
        Route::get('communittee/edit/{id}', [CommunitiesController::class, 'edit'])->name('communities.edit');
        // communities  -> update
        Route::post('communittee/update', [CommunitiesController::class, 'update'])->name('communities.update');

        // Student Managment
        // Student -> create
        Route::get('sut-student/create', [StudentDataController::class, 'create'])->name('sut-student.create');
        // Student -> store
        Route::post('sut-student/store', [StudentDataController::class, 'store'])->name('sut-student.store');
        // Student -> view
        Route::get('sut-student/view', [StudentDataController::class, 'index'])->name('sut-student.index');
        // Student -> delete
        Route::get('sut-student/delete/{id}', [StudentDataController::class, 'destroy'])->name('sut-student.delete');
        // Student -> edit
        Route::get('sut-student/edit/{id}', [StudentDataController::class, 'edit'])->name('sut-student.edit');
        // Student -> update
        Route::post('sut-student/update', [StudentDataController::class, 'update'])->name('sut-student.update');

        // Student Managment
        // Student -> create
        Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
        // Student -> store
        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
        // Student -> view
        Route::get('student/view', [StudentController::class, 'index'])->name('student.index');
        // Student -> delete
        Route::get('student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
        // Student -> edit
        Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        // Student -> update
        Route::post('student/update/{id}', [StudentController::class, 'update'])->name('student.update');

        // boardmember Managment
        // boardmember -> create
        Route::get('boardmember/create', [BoardMemberController::class, 'create'])->name('boardmember.create');
        // boardmember -> store
        Route::post('boardmember/store', [BoardMemberController::class, 'store'])->name('boardmember.store');
        //  // boardmember -> view`
        Route::get('boardmember/view', [BoardMemberController::class, 'index'])->name('boardmember.index');
        //  // boardmember -> delete
        Route::get('boardmember/delete/{id}', [BoardMemberController::class, 'destroy'])->name('boardmember.delete');
        // boardmember -> edit
        Route::get('boardmember/edit/{id}', [BoardMemberController::class, 'edit'])->name('boardmember.edit');
        // boardmember -> update
        Route::post('boardmember/update/{id}', [BoardMemberController::class, 'update'])->name('boardmember.update');
    });
});

Route::group(['prefix' => 'member'], function () {

    // guest
    Route::group(['middleware' => 'member.guest'], function () {
        // login
        Route::get('login', [MemberController::class, 'index'])->name('member.login');
        // login authenticate
        Route::post('authenticate', [MemberController::class, 'authenticate'])->name('member.authenticate');
    });

    // auth
    Route::group(['middleware' => 'member.auth'], function () {
        // logout
        Route::get('logout', [MemberController::class, 'logout'])->name('member.logout');
        // dashboard
        Route::get('dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
        // change password
        Route::get('change-password', [MemberController::class, 'changePassword'])->name('member.changePassword');
        Route::post('update-password', [MemberController::class, 'updatePassword'])->name('member.updatePassword');
        // Student -> view
        Route::get('student-attendance/view', [StudentDataController::class, 'dell_event_attebdance_member'])->name('member.dell-event-attendance.data');
        // Student -> view
        Route::post('student-attendance/update', [StudentDataController::class, 'updateAttendance'])->name('member.updateAttendance');
    });
});

Route::group(['prefix' => 'boardmember'], function () {

    // guest
    Route::group(['middleware' => 'boardmember.guest'], function () {
        // // login
        Route::get('login', [BoardMemberController::class, 'login'])->name('boardmember.login');
        // // login authenticate
        Route::post('authenticate', [boardMemberController::class, 'authenticate'])->name('boardmember.authenticate');
        // forget password
        // landing page
    });

    // auth
    Route::group(['middleware' => 'boardmember.auth'], function () {
        // logout
        Route::get('logout', [boardMemberController::class, 'logout'])->name('boardmember.logout');
        // dashboard
        Route::get('dashboard', [boardMemberController::class, 'dashboard'])->name('boardmember.dashboard');
        // // change password
        // Route::get('change-password', [boardMemberController::class, 'changePassword'])->name('boardmember.changePassword');
        // Route::post('update-password', [boardMemberController::class, 'updatePassword'])->name('boardmember.updatePassword');

        // Student Data Management for Board Members
        // Student -> create
        Route::get('sut-student/create', [StudentDataController::class, 'create'])->name('boardmember.sut-student.create');
        // Student -> store
        Route::post('sut-student/store', [StudentDataController::class, 'store'])->name('boardmember.sut-student.store');
        // Student -> view
        Route::get('sut-student/view', [StudentDataController::class, 'index'])->name('boardmember.sut-student.index');
        // Student -> delete
        Route::get('sut-student/delete/{id}', [StudentDataController::class, 'destroy'])->name('boardmember.sut-student.delete');
        // Student -> edit
        Route::get('sut-student/edit/{id}', [StudentDataController::class, 'edit'])->name('boardmember.sut-student.edit');
        // Student -> update
        Route::post('sut-student/update', [StudentDataController::class, 'update'])->name('boardmember.sut-student.update');

        // Dell Event Attendance Management for Board Members
        // Student -> view
        Route::get('student-attendance/view', [StudentDataController::class, 'dell_event_attebdance_boardmember'])->name('boardmember.dell-event-attendance.data');
        // Student -> view
        Route::post('student-attendance/update', [StudentDataController::class, 'updateAttendance'])->name('boardmember.updateAttendance');
    });
});
