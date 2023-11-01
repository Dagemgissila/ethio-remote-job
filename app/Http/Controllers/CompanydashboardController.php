<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class CompanydashboardController extends Controller
{
    public function index(){
        $jobs=Job::query()->where("user_id",auth()->user()->id)->count();
        $blockjob=Job::query()->where("user_id",auth()->user()->id)->where("status",0)->count();
        return view("company.dashboard",compact("jobs","blockjob"));
    }
}
