<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\khuyenmai;

class khuyenmaiController extends Controller
{
    //
    public function getkhuyenmai(){
    	$data['khuyenmai'] = khuyenmai::all();
    	return view('admin.khuyenmai.khuyen-mai',$data);
    }
    public function postkhuyenmai(Request $request){
    	$this->validate($request,[
    		'ma'=>'required|unique:khuyenmai,makhuyenmai',
    		'giatien'=>'required|min:3|max:5',
    	],[
    		'ma.required'=>'Chưa nhập khuyến mãi!',
    		'ma.unique'=>'Khuyến mãi đã tồn tại!',
    		'giatien.required'=>'Chưa nhập giá tiền!',
    		'giatien.min'=>'Vui lòng nhập chính xác giá tiền!',
    		'giatien.max'=>'Vui lòng nhập chính xác giá tiền!',
    	]);

    	$khuyenmai = new khuyenmai;
    	$khuyenmai->makhuyenmai = $request->ma;
    	$khuyenmai->giatien = $request->giatien;
    	$khuyenmai->save();
    	return back()->with('thongbao','Thêm thành công!');
    }

    public function getsua($id){
    	$data['khuyenmai'] = khuyenmai::find($id);

    	return view('admin.khuyenmai.sua',$data);
    }

    public function postsua(Request $request,$id){
    	$this->validate($request,[
    		'ma'=>'required|unique:khuyenmai,makhuyenmai',
    		'giatien'=>'required|min:3|max:5',
    	],[
    		'ma.required'=>'Chưa nhập khuyến mãi!',
    		'ma.unique'=>'Khuyến mãi đã tồn tại!',
    		'giatien.required'=>'Chưa nhập giá tiền!',
    		'giatien.min'=>'Vui lòng nhập chính xác giá tiền!',
    		'giatien.max'=>'Vui lòng nhập chính xác giá tiền!',
    	]);
    	$khuyenmai = khuyenmai::find($id);
    	$khuyenmai->makhuyenmai = $request->ma;
    	$khuyenmai->giatien = $request->giatien;
    	$khuyenmai->save();
    	return redirect('admin/khuyen-mai')->with('thongbao','Cập nhật thành công!');
    }

    public function getxoa($id){
    	$khuyenmai = khuyenmai::find($id);
    	$khuyenmai->delete();
    	return redirect('admin/khuyen-mai')->with('thongbao','Xóa thành công!');
    }
}
