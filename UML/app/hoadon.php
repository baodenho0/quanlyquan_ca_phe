<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    //
    protected $table ="hoadon";

    public function cthd(){
    	return $this->hasMany('App\cthd','id_hoadon','id');
    }

    public function ban(){
    	return $this->belongsTo('App\ban','id_ban','id');
    }

    // public function douong(){
    // 	return $this->hasManyThrough('App\douong','App\cthd','id_hoadon','id_douong','id');
    // }
}
