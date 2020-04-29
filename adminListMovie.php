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
<h3 class="mainContent-title">Danh sách Phim</h3>
<p class="mainContent-title-note">Danh sách các phim trên hệ thống (bao gồm phim chưa có suất chiếu), data phía dưới không đủ hết các thông tin của phim và chỉ hiện các thông tin quan trọng</p>
<div class="card shadow">
    <div class="card-header">
        <div class="card-header-title" style="display: inline">
            Danh sách phim
        </div>
        <div class="card-header-dropdown" style="display: inline;float: right">
            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" data-toggle="modal" data-target="#myModal" href="#">Thêm phim mới</a>
                <a class="dropdown-item" href="#">Xóa tất cả phim</a>
            </div>
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm phim mới</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="filmName">Tên phim</label>
                                        <input type="text" class="form-control" id="filmName" name = "filmName" placeholder="" value="" required="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="director">Đạo diễn</label>
                                        <input type="text" class="form-control" id="director" name = "director" placeholder="" value="" required="">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="actor">Diễn viên <span class="text-muted">(Vd: Nhật Trường, Ngọc Anh,...)</span></label>
                                    <input type="text" class="form-control" id="actor" name = "actor" placeholder="" required="">
                                </div>

                                <div class="mb-3">
                                    <label for="categoryFilm">Thể loại phim <span class="text-muted">(Nhập tối đa 1 đến 3 thể loại của phim)</span></label>
                                    <input type="text" class="form-control" id="categoryFilm" name = "categoryFilm" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="date">Ngày công chiếu <span class="text-muted">(Định dạng YYYY-MM-DD)</span></label>
                                    <input type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required="">
                                </div>

                                <div class="mb-3">
                                    <label for="time">Thời lượng phim <span class="text-muted">(Đổi sang phút vd: 182 phút)</span></label>
                                    <input type="text" class="form-control" id="time" name="time" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="language">Ngôn ngữ <span class="text-muted">(vd: Tiếng Hàn và phụ đề tiếng Việt)</span></label>
                                    <input type="text" class="form-control" id="language" name="language" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="rate">Rated</label>
                                    <select class="form-control" id="rate" name="rate" >
                                        <option>C18 - PHIM CẤM KHÁN GIẢ DƯỚI 18 TUỔI</option>
                                        <option>C16 - PHIM CẤM KHÁN GIẢ DƯỚI 16 TUỔI</option>
                                        <option>C13 - PHIM CẤM KHÁN GIẢ DƯỚI 13 TUỔI</option>
                                        <option>P - PHIM DÀNH CHO MỌI ĐỐI TƯỢNG</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="poster">Poster Phim <span class="text-muted">(*Lưu ý: ảnh 406x602px)</span></label>
                                    <input type="file" class="form-control-file" id="poster" name="poster">
                                </div>
                                <div class="mb-3">
                                    <label for="decription">Nội dung phim <span class="text-muted">(vd: Tóm gọn trong 500 từ)</span></label>
                                    <textarea class="form-control" id="decription" name="decription" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="trailer">Trailer Phim</label>
                                    <input type="text" class="form-control" id="trailer" name="trailer" placeholder="https://www.youtube.com/watch?v=o3ESQWArU2w">
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="addNewFilm">Thêm mới</button>
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
                <th>Đạo diễn</th>
                <th>Thể loại</th>
                <th>Ngôn ngữ</th>
                <th>Rated</th>
                <th>Poster phim</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 0;
            $sql_listMovie = mysqli_query($mysqli, "SELECT * FROM `movie`");
            while($row_listMovie = mysqli_fetch_array($sql_listMovie)) {
                $stt += 1;
                ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row_listMovie['movie_name']; ?></td>
                    <td><?php echo $row_listMovie['movie_directors']; ?></td>
                    <td><?php echo $row_listMovie['movie_cate']; ?></td>
                    <td><?php echo $row_listMovie['movie_language']; ?></td>
                    <td><?php echo $row_listMovie['movie_rate']; ?></td>
                    <td><?php echo '<img src="'.$row_listMovie['movie_img'].'" alt="" style = "display: inline;width: 100px;">'?></td>
                    <td style="text-align: center;margin: auto 0">
                        <div class="edit-Movie" style="display: inline;">
                            <i class="far fa-edit" style="color: rgb(0,123,255)" data-toggle="modal" data-target="#editMovie<?php echo $stt ?>"></i>
                            <!-- The Modal -->
                            <div class="modal fade" id="editMovie<?php echo $stt ?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Phim: <?php echo $row_listMovie['movie_name']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style="text-align: left">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="filmNameEdit">Tên phim</label>
                                                        <input type="text" class="form-control" id="filmNameEdit" name = "filmNameEdit" placeholder="" value="<?php echo $row_listMovie['movie_name']; ?>" required="">
                                                        <input type="text" class="form-control" id="idFilmEdit" name = "idFilmEdit" placeholder="" value="<?php echo $row_listMovie['movie_id']; ?>" hidden>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="directorEdit">Đạo diễn</label>
                                                        <input type="text" class="form-control" id="directorEdit" name = "directorEdit" placeholder="" value="<?php echo $row_listMovie['movie_directors']; ?>" required="">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="actorEdit">Diễn viên <span class="text-muted">(Vd: Nhật Trường, Ngọc Anh,...)</span></label>
                                                    <input type="text" class="form-control" id="actorEdit" name = "actorEdit" value="<?php echo $row_listMovie['movie_cast']; ?>" required="">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="categoryFilmEdit">Thể loại phim <span class="text-muted">(Nhập tối đa 1 đến 3 thể loại của phim)</span></label>
                                                    <input type="text" class="form-control" id="categoryFilmEdit" name = "categoryFilmEdit" placeholder="" value="<?php echo $row_listMovie['movie_cate']; ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="dateEdit">Ngày công chiếu <span class="text-muted">(Định dạng YYYY-MM-DD)</span></label>
                                                    <input type="text" class="form-control" id="dateEdit" name="dateEdit" placeholder="YYYY-MM-DD" required="" value="<?php echo $row_listMovie['movie_date']; ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="timeEdit">Thời lượng phim <span class="text-muted">(Đổi sang phút vd: 182 phút)</span></label>
                                                    <input type="text" class="form-control" id="timeEdit" name="timeEdit" placeholder="" value="<?php echo $row_listMovie['movie_time']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="languageEdit">Ngôn ngữ <span class="text-muted">(vd: Tiếng Hàn và phụ đề tiếng Việt)</span></label>
                                                    <input type="text" class="form-control" id="languageEdit" name="languageEdit" placeholder="" value="<?php echo $row_listMovie['movie_language']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rateEdit">Rated</label>
                                                    <select class="form-control" id="rateEdit" name="rateEdit" >
                                                        <option>C18 - PHIM CẤM KHÁN GIẢ DƯỚI 18 TUỔI</option>
                                                        <option>C16 - PHIM CẤM KHÁN GIẢ DƯỚI 16 TUỔI</option>
                                                        <option>C13 - PHIM CẤM KHÁN GIẢ DƯỚI 13 TUỔI</option>
                                                        <option>P - PHIM DÀNH CHO MỌI ĐỐI TƯỢNG</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="posterEdit">Poster Phim <span class="text-muted">(*Lưu ý: ảnh 406x602px)</span></label>
                                                    <input type="file" class="form-control-file" id="posterEdit" name="posterEdit">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="decriptionEdit">Nội dung phim <span class="text-muted">(vd: Tóm gọn trong 500 từ)</span></label>
                                                    <textarea class="form-control" id="decriptionEdit" name="decriptionEdit" rows="4"  ><?php echo $row_listMovie['movie_decription']; ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="trailerEdit">Trailer Phim</label>
                                                    <input type="text" class="form-control" id="trailerEdit" name="trailerEdit" placeholder="https://www.youtube.com/watch?v=o3ESQWArU2w" value="">
                                                </div>
                                                <hr class="mb-4">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="FilmEdit">Cập Nhật</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" style="display: inline" method="post">
                            <input type="text" name="idRowMovie" value="<?php echo $row_listMovie['movie_id']; ?>" hidden>
                            <button type="submit" name ="deleteRowMovie" style="border: 0;background-color: Transparent;">
                                <i type = "submit" name ="deleteRowMovie" class="far fa-trash-alt" style="color: rgb(247,55,55)"></i>
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