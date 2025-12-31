<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use Illuminate\Http\Request;

class classController extends Controller
{
    public function all_class()
    {
        $classes = Classs::get();

        return view("main.classes.all-class",compact('classes'));
    }
    public function new_class()
    {
        return view("main.classes.new-class");
    }
    public function add_class(Request $request)
    {
        $request->validate([
            "classname"=>"required|string"
        ]);
        $create = Classs::create([
            "name"=>$request->classname,
            "unique_id"=>uniqid(),
        ]);
        if(!$create)
        {
            return redirect()->back()->with("error","Error Occured");
        }
        return redirect()->route('all-class')->with("success","Class Created successfully");
    }
    public function edit_class(string $id)
    {
        $class = Classs::where('unique_id','=',$id)->first();
        return view("main.classes.edit-class",compact("class"));
    }
    public function update_class(string $id,Request $request)
    {
        $request->validate([
            "classname"=>"required|string",
            "status"=>"required",
        ]);

        Classs::where("unique_id",$id)->update(["name"=>$request->classname,"status"=>$request->status]);

        return redirect()->route('all-class')->with("success",'Class Updated Successfully');
    }
    public function delete_class(string $id)
    {
        Classs::where('unique_id',$id)->delete();

        return redirect()->route("all-class")->with("success",'Class Deleted Successfully');
    }
}
