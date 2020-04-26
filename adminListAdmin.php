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
<h3 class="mainContent-title">Danh sách Admin</h3>
<p class="mainContent-title-note">Danh sách Admin tham gia quản trị website</p>
<div class="card shadow">
    <div class="card-header">
        <div class="card-header-title" style="display: inline">Danh sách Admin</div>
        <div class="card-header-dropdown" style="display: inline;float: right">
            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Xóa Tất Cả Admin</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#myModal" href="#">Thêm Mới Admin</a>
            </div>
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Mới Admin</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" id="regAdmin" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Địa chỉ mail:</label>
                                        <input type="email" class="form-control" id="inputEmail" name = "inputEmail" placeholder="Tài khoản đăng nhập">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword">Mật khẩu:</label>
                                        <input type="password" class="form-control" id="inputPassword" name ="inputPassword" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Họ Và Tên</label>
                                    <input type="text" class="form-control" id="inputName" name = "inputName" placeholder="Họ và tên">
                                </div>
                                <div class="form-group">
                                    <label for="inputGender">Giới tính:</label>
                                    <input type="text" class="form-control" id="inputGender" name = "inputGender" placeholder="Nam, nữ, hoặc N/A">
                                </div>
                                <button type="submit" name = "regAdmin" class="btn btn-primary">Tạo Mới</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                <th>Giới Tính</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 0;
            $sql_listAdmin = mysqli_query($mysqli, "SELECT * FROM admin");
            while($row_listAdmin = mysqli_fetch_array($sql_listAdmin)) {
                $stt += 1;
                ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row_listAdmin['admin_email']; ?></td>
                    <td><?php echo $row_listAdmin['admin_name']; ?></td>
                    <td><?php echo $row_listAdmin['admin_gender']; ?></td>
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