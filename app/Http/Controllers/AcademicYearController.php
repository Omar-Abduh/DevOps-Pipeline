<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['academic_year'] = AcademicYear::get();
        return view('admin.academic_year.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.academic_year.academic_year');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $data = new AcademicYear;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('academic-year.index')->with('success','Academic Year Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear, $id)
    {
        $data['academic_year'] = $academicYear->find($id);
        return view ('admin.academic_year.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        $data = $academicYear->find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('academic-year.index')->with('success','Academic Year Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicYear $academicYear, $id)
    {
        $data = $academicYear->find($id);
        $data->delete();
        return redirect()->route('academic-year.index')->with('success','Academic Year Deleted Successfully');
    }
}
