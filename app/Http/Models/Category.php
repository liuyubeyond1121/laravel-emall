<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';

    public $timestamps = false;

    public function children()
    {
        return $this->hasMany(self::class, 'parentId', 'id');
    }

   /* public function parent()
    {
        return $this->belongsTo(self::class,'id','parentId') ;
    }*/
}
