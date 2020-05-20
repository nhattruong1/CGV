<?php 
    include_once("db/connect.php");
    session_start();
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/movieD.css">
    <link rel="stylesheet" href="./css/listEvent.css">
    <link rel="stylesheet" href="./css/listMovies.css">
    <link rel="stylesheet" href="./css/newsD.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/listTheater.css">
    <link rel="stylesheet" href="./css/user.css">
</head>
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v7.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="111493383903916"
     theme_color="#fa3c4c"
     logged_in_greeting="Xin chào, tôi có thể giúp gì cho bạn"
     logged_out_greeting="Xin chào, tôi có thể giúp gì cho bạn">
</div>
    <?php
        include("include/header.php");
        if(isset($_GET['controller'])){
            $controller = $_GET['controller'];
        }else{
            $controller = '';
        }

        if($controller=='phim'){
            include('include/movieDetail.php');
        }
        else if($controller=='listnews'){
            include('include/listNew.php');
        }
        else if($controller=='listmovies'){
            include('include/listMovie.php');
        }
        else if($controller=='userInfo'){
            if(isset($_SESSION['user']) && $_SESSION['user'] != '')
            {
                include('include/userInfo.php');
            }
            else{
                include("include/slider.php");
                include('include/home.php');
            }
        }
        else if($controller=='newsDetail'){
            include('include/newsDetail.php');
        }
        else if($controller=='listTheater'){
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/listTheater.js"></script>
    <script src="./js/movieD.js"></script>
    <script src="./js/userInfo.js"></script>
</body>
</html>