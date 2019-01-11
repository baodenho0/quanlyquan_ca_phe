<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\hoadon;
use App\ban;
use App\douong;
use App\danhmuc;
use App\khuyenmai;
use App\cthd;
use Cart;


class nguoidungController extends Controller
{
    //
    public function getnguoidung(){
    	return view('admin.nguoi-dung');
    }

    public function getthongtin($id){
    	
    	$data['hoadon'] = hoadon::where('id_ban',$id)->where('tiendo','!=','Đã thanh toán')->get();
    	
    	
    	
    	return view('nguoidung.nguoi-dung',$data);
    }

    public function getgoitieptan($id){

    	$hoadon = hoadon::find($id);
    	$hoadon->goitieptan = "Đang gọi";
    	$hoadon->save();
    	return back();
    }

    public function gettoanbothongtin(){
    	$data['hoadon'] = hoadon::all()->sortByDesc("id");
    	return view('admin.nguoidung.nguoi-dung',$data);
    }

    //-------- tương tác người dùng
    public function getchonban(){
        $data['ban'] = ban::all();
        return view('nguoidung.chon-ban',$data);
    }

    public function postchonban(Request $request){
        $id = $request->ban;
        
        return redirect('chon-mon/'.$id);

    }
    public function getchonmon($id){

        $data['ban'] = $ban =  ban::find($id);
        $data['danhmuc'] = danhmuc::all();
        $data['douong'] = douong::all();
        $data['content'] = Cart::getContent();
        $data['total'] = Cart::getTotal();
        //$mon = Cart::getContent();
        //print_r($mon);
        if(!$ban){
            return redirect("/");
        } else
        return view('nguoidung.chon-mon',$data);
    }

    public function postchonmon(Request $request){
        $douong = douong::find($request->id);
        $add = Cart::add($request->id, $douong->ten, $douong->giatien, $request->soluong);
        return back();
       
    }

    public function getxoagiohang($id){
        Cart::remove($id);
        return back();
    }
    public function postcapnhatgiohang(Request $request,$id){
        Cart::update($id, array(
            'quantity' => array(
            'relative' => false,
            'value' => $request->soluong
          ),
        ));
        return back();
    }

    public function postxacnhanchonmon(Request $request,$id){
        if(Cart::isEmpty()){
            return back()->with('error','Chưa chọn đồ uống!');
        }
        $hoadon = new hoadon;
        $hoadon->id_ban = $id;
        $hoadon->tongtien = Cart::getTotal();
       
         if($request->has('ghichu')){
            $hoadon->ghichu = $request->ghichu;
        }
        if($request->has('khuyenmai')){
            $khuyenmai = khuyenmai::where('makhuyenmai',$request->khuyenmai)->get()->first();
            if($khuyenmai){
                
                 $hoadon->tongtien = $hoadon->tongtien - $khuyenmai->giatien;
            }
        }

        $hoadon->save();
        // luu chi tiet hoa don 
        $giohang = Cart::getContent();
        foreach ($giohang as $gh ) {
            $hoadon->cthd = new cthd;
          $hoadon->cthd->soluong = $gh->quantity;
          $hoadon->cthd->giatien = $gh->price * $gh->quantity;
          $hoadon->cthd->id_hoadon = $hoadon->id;
          $hoadon->cthd->id_douong = $gh->id;
          $hoadon->cthd->save();
          Cart::clear();
        }
        return redirect('thong-tin/'.$id);
        

    }
    // tim kiem
    public function posttimkiem(Request $request){
        $this->validate($request,[
            'tungay' => 'required'
        ],[
            'tungay.required'=>'Chưa nhập ngày tìm kiếm!',
        ]);
        if($request->filled('denngay')){
            if($request->denngay < $request->tungay){
                return back()->with('error','Lỗi tìm kiếm ngày!');
            }
            else{
                $data['hoadon'] = hoadon::whereRaw("created_at >= ? AND created_at <= ?",[($request->tungay)." 00:00:00",($request->denngay)." 23:59:59"])->get();
                return view('admin.nguoidung.nguoi-dung',$data);
            }
        }
        else{
        $data['hoadon'] = hoadon::whereDate('created_at',date($request->tungay))->get();
        return view('admin.nguoidung.nguoi-dung',$data);
        }
    }
    //--

    // public function test(){
    //     $giohang = Cart::getContent();
    //     foreach ($giohang as $key) {
    //        foreach ($giohang as $gh ) {
    //       $hoadon->cthd->soluong = $gh->quantity;
    //       $hoadon->cthd->giatien = $gh->price * $gh->quantity;
    //       $hoadon->cthd->id_hoadon = $hoadon->id;
    //       $hoadon->cthd->id_douong = $gh->id;
    //       $hoadon->cthd->save();
    //       echo "ok";
    //     }
    //     }
    // }
}
