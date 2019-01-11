<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    //
    protected $table = "danhmuc";

    public function douong(){
    	return $this->hasMany('App\douong','id_danhmuc','id');
    }

   
}
