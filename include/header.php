<?php
    if(isset($_POST['login'])){
        $username = $_POST['emailUser'];
        $password = md5($_POST['password']);
        $sql_login = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$username' and `user_password` = '$password'");
        $count = mysqli_num_rows($sql_login);
        if($count > 0){
            while($getId = mysqli_fetch_array($sql_login)){
                $_SESSION['idUser'] = $getId['user_id'];
            }
            $_SESSION['user'] = $username;
            echo "<script type='text/javascript'>alert('Hello ".$_SESSION['user']."');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Sai Tài Khoản Hoặc Mật Khẩu');</script>";
        }
    }
    if(isset($_POST['register'])){
        $username = $_POST['emailReg'];
        $password = md5($_POST['passwordReg']);
        $sql_checkName = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$username'");
        $countName = mysqli_num_rows($sql_checkName);
        if($countName == 0){
            $sql_register = mysqli_query($mysqli, "INSERT INTO `users` (`user_id`, `user_email`, `user_password`) VALUES (NULL, '$username', '$password');");
            $sql_checkreg = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_email` = '$username'");
            $count = mysqli_num_rows($sql_checkreg);
            if($count > 0){
                echo "<script type='text/javascript'>alert('Đăng Ký Tài Khoản Thành Công');</script>";
            }
        }
        else{
            echo "<script type='text/javascript'>alert('Tên Đăng Nhập Đã Tồn Tại');</script>";
        }
    }
    if(isset($_GET['signout'])){
        $signout = $_GET['signout'];
    }else {
        $signout = '';
    }
    if($signout == 'true'){
        session_destroy();
        header('location: index.php');
    }
?>
    <!-- login -->
    <div class="login container">
        <?php
        if(isset($_SESSION['user']) && $_SESSION['user'] != ''){
            echo "<ul>
                <a style ='text-transform: none' class='dropdown-toggle noselect' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >Xin chào <span class='userEmail'>" . $_SESSION['user'] . "</span></a>
                  <div class='dropdown-menu noselect'aria-labelledby='dropdownMenuButton'style ='text-transform: none'>
                    <a class='dropdown-item'href='?controller=userInfo'style ='margin: 0'>Thông Tin Tài Khoản</a>
                    <a class='dropdown-item'href='?signout=true'style ='margin: 0'>Đăng Xuất</a>
                  </div>
                    </ul>";
        }else{
            echo '<ul>
            <a href="">tuyển dụng</a>
            <a href="">liên hệ cgv</a>
            <a href="" data-toggle="modal" data-target="#login">đăng nhập/đăng ký</a>
        </ul>';
        }
        ?>

    </div>
    <!-- The Modal -->
    <div class="modal fade" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Đăng Nhập</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Đăng Ký</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form style="margin-top: 10px" method="post">
                                <div class="form-group">
                                    <label for="emailUser" style="font-weight: bold">Tài Khoản:</label>
                                    <input type="email" class="form-control" id="emailUser" name ="emailUser" aria-describedby="emailHelp" placeholder="Nhập Địa Chỉ Email">
                                </div>
                                <div class="form-group">
                                    <label for="password" style="font-weight: bold">Mật Khẩu:</label>
                                    <input type="password" class="form-control" id="password" name ="password" placeholder="Nhập Mật Khẩu">
                                </div>
                                <button type="submit" name = "login" class="btn btn-primary">Đăng Nhập</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form style="margin-top: 10px" method="post">
                                <div class="form-group">
                                    <label for="emailReg" style="font-weight: bold">Tài Khoản:</label>
                                    <input type="email" class="form-control" id="emailReg" name="emailReg" aria-describedby="emailHelp" placeholder="Nhập Địa Chỉ Email">
                                </div>
                                <div class="form-group">
                                    <label for="passwordReg" style="font-weight: bold">Mật Khẩu:</label>
                                    <input type="password" class="form-control" id="passwordReg" name="passwordReg" placeholder="Nhập Mật Khẩu">
                                </div>
                                <button type="submit" name ="register" class="btn btn-primary">Đăng Ký</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->
    
    <!-- Header -->
    <div class="header">
        <div class="header-content container">
            <a class="header-content-logo" href="index.php">
                <img src="./img/cgvlogo.png" alt="">
            </a>
            <ul class="header-content-menu">
                <a href="?controller=listmovies">PHIM</a>
                <a href="?controller=listTheater">RẠP CGV</a>
                <a href="">THÀNH VIÊN</a>
                <a href="">CULTUREPLEX</a>
                <a href="">
                    <img src="./img/kenhcine.gif" alt="">
                </a>
            </ul>
            <a class="header-content-buy" href="?controller=listmovies">
                <img src="./img/mua-ve_ngay.png" alt="">
            </a>
        </div>
    </div>
    <!-- End Header -->
    <!-- MenuBar Responsive -->
    <div class="menu-res container">
        <div class="row">
            <nav class="navbar navbar-dark ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"> </span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=listmovies">PHIM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=listTheater">RẠP CGV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">THÀNH VIÊN</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=listnews">TIN MỚI & ƯU ĐÃI</a>
                    </li>    
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    
    <!-- End MenuBar Responsive-->
    <!-- MenuBar -->
    <div class="menubar container">
        <ul>
            <a href="?controller=listTheater">
                <img src="./img/header-logo-1.png" alt="">
            </a>
            <a href="?controller=listmovies">
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
            <a href="?controller=listnews">
                <img src="./img/header-logo-6.png" alt="">
            </a>
            <a href="">
                <img src="./img/header-logo-7.png" alt="">
            </a>
        </ul>
        <hr>
    </div>
    <!-- End MenuBar -->
    