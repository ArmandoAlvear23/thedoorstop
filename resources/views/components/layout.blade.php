<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Door Stop</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <!-- Vite directive -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-nav></x-nav>
        <main class="px-10 lg:px-56">
            {{ $slot }}
        </main>
        <x-footer></x-footer>
    </body>
</html>
