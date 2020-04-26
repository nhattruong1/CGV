<?php
    include_once("db/connect.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
<h3 class="mainContent-title">Danh sách khách hàng</h3>
<p class="mainContent-title-note">Danh sách khách hàng "Active" đã cập nhật thông tin cá nhân</p>
<div class="card shadow">
    <div class="card-header">
        <div class="card-header-title" style="display: inline">Danh sách khách hàng</div>
        <div class="card-header-dropdown" style="display: inline;float: right">
            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Xóa Tất Cả Khách Hàng</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Họ Tên</th>
                <th>Tuổi</th>
                <th>Giới Tính</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 0;
            $sql_listUser = mysqli_query($mysqli, "SELECT * FROM `users`,users_info WHERE users_info_login = user_id");
            while($row_listUser = mysqli_fetch_array($sql_listUser)) {
                $stt += 1;
                ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row_listUser['user_email']; ?></td>
                    <td><?php echo $row_listUser['users_info_name']; ?></td>
                    <td><?php echo $row_listUser['users_info_age']; ?></td>
                    <td><?php echo $row_listUser['users_info_gender']; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>