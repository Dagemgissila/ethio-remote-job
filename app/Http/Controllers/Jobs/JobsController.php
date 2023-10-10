<?php

namespace App\Http\Controllers\Jobs;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;


class JobsController extends Controller
{
    public function index1(){
        return view("startup.job.index");
    }

    public function PostJob(){
        return view("startup.job.postjob");
    }

    public  function store(Request $request){
             $request->validate([
                  "job_title"=>["required","string","max:255"],
                  "salary"=>["required","string","max:255"],
                  'deadline' => [
                    'required',
                    'string',
                    'date',
                    function ($attribute, $value, $fail) {
                        $deadlineDate = Carbon::createFromFormat('Y-m-d', $value);
                        $todayDate = Carbon::now();
        
                        if ($deadlineDate->isAfter($todayDate)) {
                            return true;
                        }
        
                        $fail('The deadline must be greater than today\'s date.');
                    },
                ],
                  "description"=>["required","string","max:255"],
                  "requirement"=>["required","string","max:255"]
             ]);
             dd("");
    }
}
