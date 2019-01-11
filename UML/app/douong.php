<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class douong extends Model
{
    //
    protected $table = "douong";

    public function danhmuc(){
    	return $this->belongsTo('App\danhmuc','id_danhmuc','id');
    }

    public function cthd(){
    	return $this->hasMany('App\cthd','id_douong','id');
    }
}
