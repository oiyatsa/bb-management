<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Food extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;
    protected $table = 'foods';
    
    protected $fillable = [
    'food_name',
    'remaining_amount',
    'expiration_date',
    'search_recipie_name',
    'category_id',
    'note',
    'image',
    'user_id'
    ];
    
    //public $sortable = ['created_at', 'expiration_date'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // function getPaginateByLimit(int $limit_count = 20)
    // {
    //     return $this::with('user')->paginate($limit_count);
    // }
}