<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cthd extends Model
{
    //
    protected $table = "cthd";

    public function douong(){
    	return $this->belongsTo('App\douong','id_douong','id');
    }

    public function hoadon(){
    	return $this->belongsTo('App\hoadon','id_hoadon','id');
    }

}
