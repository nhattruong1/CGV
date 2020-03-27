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
                <h4 ><?php echo $detail['movie_name']?></h4>
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
                            <ul class="nav nav-tabs">
                            <?php  
                                for($i=0;$i<5;$i++){
                                    $n=date('d-m',strtotime("+$i day"));
                                    $l= date("D",strtotime("+$i day"));
                                    ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($i == 0){echo "active";}?>" data-toggle="tab" href="#day<?php echo $i;?>"><?php echo "$l $n";?></a>
                                </li>
                            <?php
                                }
                            ?>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <?php
                                    for($i=0;$i<5;$i++){
                                ?>
                                <div id="day<?php echo $i;?>" class="container tab-pane <?php if($i == 0){echo "active"; }?>"><br>
                                    <h3>HOME</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <?php 
                                    } 
                                ?>
                            </div>
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
                <iframe  width="560" height="315" src="<?php echo $detail['movie_trailer']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </center>
        </div>
    </div>
</div>
<!-- End Content -->
<?php
    }
?>