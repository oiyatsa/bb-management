<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
                'food_name' => '食品',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '〇個',
                'note'=>'メモ書き',
                'search_recipie_name'=>'レシピ検索用',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
    }
}
