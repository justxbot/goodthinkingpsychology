<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamMember;
use App\Models\Therapy;

class TherapyPracticing extends Model
{
    protected $table = "therapy_practicing";
    protected $fillable = [
        "therapy_id",
        "team_member_id"
    ];
    use HasFactory;
    public function teamMember(){
        return $this->belongsTo(TeamMember::class, "team_member_id");
    }
    public function therapy(){
        return $this->belongsTo(Therapy::class, "team_member_id");
    }

}
