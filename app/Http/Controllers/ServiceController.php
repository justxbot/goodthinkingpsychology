<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceTreatable;
use App\Models\Treatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(){

        $services = Service::all();
        return view("admin.services",["services"=>$services]);
    }
    public function create(){
        $treatables = Treatable::all();
        return view("admin.service_create",["treatables"=>$treatables]);
    }
    public function store(Request $req){

        $treatables=explode(',',$req->treatables);
        $file=$req->file('picture');
        $filename =uniqid().".".$file->getClientOriginalExtension();
        Storage::disk('public_uploads')->put($filename, file_get_contents($file));
        $service = Service::create([
            "name"=>$req->name,
            "picture"=>"uploads/".$filename
        ]);
        foreach($treatables as $treatable){
            ServiceTreatable::create([
               "service_id"=>$service->id,
               "treatable_id"=>$treatable
            ]);
        }
        return redirect('/admin/services')->with("success",$req->name." service created successfully");
    }
    public function edit($id){
        $treatables = Treatable::all();
        $service_treatables = ServiceTreatable::where('service_id','=',$id)->get();
        $service = Service::find($id);
        return view("admin.service_edit",["service"=>$service,"treatables"=>$treatables,'service_treatables'=>$service_treatables]);
    }

    public function update(Request $req, $id){
        $treatables = explode(",", $req->treatables);
        $service = Service::find($id);
        if($req->picture!=null){
            $service->picture =$req->picture;
        }
        else{
            $file = $req->file('picture_file');
            $filename =uniqid().".".$file->getClientOriginalExtension();
            Storage::disk('public_uploads')->put($filename, file_get_contents($file));
            $service->picture ="uploads/".$filename;
        }
        $service->name =$req->name;
        $existingServiceTreatables = ServiceTreatable::where("service_id","=",$id)->get();
        foreach($existingServiceTreatables as $element){
            ServiceTreatable::destroy($element->id);
        }
        foreach($treatables as $serviceTreatable){

            ServiceTreatable::create([
                "service_id"=>$id,
                "treatable_id"=>$serviceTreatable
            ]);

        }
        $service->save();
        return redirect('/admin/services')->with("success",$req->name." service updated successfully");
    }


    public function destroy($id){
        $service = Service::find($id);
        $pathName = explode("/",$service->picture);
        if(Storage::disk("public_uploads")->exists($pathName[1])){
            Storage::disk("public_uploads")->delete($pathName[1]);
        }
        Service::destroy($id);

        return redirect('/admin/services')->with("success",$service->name." service removed successfully");
    }
}
