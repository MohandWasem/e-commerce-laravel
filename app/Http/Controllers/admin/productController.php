<?php

namespace App\Http\Controllers\admin;

use App\Models\image;
use App\Models\catorgy;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;

class productController extends Controller
{
    public function index(){
        $id=1;
        $all_data=product::with('images')->get();
        return view('admin.products.product',compact('all_data','id'));
    }

    public function form()
    {
        $cat=catorgy::all();
        return view('admin.products.add',compact('cat'));
    }
    public function data(productRequest $request)
    {
        $pro=product::create([
            "name"=>$request->name,
            "price"=>$request->price,
            "sale"=>$request->sale,
            "count"=>$request->count,
            "cat"=>$request->cat
        ]);
        foreach ($request->img as  $img) {
         $ex=$img->getClientOriginalExtension();
         $new_name=md5(uniqid()).".".$ex;
         image::create([
            "product_id"=>$pro->id,
            "image"=>$new_name
         ]);
         $img->move(storage_path('app/public/images'),$new_name);
        }
         if($request->page =="back"){
            return redirect()->back();
         }else{
            return redirect()->route("view/product");
         }
    }

    public function edite($id)
    {
        $cat=catorgy::all();
        $data_pro=product::findOrfail($id);
        
        return view('admin.products.edite',compact("cat","data_pro"));
    }

    public function update(Request $req , $id)
    {
        if(empty($req->img)){
            product::update_product($req , $id);
            return redirect()->route("view/product");
        }else{
            image::delete_img($id);
            image::drop_img($id);
            image::create_img($req,$id);
            product::update_product($req , $id);
            return redirect()->route("view/product");

        }
    }

    public function delete($id)
    {
        // return $id;
        image::delete_img($id);
        product::where("id",$id)->with("images")->delete();
        return redirect()->route('view/product')->with("success_delete","successfully delete product");
    }
}
