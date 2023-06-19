<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carRent";

$mysqli = mysqli_connect($servername, $username, $password, $dbname);

if (!$mysqli) {
    die("<script>alert('Connection Failed.')</script>");
}

?>