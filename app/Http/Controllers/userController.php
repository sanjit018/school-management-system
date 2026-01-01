<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function signin()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response('User not found', 404);
        }

        if (Hash::check($request->password, $user->password)) {
            return redirect()->route('dashboard')->with("success",'Login Successfully');
        } else {
            return response('Invalid password', 401);
        }
    }
    public function dashboard()
    {
        $class=Classs::count();
        $subject=Subject::count();
        $teacher=Teachers::count();
        return view('main.dashboard',compact('class','subject','teacher'));
    }
}
