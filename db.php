<?php
//new way to get connect
// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "";
// $db['db_name'] = "cms";

// foreach ($db as $key => $value) {
//     define(strtoupper($key), $value);
// } not worked in php 7

$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "cms";

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
// if ($connection) {
//     echo "db connection success";
// } else {
//     echo "connection failed";
// } //commented upon success (no longer needed)
