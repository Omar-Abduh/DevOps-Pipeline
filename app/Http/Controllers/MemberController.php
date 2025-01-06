<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.login');
    }

    // login -> authenticate
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('member')->user()->role != 'member') {
                Auth::guard('member')->logout();
                return redirect()->route('member.login')->with('error', 'Unauthorized user. Access denied!');
            }
            return redirect()->route('member.dashboard');
        } else {
            return redirect()->route('member.login')->with('error', 'Something Went Wrong');
        }
    }

    // logout
    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('member.login')->with('success', 'Logged out successfully');
    }
    // dashboard
    public function dashboard()
    {
        $data['announcements'] = Announcement::where(function ($query) {
            $query->where('type', 'member')
                ->orWhere('type', 'all');
        })->latest()->limit(1)->get();
        return view('member.dashboard', $data);
    }

    // change password
    public function changePassword()
    {
        return view('member.change_password');
    }

    // change password -> store
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $user = User::find(Auth::guard('member')->user()->id);

        if (Hash::check($old_password, $user->password)) {
            if (Hash::check($new_password, $user->password)) {
                return redirect()->back()->with('error', 'New password cannot be the same as the old password');
            }
            $user->password = Hash::make($new_password);
            $user->update();
            return redirect()->route('member.changePassword')->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Old password is incorrect');
        }
    }
}
