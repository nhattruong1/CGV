<?php

include_once("../db/connect.php");

$sql = "SELECT DISTINCT `movie_name` FROM `showings`,movie WHERE showings_name_movie = movie_id";
$result = mysqli_query($mysqli, $sql);
$data = array();
while ($enr = mysqli_fetch_assoc($result)) {
    $a = $enr['movie_name'];
    array_push($data, $a);
}
$myJSON = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo $myJSON;

?>