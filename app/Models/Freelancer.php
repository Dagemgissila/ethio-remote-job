<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
