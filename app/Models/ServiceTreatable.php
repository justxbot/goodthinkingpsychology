<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Treatable;

class ServiceTreatable extends Model
{
    use HasFactory;
    protected $fillable = [
        "service_id",
        "treatable_id"
    ];
    public function treatable(){
        return $this->belongsTo(Treatable::class,'treatable_id');
    }
}
