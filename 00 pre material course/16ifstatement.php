<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //lesson 15 in demo folder
    /*if(logic to be tested){
    action if true
} else{
    action if false
}
*/

    // first logic test
    echo "3 is less than 10 ? <br>";
    if (3 < 10) {
        echo "true response : yes three is less than 10";
    } else {
        echo "false response : no three is less than 10 ";
    }

    echo "<br><hr>";

    // second logic test
    echo "3 is greater than 10 ? <br>";
    if (3 > 10) {
        echo "true response :yes three is less than 10";
    } else {
        echo "false response :no three is less than 10";
    }
    echo "<br><br><hr>";

    // Elseif logic test
    echo "which one is correct : ?<br>
    a. 3 is greater than 10 <br>
    b. 4 is less than 10 <br>
    c. both is wrong ? <br>";

    if (3 > 10) {
        echo "true response : three is less than 10";
    } elseif (4 < 10) {
        echo "elseif response : yes four is less than ten";
    } else {
        echo "false response :no three is less than 10";
    }
    echo "<br><br><hr>";
    ?>
</body>

</html>