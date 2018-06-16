<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{

    //
    protected $table = 'product_images';

    public $timestamps = false;

    public function defaultImage()
    {
        return $this->hasManyThrough(Comment::class,Product::class,'imageId','gid','imagePath') ;
    }

}
