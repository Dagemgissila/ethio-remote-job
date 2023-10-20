<?php

namespace App\Models;

use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable=[
        "freelancer_id",
        "job_position",
        "company_name",
        "start_date",
        "end_date",
        "description",
    ];

    public function freelancer_exp(){
        return $this->belongsTo(Freelancer::class,"freelancer_id");
    }
}
