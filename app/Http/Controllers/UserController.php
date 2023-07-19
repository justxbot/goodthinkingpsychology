<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function loginPage(){
        return view("admin.login");
    }
    public function login(Request $req){
        $req->validate([
           "email"=>"required|email",
           "password"=>"required"
        ]);

        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect("/admin/dashboard");
        }
        else{

            return redirect()->back();
        }

    }
    public function logout(){

        Auth::logout();
        return redirect(route('login'));

    }
    public function dashboard(){
        return view("admin.dashboard");
    }
    public function generateToken(){
        $token = Str::random(32);
        $user = User::first();
        $passwordResetRecord = DB::select("select * from password_reset_tokens limit 1");
        if(count($passwordResetRecord)>0){
            DB::table('password_reset_tokens')->truncate();
        }
        DB::statement('insert into password_reset_tokens( email, token) values(?,?)', [$user->email,$token]);
        Mail::to($user->email)->send(new AdminMail($token));

        return redirect()->back()->with("success","Check your email for a password reset link");
    }
    public function resetPage($token){
        $passwordResetRecord = DB::select("select * from password_reset_tokens limit 1")[0];
        if($passwordResetRecord->token != $token){
            abort(404);
        }
        else{

            return view("admin.password_reset_form");
        }
    }
    public function reset(Request $req){

        $req->validate(
            [
                "password"=>"required",
                "c_password"=>"required|same:password"
            ],
                ["c_password.same"=>"Password confirmation doesn't match"]
            );
            $user= User::first();
            $user->password = bcrypt($req->password);
            $user->save();
            DB::table('password_reset_tokens')->truncate();
        return redirect(route("login"))->with("success","Password changed successfully");
    }
    public function accountSettings(){

        $user = User::first();
        return view("admin.account_settings",["user"=>$user]);
    }
    public function accountSettingsUpdate(Request $req){

        $user = User::first();
        $req->email && $user->email=$req->email;
        $req->password && $user->password= bcrypt($req->password);
        $user->save();
        Auth::logout();
        return redirect(route("login"));
    }
    public function websiteSettings(){

        $config = Config::first();
        return view("admin.website_settings",["config"=>$config]);
    }
    public function websiteSettingsUpdate(Request $req){

        $config = Config::first();
        $req->w_h && $config->working_hours=$req->w_h;
        $req->w_d && $config->working_days=$req->w_d;
        $req->email && $config->email=$req->email;
        $req->phone && $config->phone=$req->phone;
        $req->address && $config->address=$req->address;
        $req->facebook_link && $config->facebook_link=$req->facebook_link;
        $req->google_link && $config->google_link=$req->google_link;
        $req->twitter_link && $config->twitter_link=$req->twitter_link;
        $config->save();
        return redirect()->back();
    }
}
