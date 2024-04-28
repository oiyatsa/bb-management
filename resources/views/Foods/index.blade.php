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
        <h1 class="text-2xl">食品一覧</h1>
        <a href="/foods/add">食品登録</a>
        <div class='foods'>
            <div class='food'>
                @foreach ($foods as $food)
               
                    <div class='image'></div>
                    <h2 class='food_name'>
                        <a href="/foods/{{ $food->id }}">{{ $food->food_name }}</a>
                    </h2>
                    <h3 class='remaining_period'></h3><!--賞味期限と今日の日にちから期限切れまで残り何日か表示 -->
                    <h4 class=expiration_date>{{$food->expiration_date}}</h4>
                    <h5 class='remaining_amount'>{{$food->remaining_amount}}</h5>
                    <h6 class='storage'>{{$food->category->category_name}}</h6>
                    <h7 class='note'>{{$food->note}}</h7>
                <p class="text-blue-500 text-2xl">This is a sample body.</p>
               
                @endforeach
                
            </div>
        </div>
    </body>
    </x-app-layout>
</html>