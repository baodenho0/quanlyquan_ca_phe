<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCthd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthd', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soluong');
            $table->integer('giatien');
            $table->integer('id_hoadon')->unsigned();
            $table->foreign('id_hoadon')->references('id')->on('hoadon')->onDelete('cascade');
            $table->integer('id_douong')->unsigned();
            $table->foreign('id_douong')->references('id')->on('douong')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cthd');
    }
}
