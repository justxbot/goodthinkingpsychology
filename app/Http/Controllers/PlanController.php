<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(){

        $plans = Plan::all();
        return view("admin.plans",["plans"=>$plans]);
    }
    public function create(){
        return view("admin.plan_create");
    }
    public function store(Request $req){

        Plan::create([
            "name"=>$req->name,
            "fee"=>$req->fee,
            "returnable_fee"=>$req->returnable_fee
        ]);

        return redirect('/admin/plans')->with("success",$req->name." plan created successfully");
    }
    public function edit($id){

        $plan = Plan::find($id);

        return view('admin.plan_edit',["plan"=>$plan]);

    }
    public function update(Request $req, $id){
        $plan = Plan::find($id);
        $plan->name = $req->name;
        $plan->fee = $req->fee;
        $plan->returnable_fee = $req->returnable_fee;
        $plan->save();
        return redirect('/admin/plans')->with("success",$plan->name." updated  successfully");
    }

    public function destroy($id){
        $plan = Plan::find($id);
        Plan::destroy($id);
        return redirect('/admin/plans')->with("success",$plan->name." plan removed successfully");
    }


}
