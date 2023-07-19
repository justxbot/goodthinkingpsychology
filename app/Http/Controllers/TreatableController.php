<?php

namespace App\Http\Controllers;

use App\Models\Treatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TreatableController extends Controller
{
    public function index(){
        $treatables = Treatable::all();
        return view("admin.treatables",["treatables"=>$treatables]);
    }
    public function create(){
        return view("admin.treatable_create");
    }
    public function store(Request $req){
        $file = $req->file('picture');
        $filename =uniqid().".".$file->getClientOriginalExtension();
        Storage::disk('public_uploads')->put($filename, file_get_contents($file));

        Treatable::create([

            "name"=>$req->name,
            "description"=>$req->description,
            "picture"=>"uploads/".$filename,
            "causes"=>json_encode(explode(',',$req->causes)),
            "symptoms"=>json_encode(explode(',',$req->symptoms)),

        ]);
        return redirect("/admin/treatables")->with("success",$req->name." treatable created successfully");
    }
    public function edit($id){

        $treatable = Treatable::find($id);
        return view("admin.treatable_edit",["treatable"=>$treatable]);
    }
    public function update(Request $req,$id){
        $treatable = Treatable::find($id);
        if($req->picture!=null){
            $treatable->picture =$req->picture;
        }
        else{
            $file = $req->file('picture_file');
            $filename =uniqid().".".$file->getClientOriginalExtension();
            Storage::disk('public_uploads')->put($filename, file_get_contents($file));
            $treatable->picture ="uploads/".$filename;
        }
        $treatable->name = $req->name;
        $treatable->causes = json_encode(explode(',', $req->causes));
        $treatable->symptoms = json_encode(explode(',', $req->symptoms));
        $treatable->description = $req->description;
        $treatable->save();
        return redirect("/admin/treatables")->with("success",$treatable->name." treatable updated successfully");
    }
    public function destroy($id){

        $treatable= Treatable::find($id);
        $filePath = explode("/",$treatable->picture);
        if (Storage::disk('public_uploads')->exists($filePath[1])) {
            Storage::disk('public_uploads')->delete($filePath[1]);
        }
        Treatable::destroy($id);

        return redirect("/admin/treatables")->with("success",$treatable->name." treatable removed successfully");
    }
}
