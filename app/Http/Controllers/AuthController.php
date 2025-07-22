<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function submit_login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:100',
            'password' => 'required',
        ]);

        // $remember = !empty($request->remember) ? true : false;

        $result = Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        if ($result) {
            // return redirect()->back()->with('success','Login successful');
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
