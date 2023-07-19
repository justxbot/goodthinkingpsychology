<?php

namespace App\Http\Controllers;

use App\Models\Rd;
use Illuminate\Http\Request;

class RDController extends Controller
{
    public function index(){
        $rds = Rd::all();
        return view('admin.rds',["rds"=>$rds]);
    }

    public function create(){
        return view('admin.rd_create');
    }
    public function store(Request $req){
        if($req->benifits!=null){
            $benifits = explode(',',$req->benifits);
        }
        else{
            $benifits = null;
        }
        if($req->gp == "on"){
            $gp=1;
        }
        else{
            $gp=0;
        }
        Rd::create([
            "name"=>$req->name,
            "fee"=>$req->fee,
            "rebate"=>$req->rebate,
            "gp"=>$gp,
            "benifits"=>json_encode($benifits)
        ]);
        return redirect('/admin/r_d')->with("success",$req->name." rate and debate created successfully");
    }

    public function edit($id){

        $rd=Rd::find($id);
        return view("admin.rd_edit",["rd"=>$rd]);
    }

    public function update(Request $req, $id){
        $rd = Rd::find($id);
        if($req->benifits!=null){
            $rd->benifits = explode(',',$req->benifits);
        }
        else{
            $rd->benifits = null;
        }
        if($req->gp == "on"){
            $rd->gp=1;
        }
        else{
            $rd->gp=0;
        }
        $rd->name = $req->name;
        $rd->fee = $req->fee;
        $rd->rebate = $req->rebate;
        $rd->save();

        return redirect('/admin/r_d')->with("success",$req->name." rate and debate updated successfully");

    }
    public function destroy($id){
        $rd=Rd::find($id);
        Rd::destroy($id);
        return redirect('/admin/r_d')->with("success",$rd->name." rate and debate removed successfully");

    }
}
