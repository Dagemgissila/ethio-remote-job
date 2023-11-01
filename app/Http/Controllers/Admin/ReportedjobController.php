<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\ReportedJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportedjobController extends Controller
{
    public function index(){
        $reports=ReportedJob::all();
        return view("admin.reportedjob",compact("reports"));
    }

    public function reportjob(Request $request){
        $request->validate([
            "description"=>["required","max:150","string"],
            "job_id"=>["required"]
        ]);

        $report=new ReportedJob;
        $report->user_id=auth()->user()->id;
        $report->job_id=$request->job_id;
        $report->description=$request->description;
        $report->save();

        return back()->with("success","you report this job succesfully");
    }

    public function blockJob(Request $request){
        $request->validate([
            "job_id"=>['required']
        ]);

        Job::whereId($request->job_id)->update([
            "status"=>0
        ]);

        return back()->with("success","You blocked the job succesfully");
    }

    public function unblockJob(Request $request){
        $request->validate([
            "job_id"=>['required']
        ]);

        Job::whereId($request->job_id)->update([
            "status"=>1
        ]);

        return back()->with("success","You unblocked the job succesfully");
    }
}
