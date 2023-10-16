<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable=[
        "freelancer_id",
        "job_id",
        "description"
    ];

    public function app_freelancer(){
        return $this->belongsTo(Freelancer::class,"freelancer_id");
    }

    public function job(){
        return $this->belongsTo(Job::class,"job_id");
    }
}
