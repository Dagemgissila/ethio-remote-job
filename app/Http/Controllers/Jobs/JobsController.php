<?php

namespace App\Http\Controllers\Jobs;

use Carbon\Carbon;
use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;


class JobsController extends Controller
{
    public function index1(){
          $jobs=Job::query()->where("user_id",auth()->user()->id)->orderBy("created_at","desc")->get();
    
        return view("startup.job.index",compact("jobs"));
    }
    
    public function index2(){
        $jobs=Job::query()->where("user_id",auth()->user()->id)->orderBy("created_at","desc")->get();
  
      return view("company.job.index",compact("jobs"));
  }
    public function alljobs(){
        $jobs=Job::query()->where("status","!=",-1)->orderBy("created_at","desc")->limit(5)->get();
        return view("alljobs",compact("jobs"));
    }

    public function PostJob(){
        
        return view("startup.job.postjob");
    }

    public function companyPostJob(){
        return view("company.job.postjob");
    }

    public function jobdeatils($slug){
        $job=Job::query()->where("slug",$slug)->first();
       
        return view("jobdetail",compact("job"));
    }

    public  function store(Request $request){
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
                  "requirement"=>["required","string","max:255"]
             ]);
             

             $job=new Job;
             $job->user_id=auth()->user()->id;
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
             return redirect()->route("company.job")->with("success","You Poste Job Successfully");

    }
}
