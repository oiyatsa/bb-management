<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <h1>食品詳細</h1>
     <form action="/foods/{{ $food->id }}" method="POST">
            @csrf
            @method('PUT')
         <div class='image'>
             <h2>画像</h2>
             <!-- <input type='image'>-->
        </div>
        <div class='food_name'>
            <h3>食品名（商品名）</h3>
            <input type='text' name='food[food_name]' value="{{ $food->food_name }}" placeholder="食品名や商品名">
            <p class='food_name_error' style="color:red">{{ $errors->first('food.food_name') }}</p>
        </div>
        <div class='search_recipie_name'>
            <h4>レシピ検索用の名前</h4>
            <input type='text' name='food[search_recipie_name]' value="{{ $food->search_recipie_name }}" placeholder="レシピ検索用の名前">
            <p class='search_recipie_name_error' style="color:red">{{ $errors->first('food.search_recipie_name') }}</p>
        </div>
        <div class='expiration_date'>
            <h5>賞味（消費）期限</h5>
            <input type='date' name='food[expiration_date]' value="{{ $food->expiration_date }}">
            <p class='expiration_date_error' style="color:red">{{ $errors->first('food.expiration_date') }}</p>
            <!--日付を選択-->
        </div>
        <div class='remaining_amount'>
            <h6>残りの量</h6>
            <input type='text' name='food[remaining_amount]' value="{{ $food->remaining_amount }}" placeholder="～ml、～個など">
            <p class='remaining_amount_error' style="color:red">{{ $errors->first('food.remaining_amount') }}</p>
        </div>
        <div class='category'>
            <h7>保管場所</h7>
            <select name="food[category_id]" value="{{ $food->category->category_name }}"><!--$food->category->category_nameか$category->category_name-->
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                @endforeach
            </select>
            <p class='category_error' style="color:red">{{ $errors->first('$category->category_name') }}</p>
            <!--categoriesテーブルcategory_nameから選択-->
        </div>
        <div class="note">
            <h8>メモ</h8>
            <textarea name='food[note]'  placeholder="メモ">{{ $food->note }}</textarea>
            <p class='note_error' style="color:red">{{ $errors->first('food.note') }}</p>
        </div>
        <input type="submit" value="登録内容を変更して保存">
     </form>
     <div class='footer'>
         <a href="/foods">戻る</a>
    </body>
    </x-app-layout>
</html>