<?php

namespace App\Http\Models;

use App\Http\Models\Admin\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    protected $table = 'orders' ;
    public $timestamps = false ;

    public function getUsername()
    {
        return $this->belongsTo(User::class,'uid','id') ;
    }

    public function getRecName()
    {
        return $this->belongsTo(Address::class,'aid','id') ;
    }

    public function getStatus()
    {
        return $this->belongsTo(Orderstatu::class,'status','id') ;
    }

    public function getProduct()
    {
        return $this->belongsTo(Product::class,'gid','id') ;
    }
    public function getDefaultImage($imageId)
    {
//        return ProductImages::all('imagePath')->where('id',$imageId) ;
        $obj =  DB::table('product_images')->select('imagePath')->where('id',$imageId)->first() ;
        return $obj->imagePath ;
    }
}
