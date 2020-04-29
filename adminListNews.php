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
        <div class="card-header-title" style="display: inline">
            Danh sách sự kiện
        </div>
        <div class="card-header-dropdown" style="display: inline;float: right">
            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" data-toggle="modal" data-target="#myModal" href="#">Thêm mới sự kiện</a>
                <a class="dropdown-item" href="#">Xóa tất cả suất chiếu</a>
            </div>
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm mới sự kiện</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nameNewsEdit">Tên sự kiện</label>
                                    <input type="text" class="form-control" id="nameNewsAdd" name = "nameNewsAdd" value="" required="">
                                </div>
                                <div class="form-group">
                                    <label for="imgSNewsAdd">Ảnh bìa<span class="text-muted">(*Lưu ý: ảnh 240x201px)</span></label>
                                    <input type="file" class="form-control-file" id="imgSNewsAdd" name="imgSNewsAdd" value="">
                                </div>
                                <div class="form-group">
                                    <label for="imgLNewsAdd">Ảnh Nội Dung<span class="text-muted">(*Lưu ý: ảnh 350x495px)</span></label>
                                    <input type="file" class="form-control-file" id="imgLNewsAdd" name="imgLNewsAdd" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="decriptionNewsAdd">Nội dung phim <span class="text-muted">(vd: Tóm gọn trong 500 từ)</span></label>
                                    <textarea class="form-control decriptionNewsAdd" id="decriptionNewsAdd" name="decriptionNewsAdd"></textarea>
                                </div>
                                <button type="submit" name ="addNews" class="btn btn-primary">Thêm Mới</button>
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
                <th>Tên Sự Kiện</th>
                <th>Ảnh (nhỏ)</th>
                <th>Ảnh (lớn)</th>
                <th>Action</th>
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
                    <td><?php echo '<img src="'.$row_listNews['news_imgS'].'" alt="" style = "display: inline;width: 100px;">'?></td>
                    <td><?php echo '<img src="'.$row_listNews['news_imgL'].'" alt="" style = "display: inline;width: 100px;">'?></td>
                    <td style="text-align: center;margin: auto 0">
                        <div class="edit-News" style="display: inline;">
                            <i class="far fa-edit" style="color: rgb(0,123,255)" data-toggle="modal" data-target="#editNews<?php echo $stt ?>"></i>
                            <!-- The Modal -->
                            <div class="modal fade" id="editNews<?php echo $stt ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Chỉnh sửa sự kiện</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="nameNewsEdit">Tên sự kiện</label>
                                                    <input type="text" class="form-control" id="idNewsEdit" name = "idNewsEdit" value="<?php echo $row_listNews['news_id']; ?>" hidden>
                                                    <input type="text" class="form-control" id="nameNewsEdit" name = "nameNewsEdit" value="<?php echo $row_listNews['news_title']; ?>" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="imgSNewsEdit">Ảnh bìa<span class="text-muted">(*Lưu ý: ảnh 240x201px)</span></label>
                                                    <input type="file" class="form-control-file" id="imgSNewsEdit" name="imgSNewsEdit" value="<?php $imgSNews = explode("./img/", $row_listNews['news_imgS']);echo implode(" ",$imgSNews); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="imgLNewsEdit">Ảnh Nội Dung<span class="text-muted">(*Lưu ý: ảnh 350x495px)</span></label>
                                                    <input type="file" class="form-control-file" id="imgLNewsEdit" name="imgLNewsEdit" value="<?php $imgLNews = explode("./img/", $row_listNews['news_imgL']);echo implode(" ",$imgLNews); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="decriptionNewsEdit">Nội dung phim <span class="text-muted">(vd: Tóm gọn trong 500 từ)</span></label>
                                                    <textarea class="form-control decriptionNewsEdit" id="decriptionNewsEdit" name="decriptionNewsEdit"><?php echo $row_listNews['new_content']; ?></textarea>
                                                </div>
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="eventEdit">Cập Nhật</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" style="display: inline" method="post">
                            <input type="text" name="idRowNews" value="<?php echo $row_listNews['news_id']; ?>" hidden>
                            <button type="submit" name ="deleteRowEvent" style="border: 0;background-color: Transparent;">
                                <i type = "submit" name ="deleteRowEvent" class="far fa-trash-alt" style="color: rgb(247,55,55)"></i>
                            </button>
                        </form>
                    </td>
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