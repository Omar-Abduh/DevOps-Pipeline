<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['announcements'] = Announcement::latest()->get();
        return view('admin.announcement.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'type' => 'required',
        ]);

        $announcement = new Announcement();
        $announcement->message = $request->message;
        $announcement->type = $request->type;
        $announcement->save();
        return redirect()->route('announcement.view')->with('success', 'Announcement broadcast successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement, $id)
    {
        $data['announcement'] = $announcement->find($id);
        return view('admin.announcement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement, $id)
    {
        $data = $announcement->find($id);
        $data->message = $request->message;
        $data->type = $request->type;
        $data->update();
        return redirect()->route('announcement.view')->with('success', 'Announcement broadcast detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement, $id)
    {
        $data = $announcement->find($id);
        $data->delete();
        return redirect()->route('announcement.view')->with('success', 'Announcement Deleted Successfully');
    }
}
