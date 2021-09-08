<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('furnitures')->insert([
           [
               'name'=>'Bàn nhân viên văn phòng',
               'price'=>'3375000',
               'image'=>'ban-nhan-vien (2).jpeg',
           ],
            [
                'name'=>'Kệ đầu giường gỗ',
                'price'=>'3375000',
                'image'=>'images (12).jpg',
            ],
            [
                'name'=>'Sofa vải Libby 4 chỗ',
                'price'=>'20770000 ',
                'image'=>'DSC05453.jpg',
            ],
            [
                'name'=>'Kệ tivi đơn giản, kệ tivi ',
                'price'=>'2500000',
                'image'=>'ke-tivi-don-gian-ghc-3300-1.jpg',
            ],
        ]);
    }
}
