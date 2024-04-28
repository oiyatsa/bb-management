<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    
    protected $fillable = [
    'food_name',
    'remaining_amount',
    'expiration_date',
    'search_recipie_name',
    'category_id',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}