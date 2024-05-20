<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>食品登録</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
         <div class="text-center">
                <h1 class="text-2xl mx-10 my-5">食品登録</h1>
             <form action="/foods" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="image">
                     <h2 class="text-lg">画像</h2>
                     <input type="file" name="image"/>
                     <div class="mb-4"></div>
                 </div>
                   <!-- <input type='image'>-->
                <div class='food_name'>
                    <h3 class="text-lg">食品名（商品名）</h3>
                    <input type='text' name='food[food_name]'  placeholder="食品名や商品名" value={{old('food.food_name')}} >
                    <p class='food_name_error' style="color:red">{{ $errors->first('food.food_name') }}</p>
                    <div class="mb-4"></div>
                </div>
                <div class='search_recipie_name'>
                    <h4 class="text-lg">レシピ検索用の名前</h4>
                    <input type='text' name='food[search_recipie_name]' placeholder="レシピ検索用の名前" value={{old('food.search_recipie_name')}} >
                    <p class='search_recipie_name_error' style="color:red">{{ $errors->first('food.search_recipie_name') }}</p>
                    <div class="mb-4"></div>
                </div>
                <div class='expiration_date'>
                    <h5 class="text-lg">賞味（消費）期限</h5>
                    <input type='date' name='food[expiration_date]' value={{old('food.expiration_date')}}>
                    <p class='expiration_date_error' style="color:red">{{ $errors->first('food.expiration_date') }}</p>
                    <div class="mb-4"></div>
                    <!--日付を選択-->
                </div>
                <div class='remaining_amount'>
                    <h6 class="text-lg">残りの量</h6>
                    <input type='text' name='food[remaining_amount]' placeholder="～ml、～個など" value={{old('food.remaining_amount')}}>
                    <p class='remaining_amount_error' style="color:red">{{ $errors->first('food.remaining_amount') }}</p>
                    <div class="mb-4"></div>
                </div>
                <div class='category'>
                    <h7 class="text-lg">保管場所</h7>
                    <select name="food[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <p class='category_error' style="color:red">{{ $errors->first('$category->category_name') }}</p>
                    <div class="mb-4"></div>
                    <!--categoriesテーブルcategory_nameから選択-->
                </div>
                <div class="note">
                    <h8 class="text-lg">メモ</h8>
                    <textarea name='food[note]' placeholder="メモ" class="mb-4">{{old('food.note')}}</textarea>
                    <p class='note_error' style="color:red">{{ $errors->first('food.note') }}</p>
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