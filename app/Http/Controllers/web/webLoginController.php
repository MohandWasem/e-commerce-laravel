<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Requests\adminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\registerRequest;

class webLoginController extends Controller
{
    public function login()
    {
        return view('web.login');
    }

    public function data(Request $request)
    {
        if(Auth::guard("web")->attempt(["email"=>$request->input("email"),"password"=>$request->input("password")])){
            return redirect()->route("webs/index");
        }else{
            return redirect()->route("webs/login")->with("error","error username or password");
        }
    }

     public function logout()
     {
        Auth::guard('web')->logout();
        return redirect()->route('webs/login');
     } 

     
}
