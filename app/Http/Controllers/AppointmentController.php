<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){

        $appointments = Appointment::all();
        $pendingAppointments = Appointment::where("status","=","pending")->get();
        return view('admin.appointments',["appointments"=>$appointments,"pendingAppointments"=>$pendingAppointments]);
    }

    public function statusUpdate(Request $req){

        $appointment = Appointment::find($req->id);
        $appointment->status = $req->status;
        $appointment->save();
        return redirect('/admin/appointments');
    }
    public function store(Request $req){
        $req->validate([
            "fname"=>"required",
            "lname"=>"required",
            "date"=>"required",
            "time"=>"required",
            "email"=>"required|email",
            "mobile"=>"required",
        ]);
        $date =Carbon::parse( $req->date);
        if($date->dayOfWeek === Carbon::SUNDAY){
            return redirect()->back()->with("error","Sundays are not available");
        }
        elseif($date->dayOfWeek === Carbon::SATURDAY){
            $req->validate([
                "time"=>"required|date_format:H:i|after_or_equal:09:00|before_or_equal:11:00"
            ],[
                "time.after_or_equal"=>"Saturdays working hours is between 09:00 and 12:00",
                "time.before_or_equal"=>"Saturdays working hours is between 09:00 and 12:00"
            ]);
            Appointment::create([

                "fname"=>$req->fname,
                "lname"=>$req->lname,
                "date"=>$req->date,
                "time"=>$req->time,
                "email"=>$req->email,
                "mobile"=>$req->mobile,
                "status"=>"pending",
                "hadAppointmentBefore"=>$req->hadAppointmentBefore?true:false,
            ]);

            return redirect()->back()->with("success","Appointment requested successfully");
        }
        else{
            $req->validate([
                "time"=>"required|date_format:H:i|after_or_equal:09:00|before_or_equal:16:00"
            ],[
                "time.after_or_equal"=>"Our work time is between 09:00 and 17:00",
                "time.before_or_equal"=>"Our work time is between 09:00 and 17:00"
            ]);
            Appointment::create([

                "fname"=>$req->fname,
                "lname"=>$req->lname,
                "date"=>$req->date,
                "time"=>$req->time,
                "email"=>$req->email,
                "mobile"=>$req->mobile,
                "status"=>"pending",
                "hadAppointmentBefore"=>$req->hadAppointmentBefore?true:false,
            ]);

            return redirect()->back()->with("success","Appointment requested successfully");
        }
    }
    public function remove($id){
        Appointment::destroy($id);
        return redirect('/admin/appointments');

    }
}
