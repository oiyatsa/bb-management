<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;
use App\Http\Requests\FoodRequest;
use Cloudinary;

class FoodController extends Controller
{
    public function index(Category $category, Food $food, Request $request)
    {
       
        $category1 = $food->where('category_id', 3)->get();
       
       
       
       if(is_array($request->input('categories'))){

    $query->where(function($q) use($request){
        foreach($request->input('categories') as $category){
            $q->orWhere('category',$category);
           }
        });
    }
        
        return view('Foods.index')->with([
            'categories' => $category,
            'foods' => $food->orderBy('expiration_date', 'asc')->get(),
            'categories1' => $category1
            ]);
        
        
        
    }
    
    public function add(Category $category)
    {
        return view('Foods.add')->with(['categories' => $category->get()]);
    }
    
    public function store(FoodRequest $request, Food $food)
    {
        $image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        //dd($image_url);
        
        $input = $request['food'];
        //$input = $request->all();
        $input += ['image' => $image];
        $food->fill($input)->save();
        return redirect('/foods');
    }
    
    //function edit追加
    public function edit(Food $food, Category $category)
    {
        return view('Foods.edit')->with([
            'food' => $food,
            'categories' => $category->get()
            ]);
    }
    
    public function update(FoodRequest $request, Food $food)
    {
        $input_food = $request['food'];
        $food->fill($input_food)->save();
        return redirect('/foods/');
    }
    
    public function delete(Food $food)
    {
        $food->delete();
        return redirect('/foods');
    }
    
    
    
    
}
