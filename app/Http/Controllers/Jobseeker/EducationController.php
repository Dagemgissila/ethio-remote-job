<?php

namespace App\Http\Controllers\jobseeker;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    public function store(Request $request){
         $this->validate($request,[
               "degree"=>"required|max:20|string",
               "department"=>"required|max:255|string",
               "university"=>"required|max:255|string",
               "start_date"=>"required|string|max:255",
               "end_date"=>"nullable|string|max:255"
         ]);
         

         $education=new Education;
         $education->freelancer_id=auth()->user()->freelancer->id;
         $education->degree=$request->degree;
         $education->field_of_study=$request->department;
         $education->start_date=$request->start_date;
         $education->description="hi";
         if($request->end_date){
            $education->end_date=$request->end_date;
         }
         $education->save();
         return back()->with("success","Eduaction added succesfully");
        
    }

    public function delete(Request $request){
        $education=Education::find($request->id);
        $education->delete();

        return back()->with("success","education history deleted succesfully");
    }
}
