<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ban;

class bananController extends Controller
{
    //
    public function getbanan(){
    	$data['ban'] = ban::all();
    	return view('admin.ban.ban-an',$data);
    }

    public function postbanan(Request $request){
    	$this->validate($request,[
    		'tenban'=>'required|unique:ban,tenban'
    	],[
    		'tenban.required'=>'Chưa nhập tên bàn!',
    		'tenban.unique'=>'Tên bàn đã tồn tại!'
    	]);

    	$ban = new ban;
    	$ban->tenban = $request->tenban;
    	$ban->save();
    	return back()->with('thongbao','Thêm thành công!');
    }

    public function getsua($id){
    	$data['banan'] = ban::find($id);

    	return view('admin.ban.sua',$data);
    }

    public function postsua(Request $request,$id){
    	$this->validate($request,[
    		'ten'=>'required|unique:ban,tenban',
    	],[
    		'ten.required'=>'Chưa nhập tên bàn!',
    		'ten.unique'=>'Tên bàn đã bị trùng!',
    	]);
    	$ban = ban::find($id);
    	$ban->tenban = $request->ten;
    	$ban->save();
    	return redirect('admin/ban-an')->with('thongbao','Cập nhật thành công!');
    }

    public function getxoa($id){
    	$ban = ban::find($id);
    	$ban->delete();
    	return redirect('admin/ban-an')->with('thongbao','Xóa thành công!');
    }
}
