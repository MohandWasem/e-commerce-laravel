<?php

namespace App\Http\Controllers\Api;

use App\Models\image;
use App\Models\catorgy;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\traits\ApiTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;

class productController extends Controller
{
    use ApiTrait;
    public function index()
    {
        $products=product::all();
        // return response()->json(compact('products'));     // return data
        return $this->Data(compact('products'),'All Products');
    }

    public function create()
    {
        $cat=catorgy::all();
        // return response()->json(compact('cat'));    // return data

        return $this->Data(compact('cat'));

    }

    public function edit($id)
    {
        $products=product::findOrFail($id);
        $cat=catorgy::all();
        // return response()->json(compact('products','cat'));   // return data
        return $this->Data(compact('products','cat'));
    }

    public function store(productRequest $request)
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

        // return response()->json(['success'=>true,'message'=>'products created successfully']); //return success message
        return $this->SuccessMessage('product created successfully',201);
    }
    public function update(Request $req , $id)
    {
        if(empty($req->img)){
            product::update_product($req , $id);
            // return response()->json(['success'=>true,'message'=>'product Updated no image ']); //return success message
            return $this->SuccessMessage('product updated successfully no image');
        }else{
            image::delete_img($id);
            image::drop_img($id);
            image::create_img($req,$id);
            product::update_product($req , $id);
            // return response()->json(['success'=>true,'message'=>'product Updated with image ']); //return success message
            return $this->SuccessMessage('product updated successfully with image');

        }
    }
    public function delete($id)
    {
        // return $id;
        $product=product::findOrFail($id);
        if($product){
            image::delete_img($id);
            product::where("id",$id)->with("images")->delete();
            // return response()->json(['success'=>true,'message'=>'product Deleted successfully ']); //return success message
            return $this->SuccessMessage('product deleted successfully ');

        }else{
            // return response()->json(['success'=>false,'message'=>'product Id Is invalid'],422); //return error message
            return $this->ErrorMessage(['id'=>'The Id Is Invalid'],'product Id Is invalid',422);


        }
        
    }
}
