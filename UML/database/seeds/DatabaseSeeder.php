<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(danhmuc::class);
      
    }
}


class ban extends Seeder
{
	public function run(){
		DB::table('ban')->insert([
			// ['tenban'=>'Bàn 1'],
			['tenban'=>'Bàn 2'],
			['tenban'=>'Bàn 3'],
			['tenban'=>'Bàn 4'],
			// ['tenban'=>'Bàn 5']
		]);
	}
}

class users extends Seeder
{
	public function run(){
		DB::table('users')->insert([
			['taikhoan'=>'admin','password'=>bcrypt('admin'),'quyen'=>'admin'],
			['taikhoan'=>'admin1','password'=>bcrypt('admin1'),'quyen'=>'nhanvien'],
			['taikhoan'=>'admin2','password'=>bcrypt('admin2'),'quyen'=>'nhanvien'],
		]);
	}
}

class danhmuc extends Seeder
{
	public function run(){
		DB::table('danhmuc')->insert([
			['tendanhmuc'=>'Cà phê','tenkhongdau'=>'Ca-phe'],
			['tendanhmuc'=>'Thức uống đá xay','tenkhongdau'=>'Thuc-uong-da-xay'],
			['tendanhmuc'=>'Socola','tenkhongdau'=>'Socola'],
			['tendanhmuc'=>'Trà trái cây','tenkhongdau'=>'Tra-trai-cay'],
		]);
	}
}

// class douong extends Seeder
// {
// 	public function run(){
// 		BD::table('douong')->insert();
// 	}
// }