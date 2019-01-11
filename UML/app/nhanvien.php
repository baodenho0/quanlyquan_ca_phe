<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    //
    protected $table = "nhanvien";

    public function users(){
    	return $this->belongsTo('App\user','id_users','id');
    }
}
