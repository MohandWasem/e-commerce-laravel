<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\User;
use App\Models\image;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class data_cart extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       view()->composer("*",function($view){
        if(Auth::guard('web')->check()){

            $id_user=Auth::guard("web")->user()->id;
            $data_cart=User::findOrfail($id_user)->with("products")->get()[3]["products"];
            $id_product=cart::where("user_id",$id_user)->get("product_id");
            $all_img= image::whereIn("product_id",$id_product)->get();
            $all_count=cart::where("user_id",$id_user)->get()->count();
            $count=cart::where('user_id',$id_user)->get('count');
            
            
         
            $view->with(["data_cart"=>$data_cart,"all_img"=>$all_img,"id_product"=>$id_product,"all_count"=>$all_count,'count'=>$count]);
        }
       });
    }
}
