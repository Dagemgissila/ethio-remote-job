<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangepasswordController extends Controller
{
    public function Cindex(Request $request){
         return view("company.changepassword");
    }

    public function changepassword(Request $request){
          $request->validate([
            "current_password"=> ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'max:15', 'confirmed'],
          ]);
         

          // Verify if the current password matches the user's actual password
          if (Hash::check($request->current_password, auth()->user()->password)) {
              
            User::whereId(auth()->user()->id)->Update([
                "password"=>Hash::make($request->password)
            ]);
       
      
              return back()->with("success","password change succesfully");
          } 
          else {
           
              return back()->with("error","incorrect current password");
          }

    }
}
