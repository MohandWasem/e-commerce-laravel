<?php

namespace App\Models;

use App\Models\image;
use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class image extends Model
{
    use HasFactory;
    protected $fillable=[
        "product_id","image"
    ];

    public function product()
    {
        return $this->belongsTo(product::class,"id","product_id");
    }

    public static function delete_img($id)
    {
        $img=image::where("product_id",$id)->get();
        foreach ($img as $file_img ) {
           unlink(storage_path()."/app/public/images/".$file_img->image);
        }
    }

    public static function drop_img($id)
    {
          image::where("product_id",$id)->delete();
    }

    public static function create_img($req,$id)
    {
        foreach ($req->img as $img) {
           $ex=$img->getClientOriginalExtension();
           $new_name=md5(uniqid()).".".$ex;
           image::create([
               "product_id"=>$id,
               "image"=>$new_name
           ]);
           $img->move(storage_path("app/public/images"),$new_name);
        }
    }
}
