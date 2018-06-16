<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'product';

    public $timestamps = false;

    public function defaultImage()
    {
        return $this->hasOne(ProductImages::class, 'productId', 'id');
    }
    
    public function thumbImages(){
        return $this->hasMany(ProductImages::class,'productId','id');   
    }

}



