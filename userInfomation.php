<?php
    include_once("db/connect.php");
    $user = $_GET['user'];
    $sql_userInfo = mysqli_query($mysqli, "SELECT * FROM `users`,`users_info`
    WHERE users_info_login = user_id and `user_email` = '".$user."'");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
        .title-info {
            text-align: center;
        }
        label{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="title-info">
        <h3>Thông Tin Cá Nhân</h3>
    </div>
    <?php
    while($row_userInfo = mysqli_fetch_array($sql_userInfo)){
    ?>
    <form>
        <div class="form-group">
            <label for="email">Địa Chỉ Email:</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="<?php echo $row_userInfo['user_email'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="name">Họ Và Tên:</label>
            <input class="form-control" id="name" placeholder="<?php echo $row_userInfo['users_info_name'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="gender">Giới Tính:</label>
            <input class="form-control" id="gender" placeholder="<?php echo $row_userInfo['users_info_gender'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="age">Tuổi:</label>
            <input class="form-control" id="age" placeholder="<?php echo $row_userInfo['users_info_age'];?>" readonly>
        </div>
    </form><?php
    }
    ?>
</div>
</body>
</html>
