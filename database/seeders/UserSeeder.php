<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        //
        DB::table('users')->insert([
            
            'name'=>'Sau',
            'email'=>'s1216ayu@gmail.com',
            'password'=> Hash::make('Ch108ssgb'),
            ]);
            
            DB::table('users')->insert([
            
            'name'=>'Sa',
            'email'=>'s1216@gmail.com',
            'password'=> Hash::make('Ch108ssgb44'),
            ]);
    }
}
