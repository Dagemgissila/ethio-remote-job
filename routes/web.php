<?php

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Jobs\JobsController;

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
    Route::group(['middleware' => ['role:startup']], function () {
        // Routes accessible only by users with the 'startup' role
        Route::get('/startup/dashboard', function () {
            return view('startup.dashboard');
        })->name('startup.dashboard');

        Route::get("My-job",[JobsController::class,"index1"])->name("startup.job");
        Route::get("job/post",[JobsController::class,"PostJob"])->name("startup.postjob");
        Route::post("job/post",[JobsController::class,"store"])->name("startup.postjob");

    });
});

Route::group(['middleware' => ['role:company']], function () {
    // Routes accessible only by users with the 'admin' role
    Route::get("/company/dashboard",function(){
        dd("me");
    })->name("dashboard");
});

Route::group(['middleware' => ['role:company']], function () {
    // Routes accessible only by users with the 'admin' role
    Route::get("/me",function(){
        dd("me");
    })->name("dashboard");
});









require __DIR__.'/auth.php';
