<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }
    $sql_detail = mysqli_query($mysqli, "SELECT * FROM news WHERE news_id = '$id'");
?>
<?php
    while($detail = mysqli_fetch_array($sql_detail)){
?>
<!-- Content -->
<div class="newDetail container">
    <div class="newDetail-title">
        <h4><?php echo $detail['news_title']?></h4>
    </div>
    <div class="row">
        <div class="col-md-5 col-sm-5 col-5">
            <img src="<?php echo $detail['news_imgL']?>" alt="">
        </div>
        <div class="col-md-7 col-sm-7 col-7">
            <span>
                <?php echo $detail['new_content']?>
            </span>
        </div>
    </div>
</div>
<?php
    }
?>
<!-- End Content   -->
