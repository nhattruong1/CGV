<?php 
    include_once("db/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px
}

table, td, th {
    border: 1px solid black;
    padding: 5px
}

th {
    text-align: center;
}
</style>
</head>
<body>

<?php
$q = $_GET['q'];
$sql_list = mysqli_query($mysqli, "SELECT * FROM `theaters` WHERE `theaters_name` = '".$q."'"); 
    echo "<table>
    <tr>
    <th>Tên Rạp</th>
    <th>Địa Chỉ</th>
    <th>Tỉnh Thành</th>
    <th>Email</th>
    <th>Số Điện Thoại</th>
    </tr>";
    while($row_list = mysqli_fetch_array($sql_list)){
        echo "<tr>";
        echo "<td>" . $row_list['theaters_name'] . "</td>";
        echo "<td>" . $row_list['theaters_address'] . "</td>";
        echo "<td>" . $row_list['theaters_city'] . "</td>";
        echo "<td>" . $row_list['theaters_mail'] . "</td>";
        echo "<td>" . $row_list['theaters_phone'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>