<?php

include_once("../db/connect.php");

$sql = "SELECT COUNT(booking_id), movie_name
FROM booking,movie WHERE movie_id = booking_movie
GROUP BY movie_name";
$result = mysqli_query($mysqli, $sql);
$data = array();
while ($enr = mysqli_fetch_assoc($result)) {
    $dataArr = array('name' => $enr['movie_name'],'amount' => $enr['COUNT(booking_id)']);
    array_push($data, $dataArr);
}
$myJSON = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo $myJSON;

?>