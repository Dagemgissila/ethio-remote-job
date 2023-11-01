<?php

namespace App\Http\Controllers\Startup;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;

class StartupJobController extends Controller
{
    public function deletejob(Request $request){
        $job=Job::find($request->job_id);
        if($job->user_id != auth()->user()->id){
            return back()->with("error","you are authorized to delete this job");
        }
        if($job){
              $job->delete();
              return back()->with("success","the job deletd succesfully");
        }

    }

    public  function postjob(Request $request){
        $request->validate([
             "job_title"=>["required","string","max:255"],
             "salary"=>["required","string","max:255"],
             'deadline' => [
               'required',
               'string',
               'date',
               function ($attribute, $value, $fail) {
                   $deadlineDate = Carbon::createFromFormat('Y-m-d', $value);
                   $todayDate = Carbon::now();
   
                   if ($deadlineDate->isAfter($todayDate)) {
                       return true;
                   }
   
                   $fail('The deadline must be greater than today\'s date.');
               },
           ],
             "description"=>["required","string","max:255"],
             "requirement"=>["required","string","max:255"],
             "category"=>["required","string"]
        ]);
        

        $job=new Job;
        $job->user_id=auth()->user()->id;
        $job->category_id=$request->category;
        $job->job_title=$request->job_title;
        $job->salary=$request->salary;
        $job->description=$request->description;
        $job->requirement=$request->requirement;
        $job->deadline=$request->deadline;
        $job->status=1;
             // Fetch the business name from the startup relation
         if(auth()->user()->roles->pluck("name")->first() == "startup"){
           $businessName = auth()->user()->startup->business_name;
         }
         elseif(auth()->user()->roles->pluck("name")->first() == "company"){
           $businessName=auth()->user()->company->company_name;
         }
     
        // Generate the slug using business name, job title, and posted day
        $slug = Str::slug($businessName . ' ' . $request->job_title . ' ' . now()->format('Y-m-d'));
        $job->slug = $slug;
        $job->save();
        return redirect()->route("startup.job")->with("success","You Poste Job Successfully");

}

public function editjob($id,$title){
  $job=Job::find($id);
  if($job->user_id != auth()->user()->id){
       return back()->with("error","You are not authorized to edit this job");
  }

  if($job){
    $categories=Category::query()->orderBy("created_at","desc")->get();
    return view("startup.job.edit",compact("job","categories"));
  }
}

public function updatejob(Request $request,$id){

  $request->validate([
    "job_title"=>["required","string","max:255"],
    "salary"=>["required","string","max:255"],
    'deadline' => [
      'required',
      'string',
      'date',
      function ($attribute, $value, $fail) {
          $deadlineDate = Carbon::createFromFormat('Y-m-d', $value);
          $todayDate = Carbon::now();

          if ($deadlineDate->isAfter($todayDate)) {
              return true;
          }

          $fail('The deadline must be greater than today\'s date.');
      },
  ],
    "description"=>["required","string","max:255"],
    "requirement"=>["required","string","max:255"],
    "category"=>["required","string"]
]);

Job::whereId($id)->update([
  'job_title'=>$request->job_title,
  'salary'=>$request->salary,
  "description"=>$request->description,
  "requirement"=>$request->requirement,
  "deadline"=>$request->deadline,
  "category_id"=>$request->category

]);

return redirect()->route("startup.job")->with("success","Updated succesfully");


}
public function viewApplication($id,$slug){
        
  $applications=jobApplication::query()->where("job_id", $id)->get();
   return view("startup.job.application",compact("applications"));
  
}

public function changePass(){
  return view("startup.changepassword");
}


    
}
