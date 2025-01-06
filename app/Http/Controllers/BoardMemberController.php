<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Announcement;
use App\Models\Communities;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BoardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with(['academicYear', 'majorName', 'CommunitiesName'])->where('role', 'boardmember')->latest('id');

        if ($request->filled('academic_year_id')) {
            $query->where('academic_year_id', $request->get('academic_year_id'));
        }
        if ($request->filled('major_id')) {
            $query->where('major_id', $request->get('major_id'));
        }

        $boardmember = $query->get();
        $data['boardmembers'] = $boardmember;
        $data['academic_year'] = AcademicYear::all();
        $data['majors'] = Major::all();
        $data['communities'] = Communities::all();
        return view('admin.boardmember.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['academic_years'] = AcademicYear::get();
        $data['majors'] = Major::get();
        $data['communittes'] = Communities::get();
        return view('admin.boardmember.boardmember', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'academic_year_id' => 'required',
            'admission_date' => 'required',
            'name' => 'required',
            'sut_id' => 'required|unique:users,sut_id',
            'major_id' => 'required',
            'communittee_name' => 'required',
            'communittee_position' => 'required',
            'dob' => 'required',
            'mobno' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->academic_year_id = $request->academic_year_id;
        $data->admission_date = $request->admission_date;
        $data->sut_id = $request->sut_id;
        $data->major_id = $request->major_id;
        $data->communities_id = $request->communittee_name;
        $data->communittee_position = $request->communittee_position;
        $data->dob = $request->dob;
        $data->mobno = $request->mobno;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role = 'boardmember';
        $data->save();
        return redirect()->route('boardmember.index')->with('success', 'Board Memeber Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(StudentData $studentData)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $data['boardmember'] = $user->find($id);
        $data['academic_years'] = AcademicYear::all();
        $data['majors'] = Major::all();
        $data['communittes'] = Communities::get();
        return view('admin.boardmember.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        $data = $user->find($id);
        $data->name = $request->name;
        $data->academic_year_id = $request->academic_year_id;
        $data->admission_date = $request->admission_date;
        $data->sut_id = $request->sut_id;
        $data->major_id = $request->major_id;
        $data->communities_id = $request->communittee_id;
        $data->communittee_position = $request->communittee_position;
        $data->dob = $request->dob;
        $data->mobno = $request->mobno;
        $data->email = $request->email;
        $data->update();
        return redirect()->route('boardmember.index')->with('success','Board Member Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $data = $user->find($id);
        $data->delete();
        return redirect()->route('boardmember.index')->with('success', 'Board Member Data Deleted Successfully');
    }

    public function login()
    {
        return view('boardmember.login');
    }

    // login -> authenticate
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('boardmember')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('boardmember')->user()->role != 'boardmember') {
                Auth::guard('boardmember')->logout();
                return redirect()->route('boardmember.login')->with('error', 'Unauthorized user. Access denied!');
            }
            return redirect()->route('boardmember.dashboard');
        } else {
            return redirect()->route('boardmember.login')->with('error', 'Something Went Wrong');
        }
    }

    // dashboard
    public function dashboard()
    {
        $data['announcements'] = Announcement::where(function ($query) {
            $query->where('type', 'boardmember')
                ->orWhere('type', 'all');
        })->latest()->limit(1)->get();
        return view('boardmember.dashboard', $data);
    }

    // logout
    public function logout()
    {
        Auth::guard('boardmember')->logout();
        return redirect()->route('boardmember.login')->with('success', 'Logged out successfully');
    }
}
