<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobseekerDashboard extends Controller
{
    public function index(){
        $Jobapplication=JobApplication::query()->where("freelancer_id",auth()->user()->freelancer->id)->count();
        $portfolio=Portfolio::query()->where("freelancer_id",auth()->user()->freelancer->id)->count();
        return view("jobseeker.dashboard",compact("Jobapplication","portfolio"));
    }
}
