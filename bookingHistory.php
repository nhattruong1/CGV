<?php
    include_once("db/connect.php");
    session_start();
    $user = $_GET['user'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .title-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .note{
            font-size: small;
            font-style: italic;
        }
        label{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="title-info">
    <h3>Lịch sử đặt vé</h3>
</div>
<table id="historyBooking" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên Phim</th>
        <th scope="col">Ghế</th>
        <th scope="col">Rạp</th>
        <th scope="col">Loại Vé</th>
        <th scope="col">Thời Gian Đặt</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $stt = 0;
    $sql_bookingH = mysqli_query($mysqli, "SELECT movie_name,`booking_seat`,`booking_ticket`,`booking_time`,`theaters_name` FROM `booking`,users,movie,theaters 
    WHERE booking_user = user_id and booking_movie = movie_id and booking_theater = theaters_id and user_email = '$user' ");
    while($row_bookingH = mysqli_fetch_array($sql_bookingH)){
    ?>
    <tr>
        <th scope="row"><?php echo $stt+= 1;?></th>
        <td><?php echo $row_bookingH['movie_name'];?></td>
        <td><?php echo $row_bookingH['booking_seat'];?></td>
        <td><?php echo $row_bookingH['theaters_name'];?></td>
        <td><?php echo $row_bookingH['booking_ticket'];?></td>
        <td><?php echo $row_bookingH['booking_time'];?></td>
    </tr>
    <?php
        }
    ?>
    </tbody>
</table>
<div class="note">
    *Ghi Chú:
    <div>
        - Vé Phim 2D: Ở phòng số 1.
    </div>
    <div>
        - Vé Phim 3D: Ở phòng số 2.
    </div>
</div>
</body>
</html>
