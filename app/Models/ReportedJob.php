<?php

namespace App\Models;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportedJob extends Model
{
    use HasFactory;

    public function user_report(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function job(){
        return $this->belongsTo(Job::class,"job_id");
    }
}
