<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Startup extends Model
{
    use HasFactory;

    public function startup_user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function jobs(){
        return $this->hasMany(Job::class,"user_id");
    }
}
