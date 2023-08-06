<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function sumarize($number1, $number2)
    {
        $sum = $number1 + $number2;
        return $sum;
    }

    $sumresult = sumarize(40, 40);
    echo $sumresult;

    echo "<br><hr>";

    $sumresult = sumarize($sumresult, 120);
    echo $sumresult;
    ?>
</body>

</html>