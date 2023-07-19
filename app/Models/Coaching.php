<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coaching extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "picture",
        "questions",
        "team_member_id"
    ];
    public function team_member(){


        return $this->belongsTo(TeamMember::class, "team_member_id");
    }
}
