<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index(Food $food)
    {
        return view('Foods.show')->with(['foods' => $food->get()]);
        //Foodsファイルのshow（blade.php）を参照、かえす
    }
}
