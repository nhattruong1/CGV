
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    margin: auto
}
</style>
<body>
    <table style="width:70%">
    <tr>
        <?php
            for($i=1;$i<=10;$i++){
        ?>
        <td> 
            <?php
                for($j = 1;$j<=10;$j++) 
                {
                    $a = $j * $i;
                    echo ("$i * $j = $a<br>" );
                }
            ?>
        </td>
        <?php
        }
        ?>
    </tr>
    </table>
</body>
</html>