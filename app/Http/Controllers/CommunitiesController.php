<?php

namespace App\Http\Controllers;

use App\Models\Communities;
use Illuminate\Http\Request;

class CommunitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['communities'] = Communities::get();
        return view('admin.communities.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.communities.committee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $data = new Communities;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('communities.index')->with('success','Communittee Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Communities $communities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Communities $communities, $id)
    {
        $data['communities'] = $communities->find($id);
        return view ('admin.communities.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Communities $communities)
    {
        $data = $communities->find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('communities.index')->with('success','Communittee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Communities $communities, $id)
    {
        $data = $communities->find($id);
        $data->delete();
        return redirect()->route('communities.index')->with('success','Communittee Deleted Successfully');
    }
}
