<!-- resources/views/water/app.blade.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <!-- 此處可以放共用的 meta、樣式等內容 -->
</head>
<body>
    @include('header')  <!-- 引入頁首 -->
    
    <div class="content">
        @yield('content')  <!-- 主內容區域 -->
    </div>

    @include('footer')  <!-- 引入頁尾 -->
</body>
</html>
