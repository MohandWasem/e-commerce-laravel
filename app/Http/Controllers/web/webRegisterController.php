<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\registerRequest;

class webRegisterController extends Controller
{
    public function web_register()
    {
       return view('web.register');
    }

    public function regi(Request $req)
    {
        $req->validate([
            "name"=>"required|string",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|confirmed|min:3|max:255",
        ]);

        User::create([
          "name"=>$req->input('name'),
          "email"=>$req->input('email'),
          "password"=>Hash::make($req->input('password'))
        ]);
       return redirect()->route('webs/login')->with('successfully',"successfully ok register");
    }
               // view_cart

    public function view_cart(){
        return view('web.view_cart');
    }

    public function data_view_cart(Request $requset)
    {

    }
}
