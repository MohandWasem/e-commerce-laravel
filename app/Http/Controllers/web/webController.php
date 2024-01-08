<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\User;
use App\Models\image;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class webController extends Controller
{
    public function index()
    {
        $products=product::with("images")->paginate(3);
        return view('web.index',compact('products'));
    }

    public function cart()
    {

          //  بعملcheck  علي كود قبل ما اكتبه  providerفي 

        // $id_user=Auth::guard("web")->user()->id;
        // $data_cart=User::findOrfail($id_user)->with("products")->get()[0]["products"];
        // return $carts=User::session($id_user)->getContent()->toArray();
        // $id_product=cart::where("user_id",$id_user)->get("product_id");
        //  $all_img=image::whereIn("product_id",$id_product)->get();
        //  $all_count=cart::where("user_id",$id_user)->get()->count();
             

        // foreach ($data_cart as $row ){
        //   $images=product::where("id",$row->id)->with("images")->get()[0]["images"];
        //   foreach ($images as $images) {
        //     $all_img[]=$images->image;
        //   }
        // }

        // return view("web.style.header",compact("data_cart","all_img"));



        //  count and all_total  in cart
        
        $id_user=Auth::guard('web')->user()->id;
        $id_pro= cart::where('user_id',$id_user)->get("product_id");
         $count=cart::where('user_id',$id_user)->get('count');
        $price=product::whereIn('id',$id_pro)->get('price');

         $all_total=0;
         foreach ($count as $key => $count) {
          $all_total+=$count->count*$price[$key]['price'];
         }
        
    }

    public function delete_cart(Request $request)
    {
      $id_user=Auth::guard("web")->user()->id;
      cart::where("user_id",$id_user)->where("product_id",$request->remove_pro)->delete();
      return "yaaaaa";
    }
    
}
