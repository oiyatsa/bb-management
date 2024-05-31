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
                'food_name' => 'マヨネーズ',
                'expiration_date' => '2000-01-01',
                'remaining_amount'=> '900ml',
                'category_id' => 1,
                'note'=>'メモ書き',
                'search_recipie_name'=>'マヨネーズ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1
                
        ]);  
        
        DB::table('foods')->insert([
                'food_name' => 'にんじん',
                'expiration_date' => '2026-01-01',
                'remaining_amount'=> '3本',
                'category_id' => 2,
                'note'=>'メモ書き',
                'search_recipie_name'=>'にんじん',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'りんご',
                'expiration_date' => '2025-02-01',
                'remaining_amount'=> '5個',
                'category_id' => 3,
                'note'=>'メモ書き',
                'search_recipie_name'=>'りんご',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'だいこん',
                'expiration_date' => '2025-03-01',
                'remaining_amount'=> '1本',
                'category_id' => 2,
                'note'=>'メモ書き',
                'search_recipie_name'=>'だいこん',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'みかん',
                'expiration_date' => '2024-12-05',
                'remaining_amount'=> '10個',
                'category_id' => 3,
                'note'=>'メモ書き',
                'search_recipie_name'=>'みかん',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'さぬきうどん',
                'expiration_date' => '2025-06-01',
                'remaining_amount'=> '4玉',
                'category_id' => 4,
                'note'=>'メモ書き',
                'search_recipie_name'=>'うどん',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1
                
        ]);     
        
        DB::table('foods')->insert([
                'food_name' => 'たまねぎ',
                'expiration_date' => '2024-09-01',
                'remaining_amount'=> '6個',
                'category_id' => 5,
                'note'=>'メモ書き',
                'search_recipie_name'=>'たまねぎ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1
        ]);     
    }
}
