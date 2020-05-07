<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }
    $_SESSION['IDMovie'] = $id;
    if(isset($_POST['booking'])){
        $_SESSION['ticket'] = $_POST['listTicket'];
        $reserved = array();
        $arr = array_map('trim', explode(',', $_SESSION['ticket']));
        foreach ($arr as $seat) {
            $sql_checkReserved = mysqli_query($mysqli, "SELECT * FROM `seat` 
            WHERE `seat_name` = '$seat' and `seat_room` = '".$_SESSION['idRoom']."' and `seat_status` = 1");
            $checkReserved = mysqli_num_rows($sql_checkReserved);
            if($checkReserved == 1){
                array_push($reserved,$seat);
            }else{
                $sql_getSeat = mysqli_query($mysqli, "UPDATE `seat` SET `seat_status`= 1 
                WHERE `seat_room`= '".$_SESSION['idRoom']."' and seat_name = '$seat'");
                $sql_insertBookingHis = mysqli_query($mysqli, "INSERT INTO `booking` (`booking_id`, `booking_user`, `booking_movie`, `booking_theater`, `booking_seat`, `booking_ticket`, `booking_time`) 
                VALUES (NULL, '".$_SESSION['idUser']."', '".$_SESSION['IDMovie']."', '".$_SESSION['theaterName']."', '$seat', '".$_SESSION['ticketName']."', NOW())");
            }
        }
        if (empty($reserved)) {
            echo "<script type='text/javascript'>alert('Đặt vé thành công, vui lòng kiểm tra lịch sử đặt vé.');</script>";
        }else{
            $reservedString = implode(", ",$reserved);
            echo "<script type='text/javascript'>alert('Ghế $reservedString. đã có người đặt');</script>";

        }
    }

?>
<?php
    $sql_detail = mysqli_query($mysqli, "SELECT * FROM movie WHERE movie_id = '$id'");

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
                <button type="button" class="btn btn-danger" data-toggle="modal" <?php if(isset($_SESSION['user']) && $_SESSION['user'] != ''){echo 'data-target="#myModal"';}else{echo 'onclick="notification()"';}?>>
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
                            <form id="form2">
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label for="theater " style ="font-weight: bold;">Danh Sách Rạp:</label>
                                    <select id= "theater" class="form-control" name="theaterName">
                                        <?php
                                        $firstArr = true;
                                        $lastValue = "";
                                        $sql_listTheater = mysqli_query($mysqli, 'SELECT `theaters_name`, `theaters_city`,`theaters_id` FROM `theaters`');
                                        while($row_listTheater = mysqli_fetch_array($sql_listTheater)){
                                            if($lastValue != $row_listTheater['theaters_city']){
                                                $firstArr = true;
                                            }else{
                                                $firstArr = false;
                                            }
                                            ?>
                                            <option class="<?php  $string = $row_listTheater['theaters_city']; if($firstArr == true){echo preg_replace('/\s+/', '', $string);}?>" disabled selected>Chọn Rạp</option>
                                            <option value ="<?php echo $row_listTheater['theaters_id']?>" class=<?php  $string = $row_listTheater['theaters_city']; echo preg_replace('/\s+/', '', $string);$lastValue =$row_listTheater['theaters_city'];?>><?php echo $row_listTheater['theaters_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="showings" style ="font-weight: bold;">Xuất Chiếu:</label>
                                    <select id = "showings"class="form-control" name="showings">
                                        <?php
                                        $sql_show = mysqli_query($mysqli, "SELECT * FROM showings,theaters, room,movie WHERE showings_room = room_id and showings_name_movie = movie_id and room_theater = theaters_id and movie_id = '$id'");
                                        while($row_show = mysqli_fetch_array($sql_show)){
                                            ?>
                                            <option class="<?php  $theater = preg_replace('/\s+/', '', $row_show['theaters_name']);$city = preg_replace('/\s+/', '', $row_show['theaters_city']); echo "$theater $city";?>" value="<?php echo $row_show['showings_room']?>"><?php echo $row_show['showings_time']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng ký giữ ghế</button>
                            </form>
                            <div class = "mapTheater" id = "mapTheater" style="padding: 0; margin-top: 15px"></div>
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