<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;
use App\Http\Requests\FoodRequest;

class FoodController extends Controller
{
    public function index(Food $food)
    {
        return view('Foods.index')->with(['foods' => $food->get()]);
        //Foodsファイルのindex（blade.php）を参照、かえす
    }
    
    public function add(Category $category)
    {
        return view('Foods.add')->with(['categories' => $category->get()]);
    }
    
    public function store(FoodRequest $request, Food $food)
    {
        $input = $request['food'];
        $food->fill($input)->save();
        return redirect('/foods');
    }
    
    //function edit追加
    
    
    
    
}
