<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all();

        return view("admin.messages",["messages"=>$messages]);
    }
    public function show($id){

        $message = Message::find($id);

        return view('admin.message',["message"=>$message]);

    }
    public function store(Request $req){

        $req->validate([
            "fname"=>"required",
            "lname"=>"required",
            "subject"=>"required",
            "email"=>"required|email",
            "message"=>"required",
            "mobile"=>"required"
        ]);
        Message::create([
            "fname"=>$req->fname,
            "lname"=>$req->lname,
            "subject"=>$req->subject,
            "email"=>$req->email,
            "message"=>$req->message,
            "mobile"=>$req->mobile
        ]);

        return redirect()->back()->with("success","Message sent successfully");


    }
    public function destroy($id){

        $message = Message::destroy($id);

        return redirect("/admin/messages");

    }
}
