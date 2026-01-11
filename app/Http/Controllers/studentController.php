<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use App\Models\StudentAcademicHistory;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class studentController extends Controller
{
    public function class_wise()
    {
        $class = Classs::all();
        return view("main.student.class-wise",compact("class"));
    }
    public function class_single(string $id)
    {
        $student=StudentAcademicHistory::with(['students'])->where("class_id",$id)->where("academic_year",date('Y'))->get();
        $class_name=Classs::where("unique_id",$id)->get();
        return view("main.student.all-student",compact('id','student','class_name'));
        // return $class_name;
    }
    public function add_student(string $id)
    {
        $classes = Classs::all();
        return view("main.student.new-student",compact("id","classes"));
    }
    public function new_student(Request $request)
    {
        $request->validate([
            "name"=>"required|string|max:255",
            "mname"=>"required|string|max:255",
            "fname"=>"required|string|max:255",
            "roll_number"=>"required",
            "dob"=>"required|date",
            "admission_date"=>"required|date",
            "contact"=> "required|min_digits:10|unique:students,contact",
            "email"=>"required|email",
            "gender"=>"required|string",
            "class"=>"required",
            "section"=>"required|string",
            "profile"=>"required|image"
        ]);
        $imagePath = null;
        if ($request->hasFile('profile')) {
            $imagePath = $request->file('profile')->store('student', 'public');
        }
        $student=Students::create([
            "name"=>$request->name,
            "mname"=>$request->mname,
            "fname"=>$request->fname,
            "dob"=>$request->dob,
            "contact"=>$request->contact,
            "admission_date"=>$request->admission_date,
            "gender"=>$request->gender,
            "email"=>$request->email,
            "profile"=>$imagePath,
            "unique_id"=>uniqid()
        ]);
        StudentAcademicHistory::create([
            "unique_id"=>uniqid(),
            "student_id"=>$student->unique_id,
            "class_id"=>$request->class,
            "section"=>$request->section,
            "academic_year"=>$request->session,
            "roll_number"=>$request->roll_number,
        ]);
        return redirect()->back()->with("success","Student Created Successfully");
    }
    public function edit_personal(string $id)
    {
        $data = StudentAcademicHistory::with(['students'])->where("unique_id",$id)->get();
        // return $data;
        return view("main.student.edit-student",compact('data'));
    }
    public function update_personal(string $id,Request $request)
    {
        $st_detail=Students::where("unique_id",$id)->get();
        $request->validate([
            "name"=>"required|string",
            "mname"=>"required|string",
            "fname"=>"required|string",
            "contact"=>"required|min_digits:10|unique:students,contact",
            "email"=>"required|email",
            "gender"=>"required",
            "dob"=>"required|date",
        ]);
        if ($request->hasFile('profile')) {

            // Delete old image if exists
            if (!empty($st_detail->profile) && Storage::disk('public')->exists($st_detail->profile)) {
                Storage::disk('public')->delete($st_detail->profile);
            }

            // Upload new image
            $path = $request->file('profile')->store('student', 'public');

            // Update DB field
            $st_detail->profile = $path;
        }
        return $st_detail;
    }
    public function update_academic(string $id,Request $request)
    {
        $request->validate([
            "roll_number"=>"required",
            "academic_year"=>"required",
            "section"=>"required"
        ]);
    }
}

