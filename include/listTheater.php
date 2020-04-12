<?php
    $sql_listCity = mysqli_query($mysqli, 'SELECT DISTINCT `theaters_city` FROM `theaters` ');
?>
<div class="container listTheater">
    <div class="listTheater-title">
        <h1>CGV CINEMA</h1>
    </div>
    <div class="listTheater-listCity">
        <div class="form-group">
            <label for="sel1" style ="font-weight: bold;">Tỉnh Thành:</label>
            <select class="form-control col-md-12 col-sm-12 col-12" id="sel1" onchange="giveSelection(this.value)">
            <?php
                while($row_listCity = mysqli_fetch_array($sql_listCity)){
            ?>
                <option value="<?php echo $row_listCity['theaters_city']?>"><?php echo $row_listCity['theaters_city']?></option>
            <?php 
                }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="sel2" style ="font-weight: bold;">Danh Sách Rạp:</label>
            <select class="form-control col-md-12 col-sm-12 col-12" id="sel2">
            <?php
                $sql_listTheater = mysqli_query($mysqli, 'SELECT `theaters_name`, `theaters_city` FROM `theaters`');
                while($row_listTheater = mysqli_fetch_array($sql_listTheater)){
            ?>
                <option value="<?php echo $row_listCity['theaters_city']?>" data-option="<?php echo $row_listTheater['theaters_city']?>"><?php echo $row_listTheater['theaters_name']?></option>
            <?php 
                }
            ?>
            </select>
        </div>
        <form  style = "display:inline" id="form">
            <button name = "btnDetailTheater" type="submit" class="btn btn-danger" id = "btnDetailTheater">Xem Chi Tiết</button>
        </form>
    </div>
    <div class="listTheater-detail" style="display: none;" id = "listTheater-detail">
    </div>
</div>