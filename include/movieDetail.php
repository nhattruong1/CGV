<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }
    $sql_detail = mysqli_query($mysqli, "SELECT * FROM movie WHERE movie_id = '$id'");
?>
<?php
    while($detail = mysqli_fetch_array($sql_detail)){
        $myinput= $detail['movie_date']; 
        $sqldate= date('d/m/Y',strtotime($myinput))
?>
<!-- Content -->
<div class="movie-detail container">
    <div class="title">
        <h3>Nội Dung Phim</h3>
    </div>
    <div class="movie-detail-content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-6">
                <img src="<?php echo $detail['movie_img']?>" alt="">
            </div>
            <div class="col-md-9 col-sm-6 col-6">
                <h4 class="movie-detail-content-name"><?php echo $detail['movie_name']?></h4>
                <hr>
                <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Đạo Diễn:</span> <span><?php echo $detail['movie_directors']?></span></div>
                <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Diễn Viên:</span> <span><?php echo $detail['movie_cast']?></span></div>
                <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Thể Loại:</span> <span><?php echo $detail['movie_cate']?></span></div>
                <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Khởi Chiếu:</span> <span><?php echo $sqldate?></span></div>
                <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Thời Lượng:</span> <span><?php echo $detail['movie_time']?></span></div>
                <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Ngôn Ngữ:</span> <span><?php echo $detail['movie_language']?></span></div>
                <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Rated:</span> <span><?php echo $detail['movie_rate']?></span></div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                    MUA VÉ
                </button>   
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chọn suất chiếu</h4>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-6">
                                    <label for="city" style ="font-weight: bold;">Thành Phố:</label>
                                    <select id = "city"class="form-control" name="city">
                                        <?php
                                        $sql_listCity = mysqli_query($mysqli, 'SELECT DISTINCT `theaters_city` FROM `theaters` ');
                                        while($row_listCity = mysqli_fetch_array($sql_listCity)){
                                    ?>
                                        <option ><?php echo $row_listCity['theaters_city'];?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                <form class = "col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="theater " style ="font-weight: bold;">Danh Sách Rạp:</label>
                                        <select id= "theater" class="form-control" name="theaterName">
                                        <?php
                                            $sql_listTheater = mysqli_query($mysqli, 'SELECT `theaters_name`, `theaters_city`,`theaters_id` FROM `theaters`');
                                        while($row_listTheater = mysqli_fetch_array($sql_listTheater)){
                                        ?>
                                            <option value ="<?php echo $row_listTheater['theaters_id']?>" class=<?php  $string = $row_listTheater['theaters_city']; echo preg_replace('/\s+/', '', $string);?>><?php echo $row_listTheater['theaters_name']?></option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-6">
                                    <label for="ticketType" style ="font-weight: bold;">Loại Vé:</label>
                                    <select id = "ticketType"class="form-control" name="ticketType">
                                        <option selected disabled>Chọn Loại Vé</option>
                                        <option value="Phòng 1">Vé 2D</option>
                                        <option value="Phòng 2">Vé 3D</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="showings" style ="font-weight: bold;">Xuất Chiếu:</label>
                                            <select id = "showings"class="form-control" name="showings">
                                                <?php
                                                $sql_show = mysqli_query($mysqli, "SELECT * FROM showings,theaters, room,movie WHERE showings_room = room_id and showings_name_movie = movie_id and room_theater = theaters_id and movie_id = '$id'");
                                                while($row_show = mysqli_fetch_array($sql_show)){
                                                ?>
                                                    <option class="<?php  $theater = preg_replace('/\s+/', '', $row_show['theaters_name']);$room = preg_replace('/\s+/', '', $row_show['room_name']); echo "$theater $room";?>"><?php echo $row_show['showings_time']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="form2" style ="display: block">.</label>
                                            <form action="" id = "form2">
                                                <button type="submit" class="btn btn-outline-danger" id="btn-outline-danger" style ="margin: 0">Chọn Vé</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class = "mapTheater" id = "mapTheater">loading...</div>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="movie-detail-content-summary">
            <div><?php echo $detail['movie_decription']?></div>
            <center>
                <h4>Trailer</h4>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="<?php echo $detail['movie_trailer']?>" frameborder="0" allowfullscreen class="embed-responsive-item"></iframe>
                </div>
            </center>
        </div>
    </div>
</div>
<!-- End Content -->
<?php
    }
?>