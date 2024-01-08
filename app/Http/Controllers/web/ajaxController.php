<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ajaxController extends Controller
{
   public function data_ajax(Request $request)
   {
    if(Auth::guard('web')->check()){

        $id_user=Auth::guard('web')->user()->id;
        $cart_found=cart::where("user_id",$id_user)->where("product_id",$request->product_id)->first();
  
        if($cart_found){
          $cart_found->increment("count");
        }else{
          $cart=new Cart();
          $cart->user_id=$id_user;
          $cart->product_id=$request->product_id;
          $cart->count=1;
          $cart->save();
        }
    }

          
  }


  public function search_ajax(Request $request)
  {
    if(empty($request->se)){
      echo"";
    }else{

      $search= product::where("name","LIKE","%$request->se%")->get();
  
       foreach ( $search as  $search) {
         echo "
           <div> <a href=''>$search->name</a></div>
         ";
       }
    }
  }
}
