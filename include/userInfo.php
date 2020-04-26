<?php
    if(isset($_POST['updateInfo'])){
        $sql_updateInfo = mysqli_query($mysqli, "UPDATE `users_info` 
                SET `users_info_name`= '".$_POST['name']."',`users_info_age`='".$_POST['age']."',`users_info_gender`='".$_POST['gender']."' 
                WHERE `users_info_login` =  '".$_SESSION['idUser']."'");
    }
    if(isset($_POST['insertInfo'])){
        $sql_updateInfo = mysqli_query($mysqli, "INSERT INTO 
            `users_info` (`users_info_id`, `users_info_name`, `users_info_age`, `users_info_gender`, `users_info_login`) 
            VALUES (NULL, '".$_POST['name']."', '".$_POST['age']."', '".$_POST['gender']."', '".$_SESSION['idUser']."');");
    }

    if(isset($_POST['changePassWord'])){
        $sql_changePass = mysqli_query($mysqli, "SELECT * FROM `users`
            WHERE `user_email` = '".$_SESSION['user']."'");
        while($row_changePass = mysqli_fetch_array($sql_changePass)){
            if(md5($_POST['oldP']) ==   $row_changePass['user_password']){
                if($_POST['newP'] == $_POST['newP2']){
                    $sql_updatePass = mysqli_query($mysqli, "UPDATE `users` SET `user_password`= md5('".$_POST['newP']."') 
                        WHERE `user_email` = '".$_SESSION['user']."'");
                    echo "<script type='text/javascript'>alert('Thay Đổi Mật Khẩu Thành Công');</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Vui lòng nhập lại Mật Khẩu chính xác');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Mật Khẩu Cũ Không Chính Xác');</script>";
            }
        }
    }

?>
<div class="container infomation">
    <div class="title">
        <h3>Thông Tin Tài Khoản</h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3 col-sm-3 col-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action info">Thông tin tài khoản</a>
                <a href="#" class="list-group-item list-group-item-action history">Lịch sử đặt vé</a>
                <a href="#" class="list-group-item list-group-item-action changeInfo">Thay đổi thông tin tài khoản</a>
                <a href="#" class="list-group-item list-group-item-action changePass">Đổi mật khẩu</a>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-9">
            <div id="content-info">waiting...</div>
        </div>
    </div>
</div>


