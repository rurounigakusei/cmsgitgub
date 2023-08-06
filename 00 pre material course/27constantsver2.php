<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Works as of PHP 5.3.0

    const CONSTANT = 'Hello World';


    echo CONSTANT;

    echo "<br>";
    // Works as of PHP 5.6.0

    const ANOTHER_CONST = CONSTANT . '; Goodbye World';

    echo ANOTHER_CONST;

    echo "<br>";

    const ANIMALS = array('dog', 'cat', 'bird');

    echo ANIMALS[1]; // outputs "cat"


    // Works as of PHP 7


    /**
    define('ANIMALS', array(
        'dog', 'cat', 'bird'

    ));

    echo ANIMALS[1]; // outputs "cat"
     */
    ?>
</body>

</html>