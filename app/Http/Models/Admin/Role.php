<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role' ;
    public $timestamps = false ;

    public function getUsername()
    {
        return $this->hasMany(Manager::class,'roleid','id') ;
    }
}
