<?php

session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
}

?>

<?php
include_once("../config.php");

$book_id = $_GET['book_id'];

$result = mysqli_query($mysqli, "DELETE FROM booking WHERE book_id='$book_id'");

header("Location:booking.php");
?>