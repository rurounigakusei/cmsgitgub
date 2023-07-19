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

// $DB_HOST = "sql212.infinityfree.com";
// $DB_USER = "if0_34643018";
// $DB_PASS = "fyriCTe2XN9";
// $DB_NAME = "if0_34643018_cms";

$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
// if ($connection) {
//     echo "db connection success";
// } else {
//     echo "connection failed";
// } //commented upon success (no longer needed)
