<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use User;
use Auth;

class dangnhapController extends Controller
{
    //
    public function getdangnhap(){
    	return view('admin.dangnhap.dangnhap');
    }
    public function postdangnhap(Request $request){
        if($request->remember = "Remember Me"){
            $remember = true;
        }
        else{
            $remember = false;
        }
    	if(Auth::attempt(['taikhoan'=>$request->taikhoan,'password'=>$request->password,'quyen'=>'admin'],$remember)){
    		return redirect('admin/trang-chu');
    	}
        else if(Auth::attempt(['taikhoan'=>$request->taikhoan,'password'=>$request->password,'quyen'=>'Nhân viên tiếp tân'],$remember)){
            return redirect('admin/tiep-tan');
        }
        else if(Auth::attempt(['taikhoan'=>$request->taikhoan,'password'=>$request->password,'quyen'=>'Nhân viên pha chế'],$remember)){
            return redirect('admin/pha-che');
        }
    	else{
    		return back()->with('error','Đăng nhập thất bại!');
    	}
    	
    }

    public function getdangxuat(){
        Auth::logout();
        return redirect('admin/dang-nhap');
    }
}
