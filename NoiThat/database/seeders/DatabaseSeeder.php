<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noithat')->insert([
            [
                'id_name'=>'A123',
                'name'=>'Bàn Nhân Viên',
                'price'=>'12000000',
                'image'=>'ban-nhan-vien (2).jpeg',
            ],
            [
                'id_name'=>'CA1234',
                'name'=>'Ghế Dài',
                'price'=>'5120000',
                'image'=>'DSC05453.jpg',
            ],
            [
                'id_name'=>'MN2345',
                'name'=>'Kệ TiVi',
                'price'=>'2300000',
                'image'=>'ke-tivi-don-gian-ghc-3300-1.jpg',
            ],
        ]);
    }
}
