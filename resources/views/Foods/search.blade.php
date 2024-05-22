<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>レシピ検索</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
         <div class="text-center">
                <h1 class="text-2xl mx-10 my-5">レシピ検索</h1>
             <form action="/search" method="POST">
                 @csrf

               
                <div class='search_recipie_name'>
                    <h4 class="text-lg">レシピ検索用の名前</h4>
                    <input type='text' name='food[search_recipie_name]' placeholder="レシピ検索用の名前" value={{old('food.search_recipie_name')}} >
                    <p class='search_recipie_name_error' style="color:red">{{ $errors->first('food.search_recipie_name') }}</p>
                    <div class="mb-4"></div>
                </div>
                
                <button type="submit" class="bg-stone-500 hover:bg-stone-600 text-white rounded px-20 py-2" class="mb-4">登録</button>
             </form>
             <div class='footer'>
                 <a href="/foods" class="hover:text-neutral-500">一覧へ戻る</a>
            </div>
         </div>
    </body>
    </x-app-layout>
</html>