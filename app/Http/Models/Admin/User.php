<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user' ;
    public $timestamps = false ;

    public function getSex()
    {
        return $this->belongsTo(Sex::class,'sex','id') ;
    }

    public function getStatus()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }
}
