<?php 
    include_once("db/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .noselect {
        -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Old versions of Firefox */
                -ms-user-select: none; /* Internet Explorer/Edge */
                    user-select: none; /* Non-prefixed version, currently
                                        supported by Chrome, Opera and Firefox */
        }
        @media only screen and (max-width: 1366px) {
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 60px
            }
            .theaterMap .screen {
            background-color: rgb(240,240,240);
            text-align: center;
            margin-top: 8px;
            margin-bottom: 30px;
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 30px;
                font-size: 15.5px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .seats:hover {
                background-color: green;
            }
        }
        @media only screen and (max-width: 1198px) {
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 60px
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 25;
                font-size: 15.5px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .seats:hover {
                background-color: green;
            }
        }
        @media only screen and (max-width: 991px) {
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 40px 
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 20px;
                font-size: 15.5px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .seats:hover {
                background-color: green;
            }
        }
        @media only screen and (max-width: 767px) {
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 25px
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 15px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .seats:hover {
                background-color: green;
            }
        }
        @media only screen and (max-width: 515px) {
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 15px
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .seats:hover {
                background-color: green;
            }
        }
        @media only screen and (max-width: 375px) {
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 3px
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 5px;
                font-size: 9px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .seats:hover {
                background-color: green;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="theaterMap col">
            <div class="screen">SCREEN</div>
            <?php
                $sql_seatRow = mysqli_query($mysqli, "SELECT DISTINCT seat_row FROM seat WHERE seat_room = 1");
                while($row_seatRow = mysqli_fetch_array($sql_seatRow)){
            ?>
            <div class="rowSeat">
            <?php
                $sql_seat = mysqli_query($mysqli, "SELECT `seat_name` from seat WHERE seat_row = '".$row_seatRow['seat_row']."' and seat_room = 1");
                while($row_seat = mysqli_fetch_array($sql_seat)){
            ?>
                <div class="seats noselect"><?php echo $row_seat['seat_name']?></div>
                <?php } ?>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>
<script>
$(".seats").click(function (event) {
    var color = $(event.target).css("background-color");
    if(color === "rgb(230, 202, 196)"){
        $(this).css("background-color", "rgb(185,222,160)");
    }
    else{
        $(this).css("background-color", "rgb(230,202,196)");
    }
});
</script>
</body>
</html>