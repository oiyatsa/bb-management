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
                'food_name' => 'かれー',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '〇個',
                'category_id' => 1,
                'note'=>'メモ書き',
                'search_recipie_name'=>'レシピ検索用',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
        ]);  
        
        DB::table('foods')->insert([
                'food_name' => 'にんじん',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '〇個',
                'category_id' => 2,
                'note'=>'メモ書き',
                'search_recipie_name'=>'レシピ検索用',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'りんご',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '〇個',
                'category_id' => 3,
                'note'=>'メモ書き',
                'search_recipie_name'=>'レシピ検索用',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'だいこん',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '〇個',
                'category_id' => 2,
                'note'=>'メモ書き',
                'search_recipie_name'=>'レシピ検索用',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'みかん',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '〇個',
                'category_id' => 3,
                'note'=>'メモ書き',
                'search_recipie_name'=>'レシピ検索用',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'うどん',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '〇個',
                'category_id' => 4,
                'note'=>'メモ書き',
                'search_recipie_name'=>'レシピ検索用',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'たまねぎ',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '〇個',
                'category_id' => 5,
                'note'=>'メモ書き',
                'search_recipie_name'=>'レシピ検索用',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                
        ]);     
    }
}
