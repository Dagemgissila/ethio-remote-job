<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

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

}
