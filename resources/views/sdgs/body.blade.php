<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="http://globalgoals.tw/share.png">
    <meta property="og:image:width" content="1160">
    <meta property="og:image:height" content="1160">
    <title>可持續發展目標介紹</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- 引入 Font Awesome 圖標庫 -->
<style>


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
    <!-- 右上角的主頁連結 -->
    <a href="{{ url('/water') }}" class="homepage-link">
        <i class="fas fa-home"></i> 自來水供水普及率查詢
    </a>
</body>
</html>
