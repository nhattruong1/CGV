<?php
if(isset($_POST["submit"])) {
    $client_id = '2a2b91046de3a83';

    $file = file_get_contents($_FILES['fileToUpload']['tmp_name']);

    $url = 'https://api.imgur.com/3/image.json';
    $headers = array("Authorization: Client-ID $client_id");
    $pvars = array('image' => base64_encode($file));

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_POST => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $pvars
    ));

    $json_returned = curl_exec($curl); // blank response
    $jsonDecode = json_decode($json_returned,true);
    $link = array_column($jsonDecode, 'link');
    $linkPicture =  $link[0];
    echo $linkPicture;
    curl_close($curl);

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
