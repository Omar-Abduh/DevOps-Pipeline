<?php

namespace App\Http\Controllers;

use App\Models\StudentData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // login
    public function index()
    {

        return view('admin.login');
    }

    // login -> authenticate
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::guard('admin')->user()->role != 'admin'){
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'Unauthorized user. Access denied!');
            }
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', 'Something Went Wrong');
        }
    }

    // register
    public function register()
    {
        $user = new User();
        $user->name = 'admin';
        $user->role = 'admin';
        $user->email = 'admin@club.com';
        $user->password = Hash::make('admin');
        $user->save();
        return redirect()->route('admin.login')->with('success', 'User created successfully');
    }

    // logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }
    // dashboard
    public function dashboard()
    {
        $data['total_members'] = User::where('role', 'member')->count();
        $data['total_boardmembers'] = User::where('role', 'boardmember')->count();
        $data['students'] = StudentData::count();

        return view('admin.dashboard', $data);
    }

    // form
    public function form()
    {

        return view('admin.form');
    }

    // table
    public function table()
    {

        return view('admin.table');
    }
}
