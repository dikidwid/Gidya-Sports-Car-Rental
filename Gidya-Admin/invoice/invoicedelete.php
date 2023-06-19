<!-- Checking Whether the admin has been login or not -->
<?php

session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
}

?>

<?php

include_once("../config.php");

$invoice_id = $_GET['invoice_id'];

$result = mysqli_query($mysqli, "DELETE FROM invoice WHERE invoice_id='$invoice_id'");

header("Location:invoice.php");
?>