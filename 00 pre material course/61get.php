<?php
//lesson 61
//superglobal var $_GET

print_r($_GET);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <?php $id = rand(1, 100); ?>

    <div class="container">
        <button class="btn btn-primary">
            <a href="61get.php?id=<?php echo $id; ?>" class="btn btn-primary">CLICK HERE
        </button>
    </div>
</body>

</html>