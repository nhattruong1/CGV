<?php 
    include_once("db/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CGV Cinemas VietNam | Thông tin - Lịch chiếu - Hệ thống rạp chiếu phim đẳng cấp CGV Cinemas Việt Nam</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/movieD.css">
    <link rel="stylesheet" href="./css/listEvent.css">
    <link rel="stylesheet" href="./css/listMovies.css">
    <link rel="stylesheet" href="./css/newsD.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/listTheater.css">
</head>
<body>
    <?php
        include("include/header.php");
        if(isset($_GET['controller'])){
            $tam = $_GET['controller'];
        }else{
            $tam = '';
        }

        if($tam=='phim'){
            include('include/movieDetail.php');
        }
        else if($tam=='listnews'){
            include('include/listNew.php');
        }
        else if($tam=='listmovies'){
            include('include/listMovie.php');
        }
        else if($tam=='newsDetail'){
            include('include/newsDetail.php');
        }
        else if($tam=='listTheater'){
            include('include/listTheater.php');
        }
        else{
            include("include/slider.php");
            include('include/home.php');
        }
        include("include/footer.php");
    ?>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script>
    <script src="./js/index.js"></script>
    <script src="./js/listTheater.js"></script>
    <script src="./js/movieD.js"></script>
</body>
</html>