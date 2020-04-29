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
<h3 class="mainContent-title">Danh sách các suất phim đang công chiếu</h3>
<p class="mainContent-title-note">*Lưu ý: Chỉ xóa suất chiếu khi cần thiết</p>
<div class="card shadow">
    <div class="card-header">
        <div class="card-header-title" style="display: inline">Danh sách suất chiếu</div>
        <div class="card-header-dropdown" style="display: inline;float: right">
            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" data-toggle="modal" data-target="#myModal" href="#">Thêm mới suất chiếu</a>
                <a class="dropdown-item" href="#">Xóa tất cả suất chiếu</a>
            </div>
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm mới suất chiếu</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post">
                                <div class="form-group">
                                    <label class="mr-sm-2" for="addShowingName">Phim</label>
                                    <select class="custom-select mr-sm-2" id="addShowingName" name="addShowingName">
                                        <option selected>Choose...</option>
                                        <?php
                                        $sql_listMovieSelect = mysqli_query($mysqli, "SELECT * FROM `movie`");
                                        while($row_listMovieSelect  = mysqli_fetch_array($sql_listMovieSelect)){
                                        ?>
                                            <option value="<?php echo $row_listMovieSelect['movie_id'] ?>"><?php echo $row_listMovieSelect['movie_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2" for="addShowingRoom">Phòng</label>
                                    <select class="custom-select mr-sm-2" id="addShowingRoom" name = "addShowingRoom">
                                        <option selected>Choose...</option>
                                        <option value ="Phòng 1">Phòng 1</option>
                                        <option value ="Phòng 2">Phòng 2</option>
                                    </select>
                                    <small class="form-text text-muted">*Lưu ý: Phòng 1 -> Vé 2D, Phòng 2 -> Vé 3D</small>
                                </div>
                                <div class="form-group">
                                    <label class="mr-sm-2" for="addShowingTheater">Rạp</label>
                                    <select class="custom-select mr-sm-2" id="addShowingTheater" name="addShowingTheater">
                                        <option selected>Choose...</option>
                                        <?php
                                        $sql_listTheater = mysqli_query($mysqli, "SELECT * FROM `theaters`");
                                        while($row_listTheater  = mysqli_fetch_array($sql_listTheater)){
                                            ?>
                                            <option value="<?php echo $row_listTheater['theaters_id'] ?>"><?php echo $row_listTheater['theaters_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="addShowingTime">Thời gian:</label>
                                    <input type="text" class="form-control" name = "addShowingTime" id="addShowingTime" value="" placeholder="2020-05-01 19:00:00">
                                    <small class="form-text text-muted">*Lưu ý: Điền theo format YYYY-MM-DD HH:MM:SS</small>
                                </div>
                                <button type="submit" name ="addShowing" class="btn btn-primary">Thêm Mới</button>
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
                <th>Tên phim</th>
                <th>Phòng chiếu phim</th>
                <th>Tên rạp</th>
                <th>Thành phố</th>
                <th>Thời gian</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 0;
            $sql_listAdmin = mysqli_query($mysqli, "SELECT * FROM `showings`,movie,room,theaters 
            WHERE showings_name_movie = movie_id and showings_room = room_id and room_theater = theaters_id");
            while($row_listAdmin = mysqli_fetch_array($sql_listAdmin)) {
                $stt += 1;
                ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row_listAdmin['movie_name']; ?></td>
                    <td><?php echo $row_listAdmin['room_name']; ?></td>
                    <td><?php echo $row_listAdmin['theaters_name']; ?></td>
                    <td><?php echo $row_listAdmin['theaters_city']; ?></td>
                    <td><?php echo $row_listAdmin['showings_time']; ?></td>
                    <td style="text-align: center">
                        <div class="edit-Showing" style="display: inline">
                            <i class="far fa-edit" style="color: rgb(0,123,255)" data-toggle="modal" data-target="#editShowing<?php echo $stt ?>"></i>
                            <!-- The Modal -->
                            <div class="modal fade" id="editShowing<?php echo $stt ?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Suất chiếu phim: "<?php echo $row_listAdmin['movie_name'];?>"</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left">
                                            <form method="post">
                                                <input type="text" name="idShowUpdate" value="<?php echo $row_listAdmin['showings_id'];?>" hidden>
                                                <div class="form-group">
                                                    <label for="editNameShow">Tên Phim: </label>
                                                    <input type="text" class="form-control" id="editNameShow" placeholder="" value="<?php echo $row_listAdmin['movie_name'];?>" readonly>
                                                    <small class="form-text text-muted">Không thể sửa tên phim</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editRoomShow">Phòng</label>
                                                    <input type="text" class="form-control" id="editRoomShow" value="<?php echo $row_listAdmin['room_name']; ?>" readonly>
                                                    <small class="form-text text-muted">*Lưu ý: Phòng 1 -> Vé 2D, Phòng 2 -> Vé 3D</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editTheaterShow">Rạp:</label>
                                                    <input type="text" class="form-control" id="editTheaterShow" value="<?php echo $row_listAdmin['theaters_name']; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editCityShow">Thành Phố:</label>
                                                    <input type="text" class="form-control" id="editCityShow" value="<?php echo $row_listAdmin['theaters_city']; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editTimeShow">Thời gian:</label>
                                                    <input type="text" class="form-control" name = "editTimeShow" id="editTimeShow" value="<?php echo $row_listAdmin['showings_time']; ?>">
                                                    <small class="form-text text-muted">*Lưu ý: Điền theo format YYYY-MM-DD HH:MM:SS</small>
                                                </div>
                                                <button type="submit" name ="updateShowing" class="btn btn-primary">Cập Nhật</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" style="display: inline" method="post">
                            <input type="text" name="idRowShowing" value="<?php echo $row_listAdmin['showings_id'];?>" hidden>
                            <button type="submit" name ="deleteRowShowings" style="border: 0;background-color: Transparent;">
                                <i type = "submit" name ="deleteRowShowings" class="far fa-trash-alt" style="color: rgb(247,55,55)"></i>
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