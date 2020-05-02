<?php 
    include_once("db/connect.php");
    session_start();
    $showingRoom = $_GET['showing'];
    $_SESSION['idRoom'] = $showingRoom;
    $sql_ticketInfo = mysqli_query($mysqli, "SELECT * FROM `showings`,theaters,room,movie WHERE showings_name_movie = movie_id and showings_room = room_id and room_theater = theaters_id and showings_room = '$showingRoom'");
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
        .disabled{
            pointer-events: none;
        }

        .noteTitle {
            margin-bottom: 15px;
            font-weight: bold;
            margin-right: 10px;
            font-size:11px
            }
        .seatNoteA {
            padding: 10px;
            font-size: 11px;
            border-radius: 5px;
            background-color: rgb(185,222,160);
            color: white;
            font-weight: bold;
        }
        .seatNoteB {
            padding: 10px;
            font-size: 11px;
            border-radius: 5px;
            background-color: rgb(230,202,196);
            color: white;
            font-weight: bold;
        }

        .seatNoteC {
            padding: 10px;
            font-size: 11px;
            border-radius: 5px;
            background-color: rgb(71,43,52);
            color: white;
            font-weight: bold;
        }
        .theaterMap .rowSeat {
            text-align:center;
            margin-bottom: 5px
        }
        .theaterMap .screen {
        background-color: rgb(240,240,240);
        text-align: center;
        margin-top: 8px;
        margin-bottom: 30px;
        }
        .reserved {
            display: inline;
            padding: 20px;
            font-size: 15.5px;
            border-radius: 5px;
            background-color: rgb(71,43,52);
            color: white;
            font-weight: bold;
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
        @media only screen and (max-width: 1198px) {
            .noteTitle {
                margin-bottom: 15px;
                font-weight: bold;
                margin-right: 10px;
                font-size:11px
                }
            .seatNoteA {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;
            }
            .seatNoteB {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(230,202,196);
                color: white;
                font-weight: bold;  
            }
            .seatNoteC {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 5px
            }
            .reserved {
                display: inline;
                padding: 17px;
                font-size: 15.5px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 17px;
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
            .noteTitle {
                margin-bottom: 15px;
                font-weight: bold;
                margin-right: 10px;
                font-size:11px
                }
            .seatNoteA {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;
            }
            .seatNoteB {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(230,202,196);
                color: white;
                font-weight: bold;  
            }
            .seatNoteC {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 5px
            }
            .reserved {
                display: inline;
                padding: 8px;
                font-size: 15.5px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 8px;
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
            .noteTitle {
                margin-bottom: 15px;
                font-weight: bold;
                margin-right: 10px;
                font-size:11px
                }
            .seatNoteA {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;
            }
            .seatNoteB {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(230,202,196);
                color: white;
                font-weight: bold;  
            }
            .seatNoteC {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 5px
            }
            .reserved {
                display: inline;
                padding: 12px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 12px;
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
        @media only screen and (max-width: 548px) {
            .noteTitle {
                margin-bottom: 15px;
                font-weight: bold;
                margin-right: 10px;
                font-size:11px
                }
            .seatNoteA {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;
            }
            .seatNoteB {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(230,202,196);
                color: white;
                font-weight: bold;  
            }
            .seatNoteC {
                padding: 10px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 5px
            }
            .reserved {
                display: inline;
                padding: 9px;
                font-size: 11px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;
            }
            .theaterMap .rowSeat .seats {
                display: inline;
                padding: 9px;
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
            .noteTitle {
                margin-bottom: 10px;
                font-weight: bold;
                margin-right: 10px
            }
            .seatNoteA {
                padding: 5px    ;
                font-size: 9px;
                border-radius: 5px;
                background-color: rgb(185,222,160);
                color: white;
                font-weight: bold;
            }
            .seatNoteB {
                padding: 5px;
                font-size: 9px;
                border-radius: 5px;
                background-color: rgb(230,202,196);
                color: white;
                font-weight: bold;  
            }
            .seatNoteC {
                padding: 5px;
                font-size: 9px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;  
            }
            .theaterMap .rowSeat {
                text-align:center;
                margin-bottom: 3px
            }
            .reserved {
                display: inline;
                padding: 5px;
                font-size: 9px;
                border-radius: 5px;
                background-color: rgb(71,43,52);
                color: white;
                font-weight: bold;
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
<div class="theaterMap">
    <?php
        while($row_ticketInfo = mysqli_fetch_array($sql_ticketInfo)){
            $_SESSION['theaterName'] = $row_ticketInfo['theaters_id'];
            $_SESSION['typeTicket'] = $row_ticketInfo['room_name'];
            if($row_ticketInfo['room_name'] == 'Phòng 1'){
                $_SESSION['ticketName'] = 'Vé Phim 2D';
            }else if ($row_ticketInfo['room_name'] == 'Phòng 2'){
                $_SESSION['ticketName'] = 'Vé Phim 3D';
            }
    ?>
    <div class="ticket-info">
        <div>Phim: <span><?php echo $row_ticketInfo['movie_name'];?></span></div>
        <div>Suất Chiếu: <span><?php echo $row_ticketInfo['showings_time'];?></span></div>
        <div>Rạp: <span><?php echo $row_ticketInfo['theaters_name'];?></span></div>
        <div>Phòng: <span><?php echo $row_ticketInfo['room_name'];?></span></div>
        <div>Ghế: <span id="seatN"></span></div>
    </div>
    <form action="" method="post" id = "booking">
        <input type="hidden" name="listTicket" id="listTicket" value=""/>
        <button type="submit" name="booking" class="btn btn-primary">Đặt Vé</button>
    </form>
    <?php } ?>
    <div class="screen">SCREEN</div>
    <?php
        $sql_seatRow = mysqli_query($mysqli, "SELECT DISTINCT seat_row from seat where seat_room = '$showingRoom'");
        while($row_seatRow = mysqli_fetch_array($sql_seatRow)){
    ?>
    <div class="rowSeat">
    <?php
        $sql_seat = mysqli_query($mysqli, "SELECT * from seat where  seat_row = '".$row_seatRow['seat_row']."' and seat_room = '$showingRoom'");
        while($row_seat = mysqli_fetch_array($sql_seat)){
    ?>
        <form action="" method="post" class="seatName" style="display: inline;margin: 0">
            <input type="text" name="seatName" value="<?php echo $row_seat['seat_name']?>" style="display: none"/>
            <button style="margin: 0;border: 0" type="submit" class="<?php if($row_seat['seat_status'] == 1) echo "reserved disabled"; else echo "seats"?> noselect" name = "submit"><?php echo $row_seat['seat_name']?></button>
        </form>
<!--        <div class="--><?php //if($row_seat['seat_status'] == 1) echo "reserved"; else echo "seats"?><!-- noselect">--><?php //echo $row_seat['seat_name']?><!--</div>-->
        <?php } ?>
    </div>
    <?php 
    }
    ?>
    <div class="note">
        <div class = "noteTitle">Ghi Chú:</div>
        <div class="seatNoteA noselect" style= "display: inline">A1</div>
        <div class="noselect noteTitle" style= "display: inline">Ghế còn trống</div>
        <div class="seatNoteB noselect" style= "display: inline">A1</div>
        <div class="noselect noteTitle" style= "display: inline">Ghế đang chọn</div>
        <div class="seatNoteC noselect" style= "display: inline">A1</div>
        <div class="noselect noteTitle" style= "display: inline">Ghế đã được đặt</div>
    </div>
</div>
<script>
    let array = [];
    $('.seatName').submit(function() {
        var text = $(this).text();
        $.ajax({
            url: $('.seatName').attr('action'),
            type: 'POST',
            data : $('.seatName').serialize(),
            success: function(){
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        array= array.includes(text) ? array.filter(el=>el!=text) : array.concat(text);
                        let newS = array.toString();
                        console.log(array);
                        document.getElementById("seatN").innerHTML = newS;
                    }
                };
                xmlhttp.open("POST","seatSelect.php",true);
                xmlhttp.send();
            }
        });
        return false;
    });
</script>
</body>
</html>