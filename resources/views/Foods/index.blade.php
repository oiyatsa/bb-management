
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>食品一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <h1 class="text-2xl mx-10 my-5">食品一覧</h1>
    
        <div class="sort">
            <form>
                @csrf
                <div class="flex justify-start">
                    <div class="order_select mx-4">
                        <p class=""></p>
                       <input type="radio" name="sort" value="" id="btn01" class="checkbox">
                            <label for="btn01" class="">
                                指定なし
                            </label>
                            <br>
                        <input type="radio" name="sort" value="asc" id="btn02" class="checkbox">
                            <label for="btn02" class="">
                                賞味期限が近い順
                            </label>
                            <br>
                        <input type="radio" name="sort" value="desc" id="btn03" class="checkbox">
                            <label for="btn03" class="">
                                賞味期限が遠い順
                            </label>
                    </div>
                    <div class="category_select ml-4">
                        <h3 class="ml-3"></h3>
                         <select name="storages" class="" id="" onchange="viewChange();">
                            <option value="" id="btn-a">すべて</option>
                            <option value= 1 id="btn-a">冷蔵庫</option>
                            <option value= 2 id="btn-b">冷凍庫</option>
                            <option value= 3 id="btn-c">野菜室</option>
                            <option value= 4 id="btn-d">シンク下</option>
                            <option value= 5 id="btn-e">その他</option>
                   　　   </select>
       　　           </div>
   　　           </div>
                <button type ="submit" class="bg-stone-500 hover:bg-stone-600 text-white rounded w-40 py-1 mx-5 my-5">OK</button>
            </form>
        </div>
        
        <div class='foods'>
          <table  class="border-collapse border border-slate-400 w-full">
             <thead>
               <tr>
                  <th class="border border-slate-300"></th>
                  <th class="border border-slate-300">食品名</th>
                  <th class="border border-slate-300">残り日数</th>
                  <th class="border border-slate-300">賞味期限</th>
                  <th class="border border-slate-300">残りの量</th>
                  <th class="border border-slate-300">保管場所</th>
                  <th class="border border-slate-300">メモ</th>
                  <th class="border border-slate-300"></th>
               </tr> 
             </thead>
             <tbody>
             @foreach ($foods as $food)

              <tr>
               <div class='food'>
                <div class="">
                    
                    
                       <td class="border-b border-slate-300"><img class="h-auto size-28 " src="{{ $food->image }}" alt="画像が読み込めません。"/></td>
                    
                    
                    <td class="border-b border-slate-300">
                        <h2 class='food_name text-lg hover:text-neutral-500'>
                        <a href="/foods/{{ $food->id }}/edit">{{ $food->food_name }}</a>
                        </h2>
                    </td>
                    
                    <td class='remaining_period border-b border-slate-300'>残り{{$food->left}}日</td>
                     
                    <td class='expiration_date border-b border-slate-300'>{{$food->expiration_date}}</td>
                    <td class='remaining_amount border-b border-slate-300'>{{$food->remaining_amount}}</td>
                    <td class='storage border-b border-slate-300'>{{$food->category->category_name}}</td>
                    <td class='note border-b border-slate-300'>{{$food->note}}</td>
                    <td class='border-b border-slate-300'>
                    <form action="/foods/{{ $food->id }}" id="form_{{ $food->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteFood({{ $food->id }})" class="bg-stone-500 hover:bg-stone-600 text-white rounded px-3 py-1 mb-1">削除</button>
                    </form>
                    <a href="/search/{{ $food->search_recipie_name }}" class="bg-stone-500 hover:bg-stone-600 text-white rounded px-3 py-1">レシピ検索</a>
                        
                    </td>
                </div>
              </tr>
             @endforeach
             </tbody>
          </table>
                
             </div>
        <script>
            function deleteFood(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
                
            }
        
        </script>
    </body>
    </x-app-layout>
</html>