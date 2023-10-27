<?php

use App\Http\Controllers\Admin\AdminCompanyController;
use App\Models\Job;
use App\Models\User;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobseekerDashboard;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\JobapplicationController;
use App\Http\Controllers\Jobseeker\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\jobseeker\EducationController;
use App\Http\Controllers\jobseeker\ExperinceController;
use App\Http\Controllers\jobseeker\PortfolioController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StartupController;
use App\Models\Category;

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
    $user=User::count();
     if($user == 0){
       return view('auth.adminregister');
        }
        else{
          $jobs=Job::query()->where("status","!=",-1)->orderBy("created_at","desc")->limit(5)->get();
          $categories=Category::query()->orderBy("created_at","desc")->get();
    return view('home',compact("jobs","categories"));
        }
    
});

Route::get('/job/share/{id}', [JobsController::class,"share"])->name('job.share');

Route::get("jobs",[JobsController::class,"alljobs"])->name("alljobs");
Route::post("adminRegister",[RegisteredUserController::class,"adminregister"])->name("adminRegister");

Route::get('/Terms-of-service-and-policies',function(){
    return view('policies');
})->name('policies');

Route::get("freelancer",[FreelancerController::class,"index"])->name("freelancer");
Route::get("profile/{id}/{firstname}",[FreelancerController::class,"profile"])->name("profile");
Route::get("FAQ",function(){
    return view('faq');
});

Route::middleware('auth')->group(function () {
    Route::get("job/{slug}/{id}",[JobsController::class,"jobdeatils"])->name("jobdetail");
    Route::post("JobApplication",[JobsController::class,"jobapplication"])->name("job.JobApplication");
    Route::group(['middleware' => ['role:startup']], function () {
        // Routes accessible only by users with the 'startup' role
        Route::get('startup/dashboard', function () {
            return view('startup.dashboard');
        })->name('startup.dashboard');

        Route::get("My-job",[JobsController::class,"index1"])->name("startup.job");
        Route::get("job/post",[JobsController::class,"PostJob"])->name("startup.postjob");
        Route::post("job/post",[JobsController::class,"store"])->name("startup.postjob");

    });

    //route accesible only by admin
    Route::group(["middleware"=>["role:admin"]],function(){
           Route::get('admin/dashboard',[AdminDashboardController::class,"index"])->name("admin.dashboard");
           Route::get("category",[CategoryController::class,"index"])->name("admin.category");
           Route::post("category",[CategoryController::class,"addcategory"])->name("admin.addCategory");
           Route::get("companys",[AdminCompanyController::class,"index"])->name("admin.company");
           Route::get('/company-detail/{id}/{name}',[AdminCompanyController::class,"companyDetail"])->name("admin.companydetail");
           Route::get("startup-detail/{id}/{name}",[StartupController::class,"startupDetail"])->name("admin.startupDetail");
           Route::post("approve-company",[AdminCompanyController::class,"ApproveCompany"])->name("admin.ApproveCompany");
           Route::post("delete-company",[AdminCompanyController::class,"deleteCompany"])->name("admin.deleteCompany");
           Route::post("restrict-acccount",[AdminCompanyController::class,"restrictCompany"])->name("admin.RestrictCompany");
           Route::get("startUp",[StartupController::class,"index"])->name("admin.startUp");
    });



    //company
    Route::group(["middleware"=>["role:company"]],function(){
            Route::get("company/dashboard",function(){
                return view("company.dashboard");
            })->name("company.dashboard");
            Route::get("company/my-job",[JobsController::class,"index2"])->name("company.job");
            Route::get("c-job/post",[JobsController::class,"companyPostJob"])->name("company.postjob");
            Route::post("c-job/post",[JobsController::class,"store"])->name("company.postjob");
            Route::post('/companyDeleteJob',[JobsController::class,'DeleteJob'])->name('companyDeleteJob');
            Route::get('/jobs/{id}/edit', [JobsController::class, 'editJob'])->name('editJob');
          Route::post('/jobs/{id}/update', [JobsController::class, 'updateJob'])->name('updateJob');

    });


    //jobseeker

    Route::group(["middleware"=>["role:jobseeker"]],function(){

        Route::get("jobseeker/dashboard",[JobseekerDashboard::class,"index"])->name("jobseeker.dashboard");

        Route::get("my-application",[JobapplicationController::class,"application"])->name("myApplication");
        Route::post("delete-application/{jobid}/{app_id}",[JobapplicationController::class,"deleteApplication"])->name("delete.application");
        Route::get("my-profile/education",[ProfileController::class,"index"])->name("my-profile");
        Route::get("my-profile/experience",[ProfileController::class,"index"])->name("my-profile");
        Route::get("my-profile/basic-profile",[ProfileController::class,"index"])->name("my-profile");
        Route::post("my-profile",[ProfileController::class,"editprofile"])->name("editprofile");
        Route::post("education",[EducationController::class,"store"])->name("jobseeker.education");
        Route::post("delete-education",[EducationController::class,"delete"])->name("delete.education");

        Route::post("experience",[ExperienceController::class,"store"])->name("jobseeker.experience");
        Route::post("delete-experience",[ExperienceController::class,"delete"])->name("delete.experience");
        Route::get("add-portfolio",[PortfolioController::class,"index"])->name("jobseeker.addportfolio");
        Route::post("add-portfolio",[PortfolioController::class,"store"])->name("jobseeker.addportfolio");
        Route::get("my-portfolio",[PortfolioController::class,"viewPortfollio"])->name("jobseeker.viewPortfolio");
        Route::post("delete-portfolio",[PortfolioController::class,"deletePortfolio"])->name("delete.portfolio");

    });
});











require __DIR__.'/auth.php';
