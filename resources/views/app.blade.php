<!-- resources/views/app.blade.php -->
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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 30px;
            background-color: #ffffff;
        }
        header {
            background-image: url('https://media.human-dc.com/cms/wp-content/uploads/2021/09/SDGs.jpg');
            background-size: cover;
            background-position: center center;
            color: rgb(12, 7, 7);
            padding: 20px;
            text-align: center;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 4px 4px 4px rgba(245, 243, 243, 0.5);
            border-bottom: 1px solid #ddd;
        }

        .container {
            margin: auto;
            background: white;
            padding: 10px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border: 2px solid #ddd;
        }

        h1 {
            margin: 0;
            font-size: 3em;
        }

        .goal {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, transform 0.2s;
        }

        .goal:hover {
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transform: scale(1.03);
        }

        .goal-number {
            font-size: 30px;
            font-weight: bold;
            color: #025510;
            margin-right: 15px;
        }

        .goal img {
            width: 100px;
            height: auto;
            margin-right: 15px;
        }

        .goal h3 {
            margin: 0;
            font-size: 1.2em;
        }

        .goal p {
            margin: 5px 0 0;
        }

        ul {
            list-style-type: square;
            padding-left: 20px;
        }

        footer {
            background-color: #f1f1f1;
            padding: 15px;
            text-align: center;
            font-size: 0.9em;
            color: #333;
            border-top: 2px solid #ddd;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .homepage-link {
            text-decoration: none;
        }

        /* 手機和較小螢幕設置：max-width 768px */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }

            .goal {
                flex-direction: column;
                align-items: flex-start;
            }

            .goal img {
                width: 100px;
                height: 100px;
                margin-bottom: 15px;
            }

            .goal-number {
                font-size: 1.8rem;
            }

            .goal h3 {
                font-size: 1.2rem;
            }

            footer {
                font-size: 0.9rem;
            }

            .container {
                border: 2px solid #ddd;
            }
        }

        /* 更小螢幕設置：max-width 480px */
        @media (max-width: 480px) {
            header h1 {
                font-size: 2rem;
            }

            .goal-number {
                font-size: 1.6rem;
            }
        }
     
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            margin: 0; 
            padding: 20px;
        }

        .container {
            margin-top: 5px;
            position: relative;
            padding: 20px; /* 為容器添加內邊距 */
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
            margin-bottom: 10px;
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
            right: 5px; /* 距离右边 5px */
            background-color: rgba(42, 108, 173, 0.7); /* 背景颜色，可根据需要调整 */
            color: white; /* 字体颜色 */
            padding: 6px 12px;
            border-radius: 30px; /* 圆角效果 */
            text-decoration: none; /* 去除默认下划线 */
            font-size: 0.8rem; /* 调整字体大小 */
            display: flex; /* 使文字和图标对齐 */
            align-items: center; /* 垂直居中 */
        }

        .homepage-link i {
            margin-right: 8px; /* 图标与文字之间的间距 */
        }

        .homepage-link:hover {
            background-color: rgb(172, 28, 116); /* 悬停时的背景颜色 */
        }
    </style>
</head>
<body>

</body>
</html>
