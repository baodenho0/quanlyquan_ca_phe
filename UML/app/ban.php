<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ban extends Model
{
    //
    protected $table = "ban";

    public function hoadon(){
    	return $this->hasMany('App\hoadon','id_ban','id');
    }
}
