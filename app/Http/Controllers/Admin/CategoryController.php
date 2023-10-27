<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index(){
        $categories=Category::query()->orderBy("created_at","desc")->get();
        return view("admin.category",compact("categories"));
     }

     public function addcategory(Request $request){
           $request->validate([
            "name"=>["required","string","max:255"]
           ]);
           $category=new Category;
           $category->name=$request->name;
           $category->save();
           return back()->with("success","category added succesfully");
     }
}
