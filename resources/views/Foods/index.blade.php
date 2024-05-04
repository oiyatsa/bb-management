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
        <h1 class="text-3xl mx-10 my-5">食品一覧</h1>
        <a href="/foods/add">食品登録</a>
        <div class="select_category">
         <div class="mr-3 mb-5">
            <input type="radio" name="category" id="fridge" value="冷蔵庫"><label for="fridge">冷蔵庫</label>
            <input type="radio" name="category" id="freezer" value="freezer"><label for="freezer">冷凍庫</label>
            <input type="radio" name="category" id="vegetables" value="vegetables"><label for="vegetables">野菜室</label>
            <input type="radio" name="category" id="sink" value="sink"><label for="sink">シンク下</label>
            <input type="radio" name="category" id="others" value="others"><label for="others">その他</label>
         </div>
        </div>
        <div class='foods'>
             @foreach ($foods as $food)
               <div class='food'>
                   <div class="flex mx-5">
                    <div class='image'></div>
                    <h2 class='food_name text-lg mr-5'>
                        <a href="/foods/{{ $food->id }}/edit">{{ $food->food_name }}</a>
                    </h2>
                    <h3 class='remaining_period mr-3'></h3><!--賞味期限と今日の日にちから期限切れまで残り何日か表示 -->
                    <h4 class='expiration_date mr-3'>{{$food->expiration_date}}</h4>
                    <h5 class='remaining_amount mr-3'>{{$food->remaining_amount}}</h5>
                    <h6 class='storage mr-3'>{{$food->category->category_name}}</h6>
                    <h7 class='note mr-3'>{{$food->note}}</h7>
                    <p class="text-blue-500 text-2xl">This is a sample body.</p>
                    <form action="/foods/{{ $food->id }}" id="form_{{ $food->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteFood({{ $food->id }})">削除</button>
                    </form>
                    </div>
                       
              </div>
             @endforeach
                
            
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