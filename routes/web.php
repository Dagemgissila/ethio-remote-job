<?php

use App\Models\Job;
use App\Models\User;
use App\Models\Category;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobseekerDashboard;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\Admin\StartupController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ChangepasswordController;
use App\Http\Controllers\JobapplicationController;
use App\Http\Controllers\CompanydashboardController;
use App\Http\Controllers\Admin\ReportedjobController;
use App\Http\Controllers\Jobseeker\ProfileController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Startup\StartupJobController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\jobseeker\EducationController;
use App\Http\Controllers\jobseeker\ExperinceController;
use App\Http\Controllers\jobseeker\PortfolioController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Company\CompanyProfileController;
use App\Http\Controllers\Startup\StartupprofileController;

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
    Route::post("change-password",[ChangepasswordController::class,"changepassword"])->name("changePassword");

  // Routes accessible only by users with the 'startup' role
    Route::group(['middleware' => ['role:startup']], function () {
      
        Route::get('startup/dashboard', function () {
            $jobs=Job::query()->where("user_id",auth()->user()->id)->count();
            $blockjob=Job::query()->where("user_id",auth()->user()->id)->where("status",0)->count();
            return view('startup.dashboard',compact("jobs","blockjob"));
        })->name('startup.dashboard');

        Route::get("startup/jobs",[JobsController::class,"index1"])->name("startup.job");
        Route::get("job/post",[JobsController::class,"PostJob"])->name("startup.postjob");
        Route::post("job/post",[StartupJobController::class,"postjob"])->name("startup.postjob");
        Route::post("delete-job",[StartupJobController::class,"deletejob"])->name("startup.delete");
        Route::get("edit-job/{id}/{title}",[StartupJobController::class,"editjob"])->name("startup.editjob");
        Route::post("startup/updatejob/{id}",[StartupJobController::class,"updatejob"])->name("startup.updatejob");
        Route::get("startup/change-password",[StartupJobController::class,"changePass"])->name("startup.changepassword");
        Route::get("/startup/application/{id}/{slug}",[StartupJobController::class,"viewApplication"])->name("startup.viewApplication");
        Route::get("startup/profile",[StartupprofileController::class,"index"])->name("startup.profile");
        Route::post("startup/profile",[StartupprofileController::class,"updateProfile"])->name("startup.updateProfile");

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
           Route::get("reported-jobs",[ReportedjobController::class,"index"])->name("admin.reportedJob");
           Route::post("admin/blocke-job",[ReportedjobController::class,"blockJob"])->name("admin.blockJob");
           Route::post("admin/unblock-job",[ReportedjobController::class,"unblockJob"])->name("admin.unblockJob");
    });



    //company
    Route::group(["middleware"=>["role:company"]],function(){
        
            Route::get("company/dashboard",[CompanydashboardController::class,"index"])->name("company.dashboard");
            Route::get("company/my-job",[JobsController::class,"index2"])->name("company.job");
            Route::get("c-job/post",[JobsController::class,"companyPostJob"])->name("company.postjob");
            Route::post("c-job/post",[JobsController::class,"store"])->name("company.postjob");
            Route::post('/companyDeleteJob',[JobsController::class,'DeleteJob'])->name('companyDeleteJob');
            Route::get('/jobs/{id}/edit', [JobsController::class, 'editJob'])->name('editJob');
          Route::post('/jobs/{id}/update', [JobsController::class, 'updateJob'])->name('updateJob');
          Route::get('company/profile',[CompanyProfileController::class,"index"])->name("company.profile");
          Route::post("update-company",[CompanyProfileController::class,"updateProfile"])->name("company.updateProfile");
          Route::get("job/application/{slug}/{id}",[JobsController::class,"viewApplication"])->name("company.viewApplication");
          Route::get("change-password",[ChangepasswordController::class,"Cindex"])->name("company.changePassword");

    });


    //jobseeker

    Route::group(["middleware"=>["role:jobseeker"]],function(){

        Route::get("jobseeker/dashboard",[JobseekerDashboard::class,"index"])->name("jobseeker.dashboard");

        Route::get("my-application",[JobapplicationController::class,"application"])->name("myApplication");
        Route::post("delete-application",[JobapplicationController::class,"deleteApplication"])->name("delete.application");
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
        Route::post("report-job",[ReportedjobController::class,"reportjob"])->name("reportJob");

    });
});





require __DIR__.'/auth.php';
