<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use App\Models\StudentAcademicHistory;
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
    public function year_upgrade()
    {
        $class = Classs::all();
        return view("main.year_upgrade.year-grade",compact('class'));
    }
    public function year_upgrades(Request $request)
    {
        $request->validate([
            "classto"=>"required",
            "classfrom"=>'required',
            "academic_year_from"=>'required',
            "academic_year_to"=>'required',
        ]);
        if($request->classto == $request->classfrom )
        {
            return redirect()->back()->with("error","Both class or academic year must not same");
        }
        
        $classData = StudentAcademicHistory::where("class_id",$request->classfrom)->where("academic_year",$request->academic_year_from)->get();
        $uniqueIds = $classData->pluck('student_id')->toArray();
        foreach ($uniqueIds as $studentId) {
            StudentAcademicHistory::create([
                'student_id'    => $studentId,
                'academic_year' => $request->academic_year_to,
                'class_id'      => $request->classto,
                'unique_id'     => uniqid(),
            ]);
        }
        return redirect()->back()->with("success","Student Promoted Successfully to upper class");
    }
}
