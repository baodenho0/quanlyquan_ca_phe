<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\hoadon;
use App\cthd;

class cthdController extends Controller
{
    //
    public function getphache(){
    	$data['hoadon'] = hoadon::where('tiendo','Đang pha chế')->get();
    	return view('admin.cthd-phache.cthd',$data);
    }
    public function gettieptan(){
    	$data['hoadon'] = hoadon::where('tiendo','!=','Đã thanh toán')->get();
    	return view('admin.cthd-tieptan.cthd',$data);
    }

    public function getcapnhat($id){
    	$hoadon = hoadon::find($id);
    	$hoadon->tiendo = "Đã pha chế";
    	$hoadon->save();
    	return redirect('admin/pha-che')->with('thongbao','Đã cập nhật tiến độ!');
    }
    public function getcapnhatthanhtoan($id){
    	$hoadon = hoadon::find($id);
    	$hoadon->tiendo = "Đã thanh toán";
    	$hoadon->save();
    	return redirect('admin/tiep-tan')->with('thongbao','Đã cập nhật tiến độ!');
    }
    public function getgoitieptan($id){
    	$hoadon = hoadon::find($id);
    	$hoadon->goitieptan = NULL;
    	$hoadon->save();
    	return back();
    }

}
