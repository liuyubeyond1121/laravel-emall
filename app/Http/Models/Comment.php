<?php

namespace App\Http\Models;

use App\Http\Models\Admin\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment' ;
    public $timestamps = false ;

    public function getUsername()
    {
        return $this->belongsTo(User::class,'uid','id') ;
    }

    public function getProductName()
    {
        return $this->belongsTo(Product::class,'gid','id') ;
    }
//    public function defaultImage()
//    {
//        return $this->hasManyThrough(ProductImages::class, Product::class,'imageId', 'imagePath','gid');
//    }
}
