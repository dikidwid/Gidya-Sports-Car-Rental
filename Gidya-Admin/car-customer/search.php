<!-- Checking Whether the admin has been login or not -->
<?php

session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
}

?>

<?php
if (isset($_POST['search'])) {
    require_once '../config.php';

    $search = $_POST['search'];

    $query = mysqli_query($mysqli, "SELECT * FROM customer WHERE customer_id LIKE '%" . $search . "%'
            OR customer_name LIKE '%" . $search . "%'");
    while ($row = mysqli_fetch_object($query)) {

        echo "<tr>";
        echo "<td>" . $row->customer_id . "</td>";
        echo "<td>" . $row->customer_name . "</td>";
        echo "<td>" . $row->customer_address . "</td>";
        echo "<td>" . $row->customer_ktp_no . "</td>";
        echo "<td>" . $row->customer_phone . "</td>";
        echo "<td>" . $row->customer_email . "</td>";
        echo "<td>" . $row->customer_emergcp . "</td>";
        echo "<td>" . $row->customer_emergcp_phone . "</td>";
        echo "<td>" . $row->customer_emergcp_email . "</td>";
        echo "<td>" . $row->customer_bankaccount . "</td>";
        echo "<td>" . $row->customer_bankaccount_no . "</td>";
?>

<td><a href='customeredit.php?customer_id=<?php echo $row->customer_id ?>'>
        <button class='buttonTh button2'>Edit</button></a><br>

    <a href='customerdelete.php?customer_id=<?php echo $row->customer_id ?>'
        onclick="return confirm('Are you sure want to delete customer (<?php echo $row->customer_id ?>) <?php echo $row->customer_name ?>?')">
        <button class='buttonSec button3'>Delete</button></a>
</td>
</tr>

<?php
    }
}

?>