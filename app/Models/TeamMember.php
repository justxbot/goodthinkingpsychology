<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;
class TeamMember extends Model
{
    use HasFactory;
    protected $fillable = [
        "picture",
        "fname",
        "lname",
        "degree",
        "role",
        "plan_id",
        "availability",
        "qualifications",
        "interests",
        "experiences",
        "approaches",
        "facebook_link",
        "instagram_link",
        "email"
    ];
    public function plan(){
    return $this->belongsTo(Plan::class,'plan_id');
    }
    public function therapyPracticing(){

        return $this->hasMany(TherapyPracticing::class,'team_member_id');
    }
}
