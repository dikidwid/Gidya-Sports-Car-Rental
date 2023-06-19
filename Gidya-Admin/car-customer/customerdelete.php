<!-- Checking Whether the admin has been login or not -->
<?php

session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
}

?>

<?php
include_once("../config.php");

$customer_id = $_GET['customer_id'];

$result = mysqli_query($mysqli, "DELETE FROM customer WHERE customer_id='$customer_id'");

header("Location: ../car-customer/customer.php");
?>