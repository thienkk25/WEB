<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <?php 
        echo '<style>'; 
        include "css/main.css"; 
        echo '</style>';
        ?>
    <title>Phim</title>
</head>
<body>
<header>
    <div class="bar-header">
        <div class="logo"><img src="img/logo.jpg" style="width: 100px; height: 100px;"></div>
        <div class="bar-ul">
            <ul class="list-header">
                <li><a class="li-a" href="index.php" >Trang chủ</a></li>
                <li>
                    <a class="li-a" >Loại</a>
                    <ul class="menu">
                        <li><a href="header/phim3d.php">3D</a></li>
                        <li><a href="header/phim2d.php">2D</a></li>
                        <li><a href="header/phimanime.php">Anime</a></li>
                        <li><a href="header/phimanime.php">Pỏn</a></li>
                        <li><a href="header/other.php">Other</a></li>
                        <div class="orgin">By Thiện Nguyễn</div>
                    </ul>   
                </li>
                <li><a class="li-a" href="header/xemnhieu.php" >Xem nhiều</a></li>
                <li><a class="li-a" href="header/moicapnhap.php" >Mới cập nhật</a></li>
                <li><a class="li-a" href="header/yeuthich.php" >Yêu thích</a></li>
            </ul>
            <div class="search">
                <div style="position: relative;">
                <input style="padding:10px 32px 10px 5px;outline: none;border-radius: 10px;border: 1px solid #000;" class="timkiemi" type="text" placeholder="Tìm kiếm">
                <i style="align-self: center;font-size: 20px;position: absolute;left:85%;top:25%;cursor: pointer;" class="fa-solid fa-magnifying-glass"></i>
                </div>
                <a style="padding-left: 5px;align-self: center;" class="timkiema" type="button" href="#">Đăng nhập</a>
            </div>
        </div>
    </div>
</header>