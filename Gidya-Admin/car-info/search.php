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

    $query = mysqli_query($mysqli, "SELECT * FROM car WHERE number_plate_id LIKE '%" . $search . "%'
            OR car_type LIKE '%" . $search . "%'");
    while ($row = mysqli_fetch_object($query)) {

        echo "<tr>";
        echo "<td>" . $row->number_plate_id . "</td>";
        echo "<td>" . $row->car_type . "</td>";
        echo "<td>" . $row->car_fuel . "</td>";
        echo "<td>" . $row->car_seat . "</td>";
        echo "<td>" . $row->car_nitro . "</td>";
        echo "<td>Rp " . number_format($row->car_rent_price) . "</td>";
        echo "<td>" . $row->car_availability . "</td>";
        echo "<td>" . $row->car_description . "</td>";
?>

<td><a href='caredit.php?number_plate_id=<?php echo $row->number_plate_id ?>'>
        <button class='buttonTh button2'>Edit</button></a><br>

    <a href='cardelete.php?number_plate_id=<?php echo $row->number_plate_id ?>'
        onclick="return confirm('Are you sure want to delete room <?php echo $row->number_plate_id ?>?')">
        <button class='buttonSec button3'>Delete</button></a>
</td>
</tr>

<?php
    }
}

?>