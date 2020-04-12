<!-- Content -->
<?php
        $sql_listMovie = mysqli_query($mysqli, 'Select * from movie order by movie_id desc');
    ?>
    <div class="content container">
        <div class="content-movie">
            <div class="content-movie-title">
                <h2>MOVIE SELECTION</h2>
            </div>
            <div class="content-movie-list">
                <div class="slider slider-nav">
                    <?php
                    while($row_listMovie = mysqli_fetch_array($sql_listMovie)){
                    ?>
                    <a href="?controller=phim&id=<?php echo $row_listMovie['movie_id']?>">
                        <img src="<?php echo $row_listMovie['movie_img']?>" alt="">
                    </a>
                    <?php
                        }
                    ?>
                </div>
                
            </div>
            <div class="content-event">
                <div class="content-event-title">
                    <h2>EVENT</h2>
                </div>
                <div class="content-event-list">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-3 banner">
                            <a href="">
                                <img src="./img/evleft.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6 banner">
                            <a href="">
                                <img src="./img/evcenter.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-3 col-3 banner">
                            <a href="">
                                <img src="./img/evleft.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->