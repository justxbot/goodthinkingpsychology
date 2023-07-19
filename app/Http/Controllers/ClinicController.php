<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Psy\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClinicController extends Controller
{
    public function index(){

        $clinics = Clinic::all();
        return view("admin.clinics",["clinics"=>$clinics]);
    }

    public function create(){
        return view("admin.clinic_create");
    }

    public function store(Request $req){

        $files= $req->file("files");
        $pictures =[];
        if($files){
            foreach( $files as $file){
                $filename = uniqid().".".$file->getClientOriginalExtension();
                Storage::disk('public_uploads')->put($filename, file_get_contents($file));
                array_push($pictures, $filename);
            }
        }
        $clinic = Clinic::create([
            "name"=>$req->name,
            "address"=>$req->address,
            "phone"=>$req->phone,
            "fax"=>$req->fax,
            "email"=>$req->email,
            "long"=>$req->long,
            "lat"=>$req->lat,
        ]);
        if(count($pictures)>0){
            $clinic->pictures = json_encode($pictures);
            $clinic->save();
        }

        return redirect("/admin/clinics")->with("success",$req->name." clinic created successfully");
    }
    public function edit($id){

        $clinic = Clinic::find($id);
        return view("admin.clinic_edit",["clinic"=>$clinic]);

    }
    public function update(Request $req, $id){


        $files= $req->file("files");
        if($req->modified_pictures == "empty"){
            $pictures = [];
        }
        else{
            $pictures = explode(',',$req->modified_pictures);
        }

        if($files){
            foreach( $files as $file){
                $filename = uniqid().".".$file->getClientOriginalExtension();
                Storage::disk('public_uploads')->put($filename, file_get_contents($file));
                array_push($pictures, $filename);
            }
        }
        $clinic = Clinic::find($id);
        $clinic->name = $req->name;
        $clinic->address = $req->address;
        if(count($pictures)<1){
            $clinic->pictures = null;
        }
        else{
            $clinic->pictures = $pictures;

        }
        $clinic->long = $req->long;
        $clinic->lat = $req->lat;
        $clinic->phone = $req->phone;
        $clinic->fax = $req->fax;
        $clinic->email = $req->email;
        $clinic->save();


        return redirect("/admin/clinics")->with("success",$clinic->name." clinic is updated successfully");
    }

    public function destroy($id){
        $clinic = Clinic::find($id);
        foreach(json_decode($clinic->pictures) as $pic)
        if (Storage::disk('public_uploads')->exists($pic)) {
            Storage::disk('public_uploads')->delete($pic);
        }
        Clinic::destroy($id);

        return redirect("/admin/clinics")->with("success", $clinic->name." clinic removed successfully");
    }
}
