<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;
use App\Http\Requests\FoodRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FoodController extends Controller
{
    public function index(Category $category, Food $food, Request $request)
    {
    //     $foods = $food->get();
    //  $lefts=[];
    //  foreach($foods as $food){
    //     $expiration_date = $food->expiration_date;
    //     $expirations_date=(string)$expiration_date;
    //     $today = new Carbon('today');
    //   $limit = new Carbon($expirations_date);
    //   $left = $limit->diffInDays($today);
    //     $lefts[]=$left;
    //     $leftDay = $lefts[]->sort()
    //  }
        //dd($lefts);
        
        $sort = $request->sort;
        $storages = $request->storages;
    
      if($storages===null && $sort===null){
         $food = $food->where('user_id',Auth::id())->get();
      }elseif($storages===null){
          $food = $food->where('user_id',Auth::id())->orderBy('expiration_date' , $sort)->get();
      }elseif($sort===null){
          $food = $food->where('user_id',Auth::id())->where('category_id', $storages)->get();
      }else{
          $food = $food->where('user_id',Auth::id())->where('category_id', $storages)->orderBy('expiration_date' , $sort)->get();
       
      }
      
       $foods = $food;
       foreach($foods as $food){
          $expiration_date = $food->expiration_date;
          $expirations_date=(string)$expiration_date;
          $today = new Carbon('today');
         $limit = new Carbon($expirations_date);
         $left = $limit->diffInDays($today);
         
        // if ($today->lessThan($limit)) {
        //     $left = $limit->diffInDays($today);;
        // }else{
        //     
          $food["left"] = $left;
       }
        
       //dd($foods);
      
        return view('Foods.index')->with([
               'categories' => $category,
               'foods' => $foods,
               ]);
        
        
       
       //if($sort==='asc'){
          // return view('Foods.index')->with([
    //           'categories' => $category,
    //       /     'foods' => $food
    //           ]);
    //   }elseif($sort==='desc'){
    //       return view('Foods.index')->with([
    //           'categories' => $category,
    //           'foods' => $food
    //           ]);
    //   }else{
    //       return view('Foods.index')->with([
    //           'categories' => $category,
    //           'foods' => $food->get(),
    //           ]);
    //   }
       
          //dd($storages);
    //     if($storages==='fridge'){
    //      $food = $food->where('categories', 1)->orderBy('expiration_date' , $sort)->get();
    //  }elseif($storages==='freezer'){
    //       $food = $food->where('categories', 2)->orderBy('expiration_date' , $sort)->get();
    //   }elseif($storages==='vegi'){
    //       $food = $food->where('categories', 3)->orderBy('expiration_date' , $sort)->get();
    //   }elseif($storages==='sink'){
    //      $food = $food->where('categories', 4)->orderBy('expiration_date' , $sort)->get();
    //   }elseif($storages==='others'){
    //      $food = $food->where('categories', 5)->orderBy('expiration_date' , $sort)->get();
    //   }else{
    //       $food = $food->orderBy('expiration_date' , $sort)->get();
    //   }
     
    
    
        //一覧表示
        //return view('Foods.index')->with([
            //'categories' => $category,
            //'foods' => $food->orderBy('expiration_date', 'asc')->get(),
            //'categories1' => $category1
            //]);
    
    }
    
    
    public function add(Category $category)
    {
        return view('Foods.add')->with(['categories' => $category->get()]);
    }
    
    public function store(FoodRequest $request, Food $food)
    {
        //$image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        //dd($image_url);
        
        $input = $request['food'];
        $input += ['user_id' => $request->user()->id]; //補足09-3、追加
        if($request->file('image')){
            $image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image' => $image];
        }
        //$input = $request->all();
        
       // $input += ['image' => $image];
        $food->fill($input)->save();
        return redirect('/foods');
    }
    
    public function edit(Food $food, Category $category)
    {
       
        return view('Foods.edit')->with([
            'food' => $food,
            'categories' => $category->get()
            ]);
    }
    
    public function update(FoodRequest $request, Food $food)
    {
        
        //$image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
         //dd($request->file('image'));
         
        $input = $request['food'];
        $input += ['user_id' => $request->user()->id]; //補足09-3、追加
        if($request->file('image')){
            $image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image' => $image];
        }
        
        $food->fill($input)->save();
        return redirect('/foods/');
    }
    
    public function delete(Food $food)
    {
        $food->delete();
        return redirect('/foods');
    }
    
    public function search($food_name)
    {
      //dd($food_name); 
      return redirect()->away('https://kurashiru.com/search?query=/'.$food_name);
      //return redirect()->away('https://cookpad.com/search/'.$food_name);
    }
    
    //public function search()
    //{

    //   return redirect()->away('https://cookpad.com/');  
    // }
    
    
    
    
}
