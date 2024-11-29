<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito';
        }
        /* 可以根據需要擴展其他CSS */
    </style>
</head>
<body>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100">
        @include('header') <!-- 引入 header.blade.php -->
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @yield('content') <!-- 頁面具體內容由每個頁面提供 -->
        </div>
        @include('footer') <!-- 引入 footer.blade.php -->
    </div>
</body>
</html>
