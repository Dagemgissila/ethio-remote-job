<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    //

    public function index(){
        $freelancers=Freelancer::all();
        return view("freelancer.index",compact("freelancers"));
    }
}
