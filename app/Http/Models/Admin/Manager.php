<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'manager' ;
    public $timestamps = false ;

    public function getStatus()
    {
        return $this->belongsTo(Status::class,'status','id') ;
    }

    public function getRole()
    {
        return $this->belongsTo(Role::class,'roleid','id') ;
    }
}
