<?php include "../includes/dibi/db.php"; ?>
<?php include "functions.php"; ?>

<?php ob_start(); ?>
<?php session_start(); ?>

<?php
if (empty($_SESSION['user_role'])) {
    header("Location:../index.php");
} elseif (isset($_SESSION['user_role'])) {
    if ($user_role = $_SESSION['user_role'] !== 'admin') {
        header("location:../index.php");
    }
}

// if (!isset($_SESSION['user_role'])) {
//     if ($user_role = $_SESSION['user_role'] !== 'admin') {
//         header("location:../index.php");
//     }
// }// using !isset (if not isset) is also work

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - PHP Learning</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- WHAT YOU SEE IS WHAT YOU GET (WYSISWG) -->
    <!-- below is via online connection -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
    <!-- below is WSIYGW from local -->
    <link rel="stylesheet" href=css/summernote.css>
    </link>


    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet">
    <!-- jQuery -->

    <script src="js/scripts.js"></script>
    <script src="js/jquery.js"></script>
    <!-- js/jquery.js is to enabled delete modal in view all post -->
</head>

<body>