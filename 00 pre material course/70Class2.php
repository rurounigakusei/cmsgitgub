<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    //membuat class, bisa saja class isinya kosong
    class Car
    {
        function MoveWheels()
        {
        }
    }

    if (method_exists("Car", "MoveWheels")) {
        echo "method are exist";
    } else {
        echo "method are not exist";
    }



    ?>
</body>

</html>