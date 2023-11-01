<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\Startup;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
     public function index(){
       $company=Company::count();
       $user=User::count();
       $freelancer=Freelancer::count();
       $startup=Startup::count();
       $jobs=Job::count();
       $blocked=User::query()->where("status",0)->count();
        return view("admin.dashboard",compact("company","user","freelancer","startup","jobs","blocked"));
     }
}
