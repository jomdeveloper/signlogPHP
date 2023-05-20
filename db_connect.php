<?php

// if you have different credentials in your mysql database
// change the bellow credentials
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'signlog_php';

$mysqli = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
    die('Connection failed: ' . mysqli_connect_error());
}

return $mysqli;