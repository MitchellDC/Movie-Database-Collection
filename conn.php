<?php
session_start();

$serverName = "127.0.0.1";
$userName = "root";
$password = "";
$port = "3306";
$db = "csc257";
    // 1. Create a connection
$conn = mysqli_connect($serverName, $userName, $password ,$db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

