<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Service;
use App\Models\ServiceTreatable;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Therapy;
use App\Models\TherapyPracticing;
use App\Models\Treatable;
use App\Models\Workshop;
use App\Models\Clinic;
use App\Models\Coaching;
use App\Models\Config;
use App\Models\Rd;
use DB;

class guestController extends Controller
{
   public function index(){
    $services = Service::take(3)->get();
    return view('index',['services'=>$services]);

   }
   public function ourTeam(){


    $team_members = TeamMember::all();
    return view('our-team',['team_members'=>$team_members]);

    }

    public function teamMember($id){

        $member = TeamMember::find($id);
        if($member==null){

            abort(404);

        }
        return view("team-member",["member"=>$member]);


    }
    public function therapies(){

        $therapies = Therapy::all();

        return view('therapies',["therapies"=>$therapies]);

    }
    public function therapy($id){

        $therapy = Therapy::find($id);
        if($therapy==null){
            abort(404);
        }
        $therapyPracticings = TherapyPracticing::where("therapy_id","=",$therapy->id)->get();
        $team_members = [];
        foreach($therapyPracticings as $elm){
           array_push($team_members,$elm->teamMember);
        }

        return view("therapy",["therapy"=>$therapy , "team_members"=>$team_members]);
    }
    public function services(){


        $services = Service::all();
        $coachings = Coaching::all();
        return view('services',["services"=>$services,"coachings"=>$coachings]);

    }
    public function service($id){

        $service = Service::find($id);
        if($service==null){
            abort(404);
        }
        $service_treatables = ServiceTreatable::where("service_id","=",$service->id)->get();
        $treatables = [];
        foreach($service_treatables as $elm){
           array_push($treatables,$elm->treatable);
        }

        return view("service",["service"=>$service,"treatables"=>$treatables]);
    }

    public function treatable($id){

            $treatable = Treatable::find($id);
            if($treatable==null){

                abort(404);
            }
            return view('treatable',["treatable"=>$treatable]);

    }
    public function workshops(){

        $workshops = Workshop::all();
        return view('workshops',["workshops"=>$workshops]);
    }
    public function workshop($id){

        $workshop = Workshop::find($id);
        return view('workshop',["workshop"=>$workshop]);
    }
    public function resources(){

        $resources = Resource::all();
        return view('resources',["resources"=>$resources]);

    }
    public function aboutUs(){
        $clinics = Clinic::all();
        $rds = Rd::all();
        return view('about-us',["clinics"=>$clinics,"rds"=>$rds]);
    }
    public function contactUs(){

        $configs = Config::first();
        return view('contact-us',['configs'=>$configs]);
    }
    public function appointmentRequestPage(){
        return view('appointment_request');
    }
    public function coachings(){

        $coachings = Coaching::all();
        return view('coachings',["coachings"=>$coachings]);

    }

    public function coaching($id){

        $coaching = Coaching::find($id);
        if($coaching==null){
            abort(404);
        }

        return view('coaching',["coaching"=>$coaching]);

    }


}
