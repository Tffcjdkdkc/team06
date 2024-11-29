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
       <!-- 右上角的主頁連結 -->
   <a href="{{ url('/sdgs') }}" class="homepage-link">
    <i class="fas fa-home"></i> 可持續發展目標SDGs
</a>
</body>
</html>
