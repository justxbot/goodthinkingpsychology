<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rd extends Model
{
    use HasFactory;
    protected $table = "r_d";
    protected $fillable = [
        "name",
        "fee",
        "rebate",
        "benifits",
        "gp",
    ];
}
