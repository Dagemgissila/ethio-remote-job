<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            "job_position"=>"required|string|max:255",
            "company_name"=>"required|string|max:255",
            "start_date"=>"required|string|max:255",
            "end_date"=>"required|string|max:255",
            "description"=>"required|string|max:255"
        ]);

        Experience::create([
            "freelancer_id"=>auth()->user()->freelancer->id,
            "job_position"=>$request->job_position,
            "company_name"=>$request->company_name,
            "start_date"=>$request->start_date,
            "end_date"=>$request->end_date,
            "description"=>$request->description
        ]);

        return back()->with("success"," experience added succesfully");
    }

    public function delete(Request $request){
        $exp=Experience::find($request->id);
        $exp->delete();

        return back()->with("success","education history deleted succesfully");
    }
}
