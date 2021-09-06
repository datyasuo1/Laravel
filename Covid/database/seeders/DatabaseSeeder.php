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
       DB::table('list')->insert([
           [
               'CMND'=>'5813213',
               'hovaten'=> 'Kamisato Ayaka',
               'ngaythangnamsinh'=>'25/2/2000',
               'diachi'=>'Inazuma',
               'sdt'=>'0231151484',
               'tiensudiung'=>'Không',
           ],

           [
               'CMND'=>'98726125',
               'hovaten'=> 'Kaedehara Kazuha',
               'ngaythangnamsinh'=>'29/5/2000',
               'diachi'=>'Inazuma',
               'sdt'=>'094239464',
               'tiensudiung'=>'Không',
           ],

           [
               'CMND'=>'98726125',
               'hovaten'=> 'Raiden Ei',
               'ngaythangnamsinh'=>'23/1/2000',
               'diachi'=>'Inazuma',
               'sdt'=>'044697131',
               'tiensudiung'=>'Không',
           ],
       ]);
    }
}
