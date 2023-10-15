<?php

namespace App\Http\Controllers\jobseeker;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
     public function index(){
        return view("jobseeker.portfolio.create");
     }

     public function store(Request $request){
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png'],
        ];
        
        $this->validate($request, [
            'title' => 'required|string|max:20',
            'link' => 'required|url|max:250',
            'image' => ['required', 'array', 'max:5'], // allow only an array of maximum 5 images
            'image.*' => $rules, // validate each image within the array
            'description' => 'required|string|max:150',
        ]);
        
        $image = array();

        if ($files = $request->file("image")) {
            $files=$request->image;
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . "." . $ext;
                $upload_path = 'portfolio/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        

        Portfolio::create([
            "freelancer_id"=>auth()->user()->freelancer->id,
            "title"=>$request->title,
            "link"=>$request->link,
            "images"=>implode('|',$image),
            "description"=>$request->description
        ]);
      

        return back()->with("success","portflio added succesfully");
     }

     public function viewPortfollio(){
        $portfolio = Portfolio::query()
        ->where("freelancer_id", auth()->user()->freelancer->id)
        ->orderBy("created_at", "desc")
        ->get();
    
    $portfolio->each(function ($item) {
        $item->images = explode('|', $item->images);
    });
    

        return view("jobseeker.portfolio.index",compact("portfolio"));
     }

     public function deletePortfolio(Request $request){
        $portfolio=Portfolio::find($request->id);
        $portfolio->delete();

        return back()->with("success","portfolio delete successfully");

     }
}
