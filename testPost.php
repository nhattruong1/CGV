<?php

if(isset($_POST["submit"])) {
    $allow = array("jpg", "jpeg", "gif", "png");

    $todir = 'img/';

    if ( !!$_FILES['fileToUpload']['tmp_name'] )
    {
        $info = explode('.', strtolower( $_FILES['fileToUpload']['name']) ); // whats the extension of the file

        if ( in_array( end($info), $allow) ) // is this file allowed
        {
            move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $todir . basename($_FILES['fileToUpload']['name'] ) );
            echo $_FILES['fileToUpload']['name'];
        }
    }
}
?>
<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
