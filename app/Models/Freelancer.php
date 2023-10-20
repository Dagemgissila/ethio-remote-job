<?php

namespace App\Models;

use App\Models\Education;
use App\Models\Portfolio;
use App\Models\Experience;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Freelancer extends Model
{
    use HasFactory;

    protected $fillable=[
        "firstname",
        "lastname",
        "phone_number"
    ];

    public function freelancer_user(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function education(){
        return $this->hasMany(Education::class,"freelancer_id");
    }

    public function experience(){
        return $this->hasMany(Experience::class,"freelancer_id");
    }

    public function portfolio(){
        return $this->hasMany(Portfolio::class,"freelancer_id");
    }

    public function application(){
        return $this->hasMany(JobApplication::class,"freelancer_id");
    }
}
