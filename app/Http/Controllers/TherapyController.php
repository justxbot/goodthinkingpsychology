<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Therapy;
use App\Models\TherapyPracticing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TherapyController extends Controller
{
    public function index(){
        $therapies = Therapy::all();
        return view("admin.therapies",["therapies"=>$therapies]);
    }
    public function create(){
        $team_members = TeamMember::all();
        return view("admin.therapy_create",["team_members"=>$team_members]);
    }
    public function store(Request $req){
        $treatables = json_encode(explode(",",$req->treatables));
        $team_members = explode(",",$req->team_members_p);
        $file = $req->file('picture');
        $filename =uniqid().".".$file->getClientOriginalExtension();
        Storage::disk('public_uploads')->put($filename, file_get_contents($file));
        $therapy = Therapy::create(
            [
                "name"=>$req->name,
                "abbr"=>$req->abbr,
                "description"=>$req->description,
                "treatables"=>$treatables,
                "picture"=>"uploads/".$filename
            ]
        );
        foreach($team_members as $team_member){
        TherapyPracticing::create([
            "therapy_id"=>$therapy->id,
            "team_member_id"=>$team_member
        ]);

        }


        return redirect("/admin/therapies")->with("success",$therapy->name." created successfully");
    }
    public function edit($id){
        $therapy = Therapy::find($id);
        $therapyPracticings = TherapyPracticing::where("therapy_id",'=',$id)->get();
        $team_members = TeamMember::all();
        return view("admin.therapy_edit",["therapy"=>$therapy,"team_members"=>$team_members,"therapyPracticings"=>$therapyPracticings]);
    }
    public function update(Request $req,$id){
        $therapy = Therapy::find($id);
        $team_members = explode(",",$req->team_members_p);
        $therapyPracticings = TherapyPracticing::where("therapy_id",'=',$id)->get();
        if($req->picture!=null){
            $therapy->picture =$req->picture;
        }
        else{
            $file = $req->file('picture_file');
            $filename =uniqid().".".$file->getClientOriginalExtension();
            Storage::disk('public_uploads')->put($filename, file_get_contents($file));
            $therapy->picture ="uploads/".$filename;
        }
        $treatables = json_encode(explode(",",$req->treatables));

        $therapy->name= $req->name;
        $therapy->abbr= $req->abbr;
        $therapy->description= $req->description;
        $therapy->treatables= $treatables;
        $therapy->save();
        foreach($therapyPracticings as $therapyPracticing){
            TherapyPracticing::destroy($therapyPracticing->id);
        }
        foreach($team_members as $team_member){
            TherapyPracticing::create([
                "therapy_id"=>$therapy->id,
                "team_member_id"=>$team_member
            ]);
        }

        return redirect('/admin/therapies')->with("success",$therapy->name." edited successfully");
    }
    public function destroy($id){
        $therapyPracticings = TherapyPracticing::where('therapy_id',"=",$id)->get();
        foreach($therapyPracticings as $therapyPracticing){
            TherapyPracticing::destroy($therapyPracticing->id);
        }
        $therapy = Therapy::find($id);
        $filePath = explode("/",$therapy->picture);
        if (Storage::disk('public_uploads')->exists($filePath[1])) {
            Storage::disk('public_uploads')->delete($filePath[1]);
        }
        Therapy::destroy($id);
        return redirect("/admin/therapies")->with("success",$therapy->name." removed successfully");
    }
}
