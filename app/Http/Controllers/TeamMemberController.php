<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index(){

        $team_members = TeamMember::all();
        return view("admin.team_members",["team_members"=>$team_members]);
    }
    public function create(){

        $plans = Plan::all();
        return view("admin.team_member_create",["plans"=>$plans]);
    }
    public function store(Request $req){
        $file = $req->file('picture');
        $filename =uniqid().".".$file->getClientOriginalExtension();
        Storage::disk('public_uploads')->put($filename, file_get_contents($file));
        $teamMember = TeamMember::create([
            "picture"=>"uploads/".$filename,
            "fname"=>$req->fname,
            "lname"=>$req->lname,
            "degree"=>$req->degree,
            "role"=>$req->role,
            "plan_id"=>$req->plan,
            "availability"=>$req->availability
        ]);
        if($req->qualifications){
            $teamMember->qualifications = json_encode(explode(",",$req->qualifications));
        }
        if($req->interests){
            $teamMember->special_interests = json_encode(explode(",",$req->interests));
        }
        if($req->experiences){
            $teamMember->experiences = json_encode(explode(",",$req->experiences));
        }
        if($req->approaches){
            $teamMember->approachs = json_encode(explode(",",$req->approaches));
        }
        if($req->fb){
            $teamMember->facebook_link = $req->fb;
        }
        if($req->insta){
            $teamMember->instagram_link = $req->insta;
        }
        if($req->email){
            $teamMember->email = $req->email;
        }
        $teamMember->save();
        return redirect("/admin/team_members")->with("success",$teamMember->fname." ".$teamMember->lname." profil created successfully");
    }

    public function edit($id){

        $team_member = TeamMember::find($id);
        $plans = Plan::all();
        return view("admin.team_member_edit",["team_member"=>$team_member,"plans"=>$plans]);
    }
    public function update(Request $req, $id){
        $team_member = TeamMember::find($id);
        if($req->picture!=null){
            $team_member->picture =$req->picture;
        }
        else{
            $file = $req->file('picture_file');
            $filename =uniqid().".".$file->getClientOriginalExtension();
            Storage::disk('public_uploads')->put($filename, file_get_contents($file));
            $team_member->picture ="uploads/".$filename;
        }
        if($req->qualifications){
            $team_member->qualifications = json_encode(explode(",",$req->qualifications));
        }
        if($req->interests){
            $team_member->special_interests = json_encode(explode(",",$req->interests));
        }
        if($req->experiences){
            $team_member->experiences = json_encode(explode(",",$req->experiences));
        }
        if($req->approaches){
            $team_member->approachs = json_encode(explode(",",$req->approaches));
        }
        if($req->fb){
            $team_member->facebook_link = $req->fb;
        }
        if($req->insta){
            $team_member->instagram_link = $req->insta;
        }
        if($req->email){
            $team_member->email = $req->email;
        }
        $team_member->fname =$req->fname;
        $team_member->lname =$req->lname;
        $team_member->availability =$req->availability;
        $team_member->plan_id = $req->plan;
        $team_member->degree =$req->degree;
        $team_member->role =$req->role;
        $team_member->save();

        return redirect("/admin/team_members")->with("success",$team_member->fname." ".$team_member->lname." profil updated successfully");
    }


    public function destroy($id){
        $teamMember = TeamMember::find($id);
        $filePath = explode("/",$teamMember->picture);
        if(Storage::disk("public_uploads")->exists($filePath[0])){
            Storage::disk("public_uploads")->delete($filePath[0]);
        }
        TeamMember::destroy($id);
        return redirect("/admin/team_members")->with("success",$teamMember->fname." ".$teamMember->lname." removed created successfully");
    }
}
