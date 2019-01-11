<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\danhmuc;

class danhmucController extends Controller
{
    //
    public function getdanhmuc(){
    	$data['danhmuc'] = danhmuc::all();
    	return view('admin.danhmuc.danh-muc',$data);
    }

    public function postdanhmuc(Request $request){
    	$this->validate($request,[
    		'ten'=>'required|unique:danhmuc,tendanhmuc'
    	],[
    		'ten.required'=>'Không được để trống!',
    		'ten.unique'=>'Danh mục bị trùng!',
    	]);

    	$danhmuc = new danhmuc;
    	$danhmuc->tendanhmuc = $request->ten;
    	$danhmuc->tenkhongdau = str_slug($request->ten);
    	$danhmuc->save();
    	return back()->with('thongbao','Thêm thành công!');
    }

    public function getsua($id){
    	$data['danhmuc'] = danhmuc::find($id);
    	return view('admin.danhmuc.sua',$data);
    }
    public function postsua(Request $request,$id){
    	$this->validate($request,[
    		'ten'=>'required|unique:danhmuc,tendanhmuc',
    	],[
    		'ten.required'=>'Không được để trống',
    		'ten.unique'=>'Danh mục bị trùng'
    	]);
    	$danhmuc = danhmuc::find($id);
    	$danhmuc->tendanhmuc = $request->ten;
    	$danhmuc->tenkhongdau = str_slug($request->ten);
    	$danhmuc->save();

    	return redirect('admin/danh-muc')->with('thongbao','Cập nhật thành công!');
    }

    public function getxoa($id){
    	$danhmuc = danhmuc::find($id);
    	$danhmuc->delete();
    	return redirect('admin/danh-muc')->with('thongbao','Xóa thành công!');
    }
}
