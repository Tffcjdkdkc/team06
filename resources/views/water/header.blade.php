<!-- resources/views/water/header.blade.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '水供應統計資料')</title>
    <link type="image/png" rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgBAMAAACBVGfHAAAALVBMVEUmveJny+jJ6vb////f8/mH1OxVx+b1+/295vSw4vLq9/tAwuTU7/ej3fB40OoWp3LjAAAAVElEQVR4AWMYUMCobBKAIpBubGyKItBsNNkIRWCxNYs5ioCxAY8xmgCQwC9gYXwaVcDY2BZVwO6xCZoZzMaUCiy23myO5jllI3TvG6IFkNGDAY0hAIVkENcDVJn9AAAAAElFTkSuQmCC">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 20px;
        }

        .container {
            margin-top: 5px;
            position: relative;
            padding: 2px; /* 為容器添加內邊距 */
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background: white;
            padding: 20px; /* 在卡片內部添加內邊距 */
        }

        h1 {
            color: #007bff;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* 查詢表單美化 */
        .form-group {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1.1rem;
            color: #333;
            margin-right: 15px;
        }

        .form-group input {
            max-width: 250px;
            width: 100%;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1rem;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(24, 27, 233, 0.5);
        }

        .form-group button {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1.1rem;
            background-color: #007bff;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #ca2f70;
        }

        /* 查詢結果 */
        .results {
            margin-top: 20px;
            font-size: 1.2rem;
            text-align: center;
            color: #555;
        }

        .table {
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .pagination .page-link {
            border-radius: 20px;
            padding: 8px 16px;
            color: #007bff;
        }
        .pagination .page-item.disabled .page-link {
            color: #ccc; /* 禁用的頁碼顯示灰色 */
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        footer {
            background-color: #f8f9fa;
            padding: 15px 0;
            text-align: center;
            margin-top: 40px;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
        .page-query-box {
            display: flex;  /* 設置為 flexbox 使元素排列在一行 */
            justify-content: space-between;  /* 使元素左右對齊 */
            align-items: center;  /* 垂直居中對齊 */
            margin-top: 10px;  /* 可以調整間距 */
        }

        .page-query-box label {
            margin-right: 10px;  /* 為 label 和 select 之間添加間距 */
        }

        .page-query-box select {
            font-size: 0.9rem;  /* 設置字體大小 */
            border-radius: 30px;
            padding: 5px 10px;
            border: 1px solid #ccc;
        }   
        .pagination {
            margin-bottom: 0; /* 取消底部空間，讓分頁區塊更加緊湊 */
        }
        .homepage-link {
    position: fixed; /* 固定在屏幕上 */
    top: 10px; /* 距离顶部 10px */
    right: 5px; /* 距离右边 10px */
    background-color: rgba(0, 123, 255, 0.7); /* 背景颜色，可根据需要调整 */
    color: white; /* 字体颜色 */
    padding: 6px 12px;
    border-radius: 30px; /* 圆角效果 */
    text-decoration: none; /* 去除默认下划线 */
    font-size: 0.8rem;
}

.homepage-link:hover {
    background-color: rgb(172, 28, 116); /* 悬停时的背景颜色 */
}

    </style>
</head>
<body>
   <!-- 右上角的主頁連結 -->
   <a href="{{ url('/sdgs') }}" class="homepage-link">
    <i class="fas fa-home"></i> 可持續發展目標SDGs
</a>
</body>
</html>
