<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    //cara array pertama
    $NumberLista = array(23, 45, 67, 8999, '345', '<h1>Hello bosses</h1>');
    // array dimulai dari 0,1,2,3 dst..

    //cara array kedua
    $NumberListb = [23, 45, 67, 8999, '345', 'Hello bosses'];


    //menampilkan data dengan fungsi echo
    echo $NumberLista[0];
    echo '<br><hr>';

    echo $NumberListb[0];
    echo '<br><hr>';

    //test menampilkan isi array dengan print_r
    print_r($NumberLista);
    echo '<br><hr>';
    print_r($NumberListb);


    ?>

</body>

</html>