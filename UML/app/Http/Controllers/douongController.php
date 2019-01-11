<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\douong;
use App\danhmuc;

class douongController extends Controller
{
    //
    public function getdouong(){
    	$data['douong'] = douong::all();
    	return view('admin.douong.do-uong',$data);
    }

    public function getthem(){
    	$data['danhmuc'] = danhmuc::all();

    	return view('admin.douong.them',$data);
    }
    public function postthem(Request $request){
    	$this->validate($request,[
    		'ten'=>'required|unique:douong,ten',
    		'giatien'=>'required|min:3|max:6',
    		'anh'=>'required|mimes:jpg,jpeg,png',
    		'mota'=>'required',
    	],[
    		'ten.required'=>'Chưa nhập tên!',
    		'ten.unique'=>'Tên bị trùng!',
    		'giatien.required'=>'Chưa nhập giá tiền!',
    		'giatien.min'=>'Vui lòng nhập đúng giá tiền!',
    		'giatien.max'=>'Vui lòng nhập đúng giá tiền!',
    		'anh.required'=>'Chưa có ảnh!',
    		'anh.mimes'=>'Chỉ được phép tải ảnh!',
    		'mota.required'=>'Chưa có mô tả!',
    	]);
    	$douong = new douong;
    	$douong->ten = $request->ten;
    	$douong->tenkhongdau = str_slug($request->ten);
    	$douong->giatien = $request->giatien;
    	$douong->mota = $request->mota;
    	$douong->id_danhmuc = $request->danhmuc;
    	// --- upload anh
    	$anh = $request->file('anh');
		$anh_name = str_random(4)."-".$anh->getClientOriginalName();
		$anh->move('layouts/upload/img',$anh_name);
		$douong->anh = $anh_name;
		
    	// --- 
    	$douong->save();
    	return back()->with('thongbao','Thêm thành công!');


    }

    public function getsua($id){
    	$data['danhmuc'] = danhmuc::all();
    	$data['douong'] = douong::find($id);
    	return view('admin.douong.sua',$data);
    }
    public function postsua(Request $request,$id){
    	$this->validate($request,[
    		'ten'=>'required|unique:douong,ten',
    		'giatien'=>'required|min:3|max:6',
    		'anh'=>'mimes:jpg,jpeg,png',
    		'mota'=>'required',
    	],[
    		'ten.required'=>'Chưa nhập tên!',
    		 'ten.unique'=>'Tên bị trùng!',
    		'giatien.required'=>'Chưa nhập giá tiền!',
    		'giatien.min'=>'Vui lòng nhập đúng giá tiền!',
    		'giatien.max'=>'Vui lòng nhập đúng giá tiền!',
    		// 'anh.required'=>'Chưa có ảnh!',
    		'anh.mimes'=>'Chỉ được phép tải ảnh!',
    		'mota.required'=>'Chưa có mô tả!',
    	]);
    	$douong = douong::find($id);
    	$douong->ten = $request->ten;
    	$douong->tenkhongdau = str_slug($request->ten);
    	$douong->giatien = $request->giatien;
    	$douong->mota = $request->mota;
    	$douong->id_danhmuc = $request->danhmuc;
    	// --- upload anh
    	
		if($request->hasFile('anh')){
		$anh = $request->file('anh');
		$anh_name = str_random(4)."-".$anh->getClientOriginalName();
		unlink('layouts/upload/img/'.$douong->anh);
		$anh->move('layouts/upload/img',$anh_name);
		$douong->anh = $anh_name;
		}
		
		
    	// --- 
    	$douong->save();
    	return back()->with('thongbao','Cập nhật thành công!');
    }

    public function getxoa($id){
    	$douong = douong::find($id);
    	unlink('layouts/upload/img/'.$douong->anh);
    	$douong->delete();
    	return back()->with('thongbao','Xóa thành công!');
    }

    


}
