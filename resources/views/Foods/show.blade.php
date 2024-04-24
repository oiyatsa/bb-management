<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <h1>Blog Name</h1>
        <div class='foods'>
            <div class='food'>
                @foreach ($foods as $food)
               
                    <h2 class='title'>{{$food->food_name}}</h2>
                <p class="text-blue-500 text-2xl">This is a sample body.</p>
               
            @endforeach
                
            </div>
        </div>
    </body>
    </x-app-layout>
</html>