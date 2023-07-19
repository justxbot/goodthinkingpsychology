<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index(){

        $resources = Resource::all();
        return view("admin.resources",["resources"=>$resources]);
    }
    public function create(){

        return view("admin.resource_create");
    }
    public function store(Request $req){

        $file = $req->file('picture');
        $filename =uniqid().".".$file->getClientOriginalExtension();
        Storage::disk('public_uploads')->put($filename, file_get_contents($file));
        Resource::create([
            "name"=>$req->name,
            "website"=>$req->website,
            "description"=>$req->description,
            "logo"=>"uploads/".$filename,
        ]);
        return redirect('/admin/resources')->with("success",$req->name." resource created successfully");
    }
    public function edit($id){

        $resource=Resource::find($id);
        return view("admin.resource_edit",["resource"=>$resource]);
    }

    public function update(Request $req, $id){

        $resource = Resource::find($id);
        if($req->picture!=null){
            $resource->logo =$req->picture;
        }
        else{
            $file = $req->file('picture_file');
            $filename =uniqid().".".$file->getClientOriginalExtension();
            Storage::disk('public_uploads')->put($filename, file_get_contents($file));
            $resource->logo ="uploads/".$filename;
        }

        $resource->name =$req->name;
        $resource->description =$req->description;
        $resource->website =$req->website;
        $resource->save();

        return redirect("/admin/resources")->with("success",$req->name." resource updated successfully");

    }
    public function destroy($id){
        $resource= Resource::find($id);
        $filePath = explode("/",$resource->logo);
        if (Storage::disk('public_uploads')->exists($filePath[1])) {
            Storage::disk('public_uploads')->delete($filePath[1]);
        }
        Resource::destroy($id);
        return redirect('/admin/resources')->with("success",$resource->name." resource removed successfully");
    }
}
