<!-- Checking Whether the admin has been login or not -->
<?php

session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
}

?>

<?php
include_once("../config.php");

$number_plate_id = $_GET['number_plate_id'];

$result = mysqli_query($mysqli, "DELETE FROM car WHERE number_plate_id='$number_plate_id'");

header("Location:carinfo.php");
?>