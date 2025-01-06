<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['major'] = Major::get();
        return view('admin.major.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.major.major');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $data = new Major;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('major.index')->with('success','Academic Year Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major, $id)
    {
        $data['major'] = $major->find($id);
        return view ('admin.major.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        $data = $major->find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('major.index')->with('success','Academic Year Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major, $id)
    {
        $data = $major->find($id);
        $data->delete();
        return redirect()->route('major.index')->with('success','Academic Year Deleted Successfully');
    }
}
