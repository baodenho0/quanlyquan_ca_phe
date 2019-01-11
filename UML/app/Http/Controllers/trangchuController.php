<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ban;
use App\danhmuc;
use App\douong;
use App\hoadon;
use App\khuyenmai;
use App\user;


class trangchuController extends Controller
{
    //
    public function gettrangchu(){
    	$data['ban'] = ban::all();
    	$data['danhmuc'] = danhmuc::all();
    	$data['douong'] = douong::all();
    	$data['hoadon'] = hoadon::all();
    	$data['khuyenmai'] = khuyenmai::all();
    	$data['user'] = user::all();
    	return view('admin.trangchu.trang-chu',$data);
    }
    // báo cáo
}
