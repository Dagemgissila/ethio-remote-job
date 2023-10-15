<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
