<?php

namespace App\Models;

use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    public function freelancer(){
        return $this->belongsTo(Freelancer::class,"freelancer_id");
    }
}
