// load dialog
$(document).ready(function() {

  $(".giohang_monan").click(function( event ){
    event.preventDefault();
      $(".overlay").fadeToggle("fast");
    });
  
  $(".overlayLink").click(function(event){
    event.preventDefault();
    var action = $(this).attr('data-action');
    
    $.get( "ajax/" + action, function( data ) {
      $( ".login-content" ).html( data );
    }); 
    
    $(".overlay").fadeToggle("fast");
  });
  
  $(".close").click(function(){
    $(".overlay").fadeToggle("fast");
  });
  
  $(document).keyup(function(e) {
    if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
      event.preventDefault();
      $(".overlay").fadeToggle("fast");
    }
  });
});

// ----------
// lay du lieu

  $('.giohang_monan').on('click',function(){
    var soluong = 1;
    var hinhanh = $(this).find("img").attr("src");
    
    var id = $(this).find(".id").text();
    // console.log(id);
    var ten = $(this).find("h4").text();
    if($(this).find(".soluong").length){
    var soluong = $(this).find(".soluong").text();
    }
    var tien = $(this).find(".tien").text();
    // cộng tiền

    var tien_show = tien*soluong;
    //--
    if($(this).find(".ghichu").length)
    var ghichu = $(this).find(".ghichu").text();
    $('.login-content').find(".ten_show").html(ten);
    $('.login-content').find(".soluong_show").html(soluong);
    $('.login-content').find(".ghichu_show").val(ghichu);
    $('.login-content').find(".tien_show").html(tien_show);
    $('.login-content').find("img").attr("src",hinhanh);
    // ----input

    $('.id_hidden').val(id);
  });

// -----

// cong so luong
  $('.cong_show').on('click',function(){
    var soluong = $('.soluong_show').text();
    soluong++;
    
    $('.soluong_show').html(soluong);
    $('.soluong_hidden').val(soluong);
    

  });
// tru so luong
  $('.tru_show').on('click',function(){
    var soluong = $('.soluong_show').text();
    
    if(soluong>0)
    soluong--;
    
    $('.soluong_show').html(soluong);
    $('.soluong_hidden').val(soluong);
    
  });
// --------

// them gio hang
  $('#themvaogiohang').on('click',function(){

    var hinhanh = $('.login-content').find(".hinhanh_show").attr("src");
    var ten = $('.login-content').find(".ten_show").text();
    var soluong = $('.login-content').find(".soluong_show").text();
    var tien = $('.login-content').find(".tien_show").text();
    var ghichu = $('.login-content').find(".ghichu_show").val();
    if(soluong >0){
    // them thuc su
    
    // -----
    }
    $(".overlay").fadeToggle("fast");
  });

// ------
// cộng giá tiền tien_show
  $('.giohang_monan').on('click',function(){
    var tien = $(this).find(".tien").text();
    
    $('.cong_show').on('click',function(){
      var soluong = $('.soluong_show').text();
      var tien_show = 0;
      tien_show = soluong * tien;
      $('.tien_show').html(tien_show);
    });
    $('.tru_show').on('click',function(){
      var soluong = $('.soluong_show').text();
      var tien_show = 0;
      tien_show = soluong * tien;
      $('.tien_show').html(tien_show);
    });
  });
  
//------
// di chuyen id

 

 //--