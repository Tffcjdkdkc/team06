<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- 加入 Favicon -->
    <link rel="icon" href="http://localhost/team06/image/SDG06" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>  
        body {
            background-color: #d1e8e4; /* 淡藍色 */
            font-family: Arial, sans-serif;
        }
        h1.page-title {
        background-color: #ff6600; /* 設定你想要的顏色，例如橙色 */
        text-align: center;
        font-size: 28px;
        margin-top: 20px;
        }
        h2  {
        text-align: center;
        color: rgb(95, 2, 245);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        footer {
        background-color: #007bff;
        text-align: center;
        margin-top: 20px;
        color: #5bfa06;
    }
     /* 圖片樣式 */
    img.centered {
            display: block;
            margin: 0 auto;
            width: 50%; /* 調整寬度 */
            height: auto; /* 等比例縮放 */
        }
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
