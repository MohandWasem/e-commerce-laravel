<?php

namespace App\Http\Controllers\admin;

use App\Models\admin;
use App\Models\prive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\adminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function __construct(){
        $this->middleware('User')->except('logout');
        $this->middleware('support')->except(["index","add","insert","logout"]);
    }
    public function index()
    {
       $id=1;
        $admin=admin::all();
        return view("admin.users.user",compact("admin","id"));

    }
    public function add()
    {
        $priv=prive::all();
        return view("admin.users.add",compact("priv"));
    }

    public function insert(adminRequest $request)
    {
       admin::create([
        "name"=>$request->input("name"),
        "email"=>$request->input("email"),
        "password"=>Hash::make($request->input("passowrd")),
        "gender"=>$request->input("gender"),
        "priv"=>$request->input("priv")
       ]);

       return redirect()->route("dash/index")->with("success","successfully Add user");
    // return  bcrypt(123);
    
    }

    public function edit($id)
    {
        $priv=prive::all();
        $data_admin=admin::findOrfail($id);
        return view("admin.users.edit",compact("data_admin","priv"));
    
    }

    public function update(Request $req , $id)
    {
        admin::where("id",$id)->update([
            "name"=>$req->name,
            "email"=>$req->email,
            "gender"=>$req->gender,
            "priv"=>$req->priv
        ]);
        return redirect()->route("dash/index");
      
        
    }


    public function delete($id)
    {
        // return $id;
        admin::where("id",$id)->delete();
        return redirect()->route("dash/index")->with("success","successfully delete user");
    }

    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect()->route("dash/login");
    }

}
