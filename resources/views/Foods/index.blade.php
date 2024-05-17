
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
        <form action="/foods" method="get">
        <select name="categories[]" class="form-control" id="category" onchange="viewChange();">
            <option value="">すべて</option>
            <option value="冷蔵庫">冷蔵庫</option>
            <option value="冷凍庫">冷凍庫</option>
            <option value="野菜室">野菜室</option>
            <option value="シンク下">シンク下</option>
            <option value="その他">その他</option>
   　　 </select>
   　　 </form>
   　　 <input type ="radio">
        <a href="/foods/add" class="mb-5">食品登録</a>
        <div class="mb-5">
        <!--<div class="select_category">
            <input type="radio" name="category" id="all" value="すべて"><label for="all">すべて</label>
            <input type="radio" name="category" id="fridge" value="冷蔵庫"><label for="fridge">冷蔵庫</label>
            <input type="radio" name="category" id="freezer" value="freezer"><label for="freezer">冷凍庫</label>
            <input type="radio" name="category" id="vegetables" value="vegetables"><label for="vegetables">野菜室</label>
            <input type="radio" name="category" id="sink" value="sink"><label for="sink">シンク下</label>
            <input type="radio" name="category" id="others" value="others"><label for="others">その他</label>
         </div>
        </div> -->
        <div class='categories1'>
             @foreach ($categories1 as $category1)
               <div class='food'>
                  <div class='image mr-5'>画像</div>
                    <h2 class='food_name text-lg mr-5'>
                        <a href="/foods/{{ $category1->id }}/edit">{{ $category1->food_name }}</a>
                    </h2>
                    <h3 class='remaining_period mr-5'>残り～日</h3><!--賞味期限と今日の日にちから期限切れまで残り何日か表示 -->
                    <h4 class='expiration_date mr-5'>{{$category1->expiration_date}}</h4>
                    <h5 class='remaining_amount mr-5'>{{$category1->remaining_amount}}</h5>
                    <h6 class='storage mr-5'>{{$category1->category->category_name}}</h6>
                    <h7 class='note mr-5'>{{$category1->note}}</h7>
              </div>
             @endforeach
                
            
        </div>
        
        <div class='foods'>
          <table border="1" class="w-full border">
             <thead>
               <tr>
                  <th></th>
                  <th>食品名</th>
                  <th>残り日数</th>
                  <th>賞味期限</th>
                  <th>残りの量</th>
                  <th>保管場所</th>
                  <th>メモ</th>
                  <th></th>
               </tr> 
             </thead>
             <tbody>
             @foreach ($foods as $food)
              <tr>
               <div class='food'>
                <div class="divide-y divide-gray-400">
                    <td><img class="h-auto size-32 " src="{{ $food->image }}" alt="画像が読み込めません。"/></td>
                    <td>
                        <h2 class='food_name text-lg hover:text-blue-500'>
                        <a href="/foods/{{ $food->id }}/edit">{{ $food->food_name }}</a>
                        </h2>
                    </td>
                    <td><h3 class='remaining_period'>残り～日</h3><!--賞味期限と今日の日にちから期限切れまで残り何日か表示 --></td>
                    <td><h4 class='expiration_date'>{{$food->expiration_date}}</h4></td>
                    <td><h5 class='remaining_amount'>{{$food->remaining_amount}}</h5></td>
                    <td><h6 class='storage'>{{$food->category->category_name}}</h6></td>
                    <td><h7 class='note'>{{$food->note}}</h7></td>
                    <td>
                    <form action="/foods/{{ $food->id }}" id="form_{{ $food->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteFood({{ $food->id }})" class="border px-3 py-1">削除</button>
                    </form>
                    </td>
                </div>
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
       <!-- <script src="./Foods/Foods.js" defer></script> -->
    </body>
    </x-app-layout>
</html>