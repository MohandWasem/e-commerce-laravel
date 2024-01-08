<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class loginController extends Controller
{
   public function login()
   {
    return  view("admin.login");
   }

   public function data(Request $request)
   {
if(Auth::guard('admin')->attempt(["email"=>$request->input("email"),"password"=>$request->input("password")])){
return redirect()->route("view/product");
}else{ 

return redirect()->route("dash/login")->with("misserfolg","error username or password");
}
      return $request;


   }


//    public function adminLogin(Request $request)
// {
//     $this->validate($request, [
//         'email' => 'required',
//         'password' => 'required|min:6'
//     ]);  

//     if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
//         return redirect()->intended('/employee/overview');
//     }

//     return back()->withInput($request->only('username'));
// }

   
}
