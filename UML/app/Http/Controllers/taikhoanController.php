<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\user;
use App\nhanvien;
use Auth;


class taikhoanController extends Controller
{
    //
    public function gettaikhoan(){
    	$data['taikhoan'] = user::all();
    	return view('admin.taikhoan.tai-khoan',$data);
    }
    public function posttaikhoan(Request $request){
    	$this->validate($request,[
    		'taikhoan'=>'required|unique:users,taikhoan',
    		'password'=>'required',
    	],[
    		'taikhoan.required'=>'Chưa nhập tài khoản!',
    		'taikhoan.unique'=>'Tài khoản đã tồn tại!',
    		'password.required'=>'Chưa nhập mật khẩu!',

    	]);
    	$taikhoan = new user;
    	$taikhoan->taikhoan = $request->taikhoan;
    	$taikhoan->password = bcrypt($request->password);
    	$taikhoan->quyen = $request->quyen;
    	$taikhoan->save();
        $taikhoan->nhanvien = new nhanvien;
        $taikhoan->nhanvien->id_users = $taikhoan->id;
        $taikhoan->nhanvien->save();
    	return back()->with('thongbao','Tạo tài khoản thành công!');
    }

    public function getsua($id){
    	$data['taikhoan'] = user::find($id);
    	return view('admin.taikhoan.sua',$data);
    }
    public function postsua(Request $request,$id){
    	$this->validate($request,[
    		// 'taikhoan'=>'required|unique:users,taikhoan',
    		'password'=>'required',
    	],[
    		//'taikhoan.required'=>'Chưa nhập tài khoản!',
    		//'taikhoan.unique'=>'Tài khoản đã tồn tại!',
    		'password.required'=>'Chưa nhập mật khẩu!',

    	]);
    	$taikhoan = user::find($id);
    	//$taikhoan->taikhoan = $request->taikhoan;
    	$taikhoan->password = bcrypt($request->password);
    	//$taikhoan->quyen = $request->quyen;
    	$taikhoan->save();
    	return back()->with('thongbao','Cập nhật thành công!');
    }

    public function getxoa($id){
    	$taikhoan = user::find($id);
    	// dùng Auth sau khi đăng nhập
    	if($id != Auth::id()){
    	$taikhoan->delete();
    	return back()->with('thongbao','Xóa thành công!');
    	}
    	else{
    	return back()->with('thongbao','Lỗi xóa!');
    	}
    }

    public function getcapnhap(){
        $data['taikhoan'] = user::find(Auth::user()->id);
        return view('admin.taikhoan.cap-nhap',$data);
    }
    public function postcapnhap(Request $request){
        $this->validate($request,[
            'oldpass'=>'required',
            'newpass'=>'required',
        ],[
            'oldpass.required'=>'Chưa nhập mật khẩu cũ!',
            'newpass.required'=>'Chưa nhập mật khẩu mới',
        ]);
        
        if(Auth::attempt(['taikhoan'=>Auth::user()->taikhoan,'password'=>$request->oldpass])){
            $taikhoan = user::find(Auth::user()->id);
            $taikhoan->password = bcrypt($request->newpass);
            $taikhoan->save();
            return back()->with('thongbao','Đổi mật khẩu thành công!');
            
        }
        else{
            return back()->with('error','Sai mật khẩu cũ!');
        }
    }

    public function postcapnhatthongtin(Request $request){
        $this->validate($request,[
            'ten'=>'required',
            'ngaysinh'=>'required',
            'gioitinh'=>'required',
            'cmnd'=>'required',
            'sdt'=>'required',
            'diachi'=>'required',
        ],[
            'ten.required'=>'Chưa nhập họ tên',
            'ngaysinh.required'=>'Chưa nhập ngày sinh',
            'gioitinh.required'=>'Chưa nhập giới tính',
            'cmnd.required'=>'Chưa nhập CMND',
            'sdt.required'=>'Chưa nhập số điện thoại',
            'diachi.required'=>'Chưa nhập địa chỉ',
        ]);
        $taikhoan = user::find(Auth::user()->id);
        
        
        $taikhoan->nhanvien->ten = $request->ten;
        $taikhoan->nhanvien->ngaysinh = $request->ngaysinh;
        $taikhoan->nhanvien->gioitinh = $request->gioitinh;
        $taikhoan->nhanvien->cmnd = $request->cmnd;
        $taikhoan->nhanvien->sdt = $request->sdt;
        $taikhoan->nhanvien->diachi = $request->diachi;
        $taikhoan->nhanvien->save();
        return back()->with('thongbao','Đã cập nhật thông tin!');
        
    }

    // public function test(){
    //     echo Auth::user()->id;
    //     $nhanvien = user::find(Auth::user()->id);
    //     echo "<br>";
    //     echo $nhanvien;
    //     echo "<br>";
    //     echo $nhanvien->nhanvien->ten;
    //     $nhanvien->nhanvien->ten = "test";
    //     $nhanvien->nhanvien->save();
    //     echo "<br>";
    //     echo $nhanvien->nhanvien->ten;
    // }

    
}
