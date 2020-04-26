<?php
include_once("db/connect.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
<h3 class="mainContent-title">Danh sách sự kiện</h3>
<p class="mainContent-title-note">Danh sách các sự kiện hiện tại đang có trên hệ cơ sở dữ liệu</p>
<div class="card shadow">
    <div class="card-header">
        <div class="card-header-title">
            Danh sách sự kiện
        </div>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sự Kiện</th>
                <th>URL Ảnh (nhỏ)</th>
                <th>URL Ảnh (lớn)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 0;
            $sql_listNews = mysqli_query($mysqli, "SELECT * FROM news");
            while($row_listNews = mysqli_fetch_array($sql_listNews)) {
                $stt += 1;
                ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row_listNews['news_title']; ?></td>
                    <td><?php echo $row_listNews['news_imgS']; ?></td>
                    <td><?php echo $row_listNews['news_imgL']; ?></td>
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