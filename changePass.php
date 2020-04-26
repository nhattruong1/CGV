<?php
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
<div class="title-info">
    <h3>Thay Đổi Mật Khẩu</h3>
</div>
<form method="post">
    <div class="form-group">
        <label>Mật Khẩu Hiện Tại:</label>
        <input class="form-control" type="password" id="oldP" name="oldP" placeholder="">
    </div>
    <div class="form-group">
        <label>Mật Khẩu Mới:</label>
        <input class="form-control" type="password" id="newP" name="newP" placeholder="">
    </div>
    <div class="form-group">
        <label>Nhập Lại Mật Khẩu Mới:</label>
        <input class="form-control" type="password" id="newP2" name="newP2" placeholder="">
    </div>
    <button type="submit" name ="changePassWord" class="btn btn-primary">Cập Nhật Mật Khẩu</button>
</form>
</body>
</html>
