<?php
//lesson 64
$name = "myname";
$value = 100;
$expired = time() + (60 * 60 * 24 * 7); // 60 detik =1menit * 60 =1 jam * 24 = 1hari * 7 = 1minggu

setcookie($name, $value, $expired);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    //lesson 65 reading cookie

    if (isset($_COOKIE["myname"])) {
        $somename = $_COOKIE["myname"];
        echo $somename;
    } else {
        $somename = "";
    }
    ?>
</body>

</html>