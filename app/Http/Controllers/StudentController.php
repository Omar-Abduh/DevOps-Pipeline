<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with(['academicYear', 'majorName'])->where('role', 'member')->latest('id');

        if ($request->filled('academic_year_id')) {
            $query->where('academic_year_id', $request->get('academic_year_id'));
        }
        if ($request->filled('major_id')) {
            $query->where('major_id', $request->get('major_id'));
        }

        $members = $query->get();
        $data['members'] = $members;
        $data['academic_year'] = AcademicYear::all();
        $data['majors'] = Major::all();
        return view('admin.student.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['academic_years'] = AcademicYear::get();
        $data['majors'] = Major::get();
        return view('admin.student.student', $data);
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
        $data->dob = $request->dob;
        $data->mobno = $request->mobno;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role = 'member';
        $data->save();
        return redirect()->route('student.index')->with('success', 'Student Added Successfully');
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
        $data['student'] = $user->find($id);
        $data['academic_years'] = AcademicYear::all();
        $data['majors'] = Major::all();
        return view('admin.student.edit', $data);
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
        $data->dob = $request->dob;
        $data->mobno = $request->mobno;
        $data->email = $request->email;
        $data->update();
        return redirect()->route('student.index')->with('success','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $data = $user->find($id);
        $data->delete();
        return redirect()->route('student.index')->with('success', 'Student Data Deleted Successfully');
    }
}
