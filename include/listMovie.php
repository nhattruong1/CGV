<!-- Content -->
<?php
        $sql_listMovie = mysqli_query($mysqli, 'Select * from movie order by movie_id desc');
?>
<div class="listMovie-content container">
        <h2 class="listMovie-content-title">
            Phim Đang Chiếu
        </h2>
        <div class="borderBottom-title"></div>
        <div class="listMovie-content-list">
            <div class="row">
                <?php
                    while($row_listMovie = mysqli_fetch_array($sql_listMovie)){
                        $myinput= $row_listMovie['movie_date']; 
                        $sqldate= date('d/m/Y',strtotime($myinput))
                ?>
                <div class="col-md-4 col-sm-6 col-6">
                    <a href="?controller=phim&id=<?php echo $row_listMovie['movie_id']?>">
                        <img src="<?php echo $row_listMovie['movie_img']?>" alt="">
                    </a>
                    <div class="movie-info">
                        <h4><?php echo $row_listMovie['movie_name']?></h4>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Đạo Diễn:</span> <span class="d"><?php echo $row_listMovie['movie_directors']?></span></div>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Khởi Chiếu:</span> <span class="d"><?php echo $sqldate?></span></div>
                    <div class="movie-detail-content-info"><span class="movie-detail-content-info-detail">Thời Lượng:</span> <span class="d"><?php echo $row_listMovie['movie_time']?></span></div>
                    </div>
                    <div class="movie-btn">
                        <button type="button" class="btn btn-danger">Mua Vé </button>
                        <button type="button" class="btn btn-outline-danger">Xem Chi Tiết</button>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- End Content -->