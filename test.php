<?php
session_start() ;

if (isset($_POST["submit"]) ) {
    if ($_POST["seatname"] != ""){
        if ($_SESSION["array"] != "") {
            $_SESSION["array"] .= "," ;
        }
    }

    $_SESSION["array"] .= $_POST["seatname"] ;
}
else {
    $_SESSION["array"] = "" ;
}

$demo   = $_SESSION["array"];
?>
<html>
<style>
    .seats {
        display: inline;
        padding: 20px;
        font-size: 15.5px;
        border-radius: 5px;
        background-color: rgb(185,222,160);
        color: white;
        font-weight: bold;
        border: 0;
    }
</style>
<body>
<form action="" method="post">
    <input id="age" type="text" name="seatname" value="" style="display: none"/>
    <button type="submit" class="seats" name = "submit">Submit</button>
</form>
<p id="demo"><?php echo $demo ?></p>
</body>
</html>