<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterCompanyController extends Controller
{
    public function index(){
        return view("auth.company");
    }

    public function index2(){
        return view('auth.start-up-register');
    }
}
