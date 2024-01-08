<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dataController extends Controller
{
    public function db(Request $request)
    {

    if(Auth::guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
        return redirect()->route("dash/index");
    }else{ 
        return redirect()->route("dash/login")->with("misserfolg","error username or password");
     }
    }
}
