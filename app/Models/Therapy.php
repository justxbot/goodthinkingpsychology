<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapy extends Model
{
    use HasFactory;
    protected $fillable = [

        "name",
        "abbr",
        "description",
        "treatables",
        "picture",
    ];
}