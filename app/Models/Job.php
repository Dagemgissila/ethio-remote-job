<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable=[
        "job_title",
        "salary",
        "deadline",
        "description",
        "requirement"
    ];

    public function UserJob(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function getShortDescription()
    {
        return Str::limit($this->description, 100);
    }

    public function jobaapplication(){
        return $this->hasMany(jobApplication::class,"job_id");
    }

    public function job_report(){
        return $this->hasMany(ReportedJob::class,"job_id");
    }

}
