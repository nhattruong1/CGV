<?php 
    include_once("db/connect.php")
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <!-- login -->
    <div class="login">
        <ul>
            <a href="">tuyển dụng</a>
            <a href="">liên hệ cgv</a>
            <a href="">đăng nhập/đăng ký</a>
        </ul>
    </div>
    <!-- End Login -->
    
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <a class="header-content-logo" href="">
                <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="">
            </a>
            <ul class="header-content-menu">
                <a href="">PHIM</a>
                <a href="">RẠP CGV</a>
                <a href="">THÀNH VIÊN</a>
                <a href="">CULTUREPLEX</a>
                <a href="">
                    <img src="./img/kenhcine.gif" alt="">
                </a>
            </ul>
            <a class="header-content-buy" href="listMovie.html">
                <img src="./img/mua-ve_ngay.png" alt="">
            </a>
        </div>
    </div>
    <!-- End Header -->

    <!-- MenuBar -->
    <div class="menubar">
        <ul>
            <a href="">
                <img src="./img/header-logo-1.png" alt="">
            </a>
            <a href="listMovie.html">
                <img src="./img/header-logo-2.png" alt="">
            </a>
            <a href="">
                <img src="./img/header-logo-3.png" alt="">
            </a>
            <a href="">
                <img src="./img/header-logo-4.png" alt="">
            </a>
            <a href="">
                <img src="./img/header-logo-5.png" alt="">
            </a>
            <a href="">
                <img src="./img/header-logo-6.png" alt="">
            </a>
            <a href="">
                <img src="./img/header-logo-7.png" alt="">
            </a>
        </ul>
        <hr>
    </div>
    <!-- End MenuBar -->

    <!-- SlideShow -->
    <div class="slideshow">
        <div id ="demo" class="slideshow-content carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
                <li data-target="#demo" data-slide-to="4"></li>
                <li data-target="#demo" data-slide-to="5"></li>
                <li data-target="#demo" data-slide-to="6"></li>
            </ul>
            
            <!-- The slideshow -->
            <div class="carousel-inner">
                <a class="carousel-item active" href="">
                <img src="./img/cgv_viettel_79k_79k_980x448_1.png" alt="Los Angeles" width="900" height="450">
                </a>
                <a class="carousel-item" href="">
                <img src="./img/cgv-brand-team-phim-hay-thang-3-2020-980x448.jpg" alt="Chicago" width="900" height="450">
                </a>
                <a class="carousel-item" href="">
                <img src="./img/cgv-cpr-corona-980x448.jpg" alt="New York" width="900" height="450">
                </a>
                <a class="carousel-item" href="">
                <img src="./img/rsz_can-ho-cam-do-980wx448h_1.jpg" alt="New York" width="900" height="450">
                </a>
                <a class="carousel-item" href="">
                <img src="./img/980x448-cgv79k-zalopay.png" alt="New York" width="900" height="450">
                </a>
                <a class="carousel-item" href="">
                <img src="./img/980x448_3__1.jpg" alt="New York" width="900" height="450">
                </a>
                <a class="carousel-item" href="">
                <img src="./img/rsz_onward_resize_sneakshow_980x448px_1_2.jpg" alt="New York" width="900" height="450">
                </a>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- End SlideShow -->
    <!-- Content -->
    <div class="content">
        <div class="content-movie">
            <div class="content-movie-title">
                <h2>MOVIE SELECTION</h2>
            </div>
            <div class="content-movie-list">
                <div class="row">
                    <div class="col-md-3">
                        <a href="movieDetail.html">
                            <img src="./img/parasite.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="movieDetail.html">
                            <img src="./img/joker.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="movieDetail.html">
                            <img src="./img/sonic.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="movieDetail.html">
                            <img src="./img/op.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-event">
                <div class="content-event-title">
                    <h2>EVENT</h2>
                </div>
                <div class="content-event-list">
                    <div class="row">
                        <div class="col-md-3 banner">
                            <a href="">
                                <img src="./img/evleft.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 banner">
                            <a href="">
                                <img src="./img/evcenter.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-md-3 banner">
                            <a href="">
                                <img src="./img/evleft.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <div class="footer">
        <div class="footer-theater">
            <ul>
                <a href="">
                    <img src="./img/1.png" alt="">
                </a>
                <a href="">
                    <img src="./img/2.png" alt="">
                </a>
                <a href="">
                    <img src="./img/5.png" alt="">
                </a>
                <a href="">
                    <img src="./img/6.png" alt="">
                </a>
                <a href="">
                    <img src="./img/7.png" alt="">
                </a>
                <a href="">
                    <img src="./img/9.png" alt="">
                </a>
                <a href="">
                    <img src="./img/8.png" alt="">
                </a>
                <a href="">
                    <img src="./img/10.png" alt="">
                </a>
                <a href="">
                    <img src="./img/11.png" alt="">
                </a>
            </ul>
        </div>
        <div class="footer-info">
            <div class="row">
                <div class="col-md-2">
                    <a href="https://www.tdtu.edu.vn/">
                        <img src="/img/TĐT_logo.png" alt="">
                    </a>
                </div>
                <div class="col-md-10">
                    <h4>Đồ Án Môn Học Lập Trình Web Và Ứng Dụng .</h4>
                    <div>Liên Hệ: Võ Nhật Trường, email: 51702210@student.tdtu.edu.vn .</div>
                    <div>Địa Chỉ: 19 Đường Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh.</div>
                    <div>Điện thoại: 028 3775 5035 .</div>
                    <div>COPYRIGHT 2020 TDTU. All RIGHTS RESERVED .</div>
                </div>
            </div>
        </div>
        <div class="footer-end">
        </div>
    </div>
    <!-- End Footer -->
</body>
</html>