<!DOCTYPE html>
<html style="background-image: url('/assets/background.jpg');" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased" style="width: 50%;
        margin: auto;
        margin-top: 10%;
        box-shadow: inset 0 0 2000px rgba(255, 255, 255, .5);
        padding: 20px;
        z-index: 100;">
            {{ $slot }}
        </div>
    </body>
</html>
