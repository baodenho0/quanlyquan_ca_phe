<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 // chuyen huong
 // Route::get("chon-mon/return", function() {
 //     return redirect("/");
 // });
 //--


Route::group(['prefix' => 'admin','middleware'=>'checkdangxuat'], function() {
	Route::group(['middleware' => 'can:admin'], function() {
	    //middleware tài khoản admin
	Route::get('trang-chu', 'trangchuController@gettrangchu');
    // bàn
    Route::get('ban-an', 'bananController@getbanan');
    Route::post('ban-an','bananController@postbanan');
    Route::get('ban-an/sua/{id}','bananController@getsua');
    Route::post('ban-an/sua/{id}','bananController@postsua');
    Route::get('ban-an/xoa/{id}','bananController@getxoa');

    // --
    //danh mục
    Route::get('danh-muc', 'danhmucController@getdanhmuc');
    Route::post('danh-muc','danhmucController@postdanhmuc');
    Route::get('danh-muc/sua/{id}','danhmucController@getsua');
    Route::post('danh-muc/sua/{id}','danhmucController@postsua');
    Route::get('danh-muc/xoa/{id}','danhmucController@getxoa');
    //--
    // đồ uống
    Route::get('do-uong', 'douongController@getdouong');
    Route::get('do-uong/them','douongController@getthem');
    Route::post('do-uong/them','douongController@postthem');
    Route::get('do-uong/sua/{id}','douongController@getsua');
    Route::post('do-uong/sua/{id}','douongController@postsua');
    Route::get('do-uong/xoa/{id}','douongController@getxoa');
    //--
    // khuyen maix
    Route::get('khuyen-mai', 'khuyenmaiController@getkhuyenmai');
    Route::post('khuyen-mai', 'khuyenmaiController@postkhuyenmai');
    Route::get('khuyen-mai/sua/{id}', 'khuyenmaiController@getsua');
    Route::post('khuyen-mai/sua/{id}', 'khuyenmaiController@postsua');
    Route::get('khuyen-mai/xoa/{id}', 'khuyenmaiController@getxoa');
    //
    //--taikhoan
    Route::get('tai-khoan', 'taikhoanController@gettaikhoan');
    Route::post('tai-khoan', 'taikhoanController@posttaikhoan');
    Route::get('tai-khoan/sua/{id}', 'taikhoanController@getsua');
    Route::post('tai-khoan/sua/{id}', 'taikhoanController@postsua');
    Route::get('tai-khoan/xoa/{id}', 'taikhoanController@getxoa');
    //--
    Route::get('thong-tin','nguoidungController@gettoanbothongtin'); // lây toàn bộ thông tin
    Route::post('thong-tin','nguoidungController@posttimkiem'); //tim kiem

    }); // --tài khoản admin

    // cthd
    Route::group(['middleware' => 'can:phache'], function() {
    	// tai khoan nhân viên pha chế
    	Route::get('pha-che', 'cthdController@getphache');
   		Route::get('pha-che/capnhat/{id}', 'cthdController@getcapnhat');
    });
    Route::group(['middleware' => 'can:tieptan'], function() {
    	// tài khoản nhân viên tiếp tân
        Route::get('tiep-tan', 'cthdController@gettieptan');
    	Route::get('tiep-tan/capnhat/{id}', 'cthdController@getcapnhatthanhtoan');
    	Route::get('tiep-tan/goitieptan/{id}', 'cthdController@getgoitieptan');
    });
    
    //--
    Route::get('cap-nhat','taikhoanController@getcapnhap');
    Route::post('cap-nhat','taikhoanController@postcapnhap');
    Route::post('cap-nhat/thong-tin','taikhoanController@postcapnhatthongtin');
    // Route::get('test','taikhoanController@test');
    
});
// người dùng
 Route::get('/', 'nguoidungController@getchonban');
 Route::post('/', 'nguoidungController@postchonban');
 Route::get('chon-mon/{id}','nguoidungController@getchonmon');
 Route::post('chon-mon/{id}','nguoidungController@postchonmon'); //thêm vào giỏ hàng
 Route::get('xoa-gio-hang/{id}', 'nguoidungController@getxoagiohang');// xóa giỏ hàng
 Route::post('cap-nhat-gio-hang/{id}', 'nguoidungController@postcapnhatgiohang');// cập nhật giỏ hàng
 // Route::post('khuyenmai','nguoidungController@postkhuyenmai');
 Route::post('xac-nhan-chon-mon/{id}', 'nguoidungController@postxacnhanchonmon'); //luu vào csdl

 Route::get('thong-tin/{id}', 'nguoidungController@getthongtin');
 Route::get('tiep-tan/goitieptan/{id}','nguoidungController@getgoitieptan');

 //----------
 Route::group(['prefix' => 'admin/dang-nhap','middleware'=>'checkdangnhap'], function() {
     Route::get('/','dangnhapController@getdangnhap');
 	Route::post('/','dangnhapController@postdangnhap');
 });
 
 Route::get('dang-xuat','dangnhapController@getdangxuat');


 // Route::get('test','nguoidungController@test');
