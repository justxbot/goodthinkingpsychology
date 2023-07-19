<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable =[

        "fname",
        "lname",
        "date",
        "time",
        "email",
        "mobile",
        "status",
        "hadAppointmentBefore"
    ];
}
