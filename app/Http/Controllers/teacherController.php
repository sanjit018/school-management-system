<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class teacherController extends Controller
{
    public function add_teacher()
    {
        return view("main.teacher.new-teacher");
    }
    public function new_teacher(Request $request)
    {
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|email",
            "contact"=>"required|numeric|min_digits:10",
            "qualification"=>"required",
            "profile"=>"required"
        ]);
        $imagePath=null;
        if ($request->hasFile('profile')) {
            $imagePath = $request->file('profile')->store('teacher', 'public');
        }
        Teachers::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "contact"=>$request->contact,
            "qualification"=>$request->qualification,
            "profile"=>$imagePath,
            "unique_id"=>uniqid()
        ]);
        // dd($request);
        return redirect()->route("all-teacher")->with("success","Teacher Created Successfully");
    }
    public function all_teacher()
    {
        $teacher=Teachers::all();
        return view("main.teacher.all-teacher",compact("teacher"));
    }
    public function edit_teacher(string $id)
    {
        $teacher = Teachers::where("unique_id",$id)->get();
        return view("main.teacher.edit-teacher",compact("teacher"));
    }
    public function update_teacher(string $id,Request $request)
    {
        
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "contact" => "required|numeric|min_digits:10",
            "qualification" => "required",
        ]);

        $teacher = Teachers::where("unique_id", $id)->firstOrFail();

        // Default → keep old image
        $imagePath = $teacher->profile;

        if ($request->hasFile('profile')) {

            // Delete old image
            if ($teacher->profile && Storage::disk('public')->exists($teacher->profile)) {
                Storage::disk('public')->delete($teacher->profile);
            }

            // Store new image
            $imagePath = $request->file('profile')->store('teacher', 'public');
        }

        $teacher->update([
            "name" => $request->name,
            "email" => $request->email,
            "contact" => $request->contact,
            "qualification" => $request->qualification,
            "profile" => $imagePath,
        ]);

        return redirect()
            ->route("all-teacher")
            ->with("success", "Teacher Updated Successfully");
    }
    public function delete_teacher(string $id)
    {
        Teachers::delete($id);
        return redirect()->back(302)->with("success","Teacher Deleted Successfully");
    }
}
