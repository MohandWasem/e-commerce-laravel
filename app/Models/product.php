<?php

namespace App\Models;

use App\Models\User;
use App\Models\image;
use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $fillable=[
        "name","price","sale","count","cat"
    ];

    //  يتجاهل اضافتهم في داتابيز
    // protected $guarded=[
    //           'name','count'
    // ];

    public function images()
    {
        return $this->hasMany(image::class,"product_id","id");
    }

    public static function update_product( $req , $id)
    {
        product::where("id",$id)->update([
            "name"=>$req->name,
            "price"=>$req->price,
            "sale"=>$req->sale,
            "count"=>$req->count,
            "cat"=>$req->cat,
          ]);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,"carts");
    }
}
