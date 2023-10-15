<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable=[
        "freelancer_id",
        "title",
        "link",
        "images",
        "description"
    ];

    public function freelancer_experience(){
        return $this->belongsTo(Freelancer::class,"freelancer_id");
    }
}
