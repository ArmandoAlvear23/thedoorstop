<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Vite directive -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <h1 class="bg-blue-700 text-white">Hello Vite + Tailwind!</h1>
        <div x-data="{ open: false }">
            <button @click="open = true">Hello</button>
         
            <span x-show="open">
                AlpineJS!
            </span>
        </div>
    </body>
</html>
