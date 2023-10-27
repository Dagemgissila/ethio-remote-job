<?php

namespace App\Http\Controllers\Jobs;

use Carbon\Carbon;
use App\Models\Job;
use Jorenvh\Share\Share;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


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

    public function jobdeatils($slug,$id)
    {
        $job = Job::query()->where("slug", $slug)->where("id",$id)->first();
        
         if($job){
            $shareButton = \Share::currentPage(
                "job Title : $job->job_title,description : $job->description" ,
                  
             )
                 ->facebook()
                 ->telegram()
                 ->linkedin();
         
             return view("jobdetail", compact("job", "shareButton"));
         }

         abort(404);
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


    public function share($id)
    {
        $job = Job::findOrFail($id);

        // Generate the URL for sharing the job post
        $shareUrl = URL::route('job.show', ['id' => $job->id]);

        // Redirect to the respective social media platform's share page
        return Redirect::away($shareUrl);
    }


    public function jobapplication(Request $request){
        
         $this->validate($request,[
            'application'=>"required|string|max:1000"
         ]);

         $job=JobApplication::query()->where("freelancer_id",auth()->user()->freelancer->id)
              ->where("job_id",$request->job_id)->first();
              if($job){
                return back()->with("error","you already applied for this job");
              }

         JobApplication::create([
             "freelancer_id"=>auth()->user()->freelancer->id,
             "job_id"=>$request->job_id,
             "description"=>$request->application
         ]);

         return back()->with("success","succesfully applied job");
        
    }

    public function DeleteJob(Request $request){
        $this->validate($request,[
            'job_id'=>'required'
        ]);
        $job=Job::find($request->job_id);
        $job->delete();
        return back()->with("success","Deleted Succesfully");
        
    }

    public function editJob($id)
    {
        $job = Job::find($id);

        // Check if the job exists
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found');
        }

        // Check if the authenticated user owns the job
        if ($job->user_id !== Auth::user()->id) {
            return redirect()->back()->with('error', 'You are not authorized to edit this job');
        }

        // Return the view for editing the job
        return view('company.job.edit', compact('job'));
    }
    public function updateJob(Request $request, $id)
    {
        $job = Job::find($id);

        // Check if the job exists
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found');
        }

        // Check if the authenticated user owns the job
        if ($job->user_id !== Auth::user()->id) {
            return redirect()->back()->with('error', 'You are not authorized to update this job');
        }

        // Validate the request data
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

        // Update the job with the new data
       $job->update([
    "job_title" => $request->job_title,
    "salary" => $request->salary,
    "deadline" => $request->deadline,
    "description" => $request->description,
    "requirement" => $request->requirement
]);

        // Redirect back to the job list with a success message
        return redirect()->route('company.job')->with('success', 'Job updated successfully');
    }
}
