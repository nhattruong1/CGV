<?php

include_once("../db/connect.php");
header('Content-Type: application/json');
$sqlGetList = "SELECT * from movie";
$listMovie = mysqli_query($mysqli, $sqlGetList);
$api = array();
$data = array();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    while ($enr = mysqli_fetch_assoc($listMovie)) {
        $dataArr = array($enr);
        array_push($data, $dataArr);
    }
    $api['Code'] = 200;
    $api['Status'] = 'OK';
    $api['Description'] = 'The request was successfully completed.';
    $api['amount'] = count($data);
    $api['data'] = $data;

}else{
    $api['Code'] = 404;
    $api['Status'] = 'Not Found';
    $api['Description'] = 'The requested resource was not found.';
    $api['amount'] = count($data);
    $api['data'] = $data;
}
echo json_encode($api,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

?>