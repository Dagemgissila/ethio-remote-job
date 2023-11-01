<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {

        $user=User::count();
        if($user == 0){
          return view('auth.adminregister');
           }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

      

        $user = Auth::user();
        $role=$user->roles->pluck("name")->first();
        if($user->status==-1){
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return  Redirect()->route("login")->with("error","Your Account is Not Approved Yet .Please contact admin");
           
         }

         if($user->status==0){
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return  Redirect()->route("login")->with("error","Your Account is Restricted .Please contact admin");
           
         }

         if($role == "startup"){
            $request->session()->regenerate();
            return redirect("/startup/dashboard");
         }
         else if($role == "company"){
            
            $request->session()->regenerate();
            return redirect("/company/dashboard");
             
         }

         else if($role=="admin"){
             $request->session()->regenerate();
             return redirect("/admin/dashboard");
         }

         else if($role == "jobseeker"){
            $request->session()->regenerate();
            return redirect("/jobseeker/dashboard");
         }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
