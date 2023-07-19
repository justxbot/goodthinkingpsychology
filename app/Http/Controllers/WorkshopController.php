<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
    public function index(){
        $workshops = Workshop::all();
        return view("admin.workshops",["workshops"=>$workshops]);
    }
    public function create(){
        return view("admin.workshop_create");
    }
    public function store(Request $req){
        $file = $req->file('picture');
        $filename =uniqid().".".$file->getClientOriginalExtension();
        Storage::disk('public_uploads')->put($filename, file_get_contents($file));
        Workshop::create([

            "name"=>$req->name,
            "slogan"=>$req->slogan,
            "period"=>$req->period,
            "timetable"=>$req->timetable,
            "description"=>$req->description,
            "picture"=>"uploads/".$filename,
            "skills"=>json_encode(explode(',',$req->skills))

        ]);
        return redirect("/admin/workshops")->with("success",$req->name." workshop created successfully");
    }
    public function edit($id){

        $workshop = Workshop::find($id);
        return view("admin.workshop_edit",["workshop"=>$workshop]);
    }
    public function update(Request $req, $id){

        $workshop = Workshop::find($id);
        if($req->picture!=null){
            $workshop->picture =$req->picture;
        }
        else{
            $file = $req->file('picture_file');
            $filename =uniqid().".".$file->getClientOriginalExtension();
            Storage::disk('public_uploads')->put($filename, file_get_contents($file));
            $workshop->picture ="uploads/".$filename;
        }
        $workshop->name = $req->name;
        $workshop->slogan = $req->slogan;
        $workshop->period = $req->period;
        $workshop->timetable = $req->timetable;
        $workshop->skills = json_encode(explode(',',$req->skills));
        $workshop->description = $req->description;
        $workshop->save();
        return redirect("/admin/workshops")->with("success",$workshop->name." workshop updated successfully");
    }
    public function destroy($id){
        $workshop= Workshop::find($id);
        $filePath = explode("/",$workshop->picture);
        if (Storage::disk('public_uploads')->exists($filePath[1])) {
            Storage::disk('public_uploads')->delete($filePath[1]);
        }
        Workshop::destroy($id);

        return redirect("/admin/workshops")->with("success",$workshop->name." workshop removed successfully");
    }
}
