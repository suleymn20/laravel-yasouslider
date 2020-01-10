<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
        'name'=>'Süleyman Ünlü',
        'email'=>'suleymandogus2002@gmail.com',
        'password'=>bcrypt('sd2002uu'),
        'updated_at'=>now(),
        'created_at'=>now()
      ]);
    }
}
