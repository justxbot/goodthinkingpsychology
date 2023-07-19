<?php

namespace App\Http\Controllers;

use App\Models\Coaching;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoachingController extends Controller
{
    public function index(){
        $coaching = Coaching::all();
        return view('admin.coachings',['coachings'=>$coaching]);
    }

    public function edit($id){

        $coaching = Coaching::find($id);
        $team_members = TeamMember::all();
        return view("admin.coaching_edit",["coaching"=>$coaching,"team_members"=>$team_members]);
    }
    public function update(Request $req, $id){

        $questions = explode(",", $req->questions);
        $coaching = Coaching::find($id);
        if($req->picture!=null){
            $coaching->picture =$req->picture;
        }
        else{
            $file = $req->file('picture_file');
            $filename =uniqid().".".$file->getClientOriginalExtension();
            Storage::disk('public_uploads')->put($filename, file_get_contents($file));
            $coaching->picture ="uploads/".$filename;
        }

        $coaching->name =$req->name;
        $coaching->questions =json_encode($questions);
        $coaching->description =$req->description;
        $coaching->team_member_id =$req->team_member;
        $coaching->save();

        return redirect("/admin/coachings")->with("success",$coaching->name." coaching updated successfully");
    }


    public function create(){
        $team_members = TeamMember::all();
        return view('admin.coaching_create',["team_members"=>$team_members]);
    }



    public function store(Request $req){

        $file = $req->file('picture');
        $questions = explode(",", $req->questions);
        $filename =uniqid().".".$file->getClientOriginalExtension();
        Storage::disk('public_uploads')->put($filename, file_get_contents($file));
        Coaching::create([
            "name"=>$req->name,
            "description"=>$req->description,
            "picture"=> "uploads/".$filename,
            "questions"=>json_encode($questions),
            "team_member_id"=>$req->team_member
        ]);
        return redirect('/admin/coachings')->with("success",$req->name." coaching created successfully");
    }



    public function destroy($id){
        $coaching = Coaching::find($id);
        $filePath = explode("/",$coaching->picture);
        if (Storage::disk('public_uploads')->exists($filePath[1])) {
            Storage::disk('public_uploads')->delete($filePath[1]);
        }
        Coaching::destroy($id);
        return redirect('/admin/coachings')->with("success",$coaching->name." coaching removed successfully");
    }
}
