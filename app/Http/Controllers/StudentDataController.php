<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\StudentData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StudentDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['student'] = StudentData::get();

        if (auth()->guard('boardmember')->check()) {
            return view('boardmember.sut_student.data', $data);
        }

        return view('admin.sut_student.data', $data);
    }

    public function dell_event_attebdance()
    {
        $data['students'] = StudentData::get();

        // if (auth()->guard('boardmember')->check()) {
        //     return view('boardmember.attendance.data', $data);
        // }

        return view('admin.sut_student.data', $data);
    }
    
    public function dell_event_attebdance_boardmember()
    {
        $data['students'] = StudentData::get();

        return view('boardmember.attendance.data', $data);
    }

    public function dell_event_attebdance_member()
    {
        $data['students'] = StudentData::get();

        return view('member.attendance.data', $data);
    }

    public function updateAttendance(Request $request)
    {
        $student = StudentData::find($request->student_id);
        if ($student) {
            $student->{$request->field} = $request->value;
            $student->save();
            return Response::json(['success' => true]);
        }
        return Response::json(['success' => false], 400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['academic_year'] = AcademicYear::get();

        // Redirect based on the guard
        if (auth()->guard('boardmember')->check()) {
            return view('boardmember.sut_student.create', $data);
        }

        return view('admin.sut_student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:student_data,student_id',
            'name' => 'required',
            'email' => 'required|email|unique:student_data,email',
            'year' => 'required',
        ]);
        $data = new StudentData;
        $data->student_id = $request->student_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->academic_year = $request->year;
        $data->save();

        // Redirect based on the guard
        if (auth()->guard('boardmember')->check()) {
            return redirect()->route('boardmember.sut-student.index')->with('success', 'Student Added Successfully');
        }

        return redirect()->route('sut-student.index')->with('success', 'Student Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentData $studentData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentData $studentData, $id)
    {
        $data['student'] = $studentData->find($id);
        $data['academic_year'] = AcademicYear::get();

        if (auth()->guard('boardmember')->check()) {
            return view('boardmember.sut_student.edit', $data);
        }

        return view('admin.sut_student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentData $studentData)
    {
        $data = $studentData->find($request->id);
        $data->student_id = $request->student_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->academic_year = $request->year;
        $data->update();

        if (auth()->guard('boardmember')->check()) {
            return redirect()->route('boardmember.sut-student.index')->with('success', 'Student Updated Successfully');
        }

        return redirect()->route('sut-student.index')->with('success', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentData $studentData, $id)
    {
        $data = $studentData->find($id);
        $data->delete();
        if (auth()->guard('boardmember')->check()) {
            return redirect()->route('boardmember.sut-student.index')->with('success', 'Student Data Deleted Successfully');
        }
        return redirect()->route('sut-student.index')->with('success', 'Student Data Deleted Successfully');
    }
}
