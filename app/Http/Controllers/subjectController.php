<?php

namespace App\Http\Controllers;

use App\Models\AssignClassSubject;
use App\Models\Classs;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class subjectController extends Controller
{
    public function all_subject()
    {
        $subject = Subject::all();
        return view("main.subject.all-subject",compact('subject'));
    }
    public function new_subject()
    {
        return view("main.subject.new-subject");
    }
    public function add_subject(Request $request)
    {
        $request->validate([
            "subjectname" => "required|string"
        ]);
        $create = Subject::create([
            "name" => $request->subjectname,
            "unique_id" => uniqid(),
        ]);
        if (!$create) {
            return redirect()->back()->with("error", "Error Occured");
        }
        return redirect()->route('all-subject')->with("success", "Subject Created successfully");
    }
    public function edit_subject(string $id)
    {
        $subjects = Subject::where("unique_id",$id)->first();
        // return $subject;
        return view("main.subject.edit-subject",compact("subjects"));
    }
    public function update_subject(string $id,Request $request)
    {
        $request->validate([
            "subjectname"=>"required|string",
        ]);
        
        Subject::where("unique_id",$id)->update(["name"=>$request->subjectname]);
        return redirect()->route("all-subject")->with("success","Subject Updated Successfully");
    }
    public function delete_subject(string $id)
    {
        Subject::where("unique_id",$id)->delete();
        return redirect()->route("all-subject")->with("success","Subject Deleted successfully");
    }

    
    // for assign class to subjects only
    public function all_assign()
    {
        $all_assign = AssignClassSubject::with(["subjects","classes"])->get();
        // return $all_assign;
        return view("main.assign_class_subject.all-assign-subject",compact("all_assign"));
    }
    public function new_assign()
    {
        $class=Classs::all();
        $subject=Subject::all();
        return view("main.assign_class_subject.new-assign",compact("class","subject"));
    }
    public function new_assign_subject(Request $request)
    {
        $request->validate([
            "classname"=>"required",
            "subject"=>"required"
        ]);
            foreach($request->subject as $sub)
            {
                AssignClassSubject::create([
                    "class_id"=>$request->classname,
                    "subject_id"=>$sub,
                    "unique_id"=>uniqid()
                ]);
            }
        return redirect()->route("all-assign")->with("success","Subject Assigned to class successfully");
    }
    public function delete_assign(string $id)
    {
        AssignClassSubject::where("unique_id",$id)->delete();
        return redirect()->back()->with("success","Assigned Class deleted successfully");
    }
}
