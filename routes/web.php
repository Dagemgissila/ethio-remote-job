<?php

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobseeker\ProfileController;
use App\Http\Controllers\jobseeker\EducationController;
use App\Http\Controllers\jobseeker\ExperinceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $jobs=Job::query()->where("status","!=",-1)->orderBy("created_at","desc")->limit(5)->get();
    return view('home',compact("jobs"));
});

Route::get("jobs",[JobsController::class,"alljobs"])->name("alljobs");


Route::get('/Terms-of-service-and-policies',function(){
    return view('policies');
});

Route::middleware('auth')->group(function () {
    Route::get("job/{slug}",[JobsController::class,"jobdeatils"])->name("jobdetail");
    Route::group(['middleware' => ['role:startup']], function () {
        // Routes accessible only by users with the 'startup' role
        Route::get('startup/dashboard', function () {
            return view('startup.dashboard');
        })->name('startup.dashboard');

        Route::get("My-job",[JobsController::class,"index1"])->name("startup.job");
        Route::get("job/post",[JobsController::class,"PostJob"])->name("startup.postjob");
        Route::post("job/post",[JobsController::class,"store"])->name("startup.postjob");

    });



    //company
    Route::group(["middleware"=>["role:company"]],function(){
            Route::get("company/dashboard",function(){
                return view("company.dashboard");
            })->name("company.dashboard");
            Route::get("company/my-job",[JobsController::class,"index2"])->name("company.job");
            Route::get("c-job/post",[JobsController::class,"companyPostJob"])->name("company.postjob");
            Route::post("c-job/post",[JobsController::class,"store"])->name("company.postjob");
    });


    //jobseeker

    Route::group(["middleware"=>["role:jobseeker"]],function(){

        Route::get("jobseeker/dashboard",function(){
            return view("jobseeker.dashboard");
        })->name("jobseeker.dashboard");

        Route::get("my-profile",[ProfileController::class,"index"])->name("my-profile");
        Route::post("my-profile",[ProfileController::class,"editprofile"])->name("editprofile");
        Route::post("experience",[EducationController::class,"store"])->name("jobseeker.experience");
        Route::post("delete-education",[EducationController::class,"delete"])->name("delete.education");

    });
});











require __DIR__.'/auth.php';
