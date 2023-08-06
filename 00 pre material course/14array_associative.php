<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

//normal array
$numbers = array(1, 2, 3, 4, 50);

echo 'this code ($numbers = array(1, 2, 3, 4, 50); wil result below print r data <br>';
print_r($numbers);

echo '<br><br><hr>';

//create array using function array(), while calling out data from array using echo function echo[]
$names = array("first_name" => 'Achmad', "last_name" => 'Muhyidin');

echo $names['first_name'] . '<br>';
echo $names['last_name'] . '<br><hr>';

// ended 17 june 2023

?>

<body>

</body>

</html>