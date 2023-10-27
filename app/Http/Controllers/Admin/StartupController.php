<?php

namespace App\Http\Controllers\Admin;

use App\Models\Startup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StartupController extends Controller
{
    //
    public function index(){
        $startups=Startup::all();
        return view("admin.startup.startup",compact("startups"));
    }

    public function startupDetail($id){
        $startup=Startup::find($id);

        if($startup){
            return view("admin.startup.startupDetail",compact("startup"));
        }
    }
}
