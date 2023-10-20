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

    public function profile($id,$firstname){
        $freelancer=Freelancer::find($id);
      
        return view("freelancer.profile",compact("freelancer"));
    }
}
