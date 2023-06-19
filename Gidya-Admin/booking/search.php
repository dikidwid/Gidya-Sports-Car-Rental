<?php
if (isset($_POST['search'])) {
    require_once '../config.php';

    $search = $_POST['search'];

    $query = mysqli_query($mysqli, "SELECT * FROM booking, customer, car WHERE booking.number_plate_id = car.number_plate_id AND booking.customer_id = customer.customer_id AND book_id AND car_type LIKE '%" . $search . "%'");

    while ($row = mysqli_fetch_object($query)) {

        echo "<tr>";
        echo "<td>" . $row->book_id . "</td>";
        echo "<td>" . $row->number_plate_id . "</td>";
        echo "<td>" . $row->customer_id . "</td>";
        echo "<td>" . $row->car_type . "</td>";
        echo "<td>" . $row->customer_name . "</td>";
        echo "<td>" . $row->book_start_date . "</td>";
        echo "<td>" . $row->book_end_date . "</td>";
        echo "<td>" . $row->book_transaction_date . "</td>";

?>
<td>
    <a href='bookingdelete.php?book_id=<?php echo $row->book_id ?>'
        onclick="return confirm('Are you sure want to delete booking <?php echo $row->book_id ?>? If you delete this booking, your invoice with this booking also will be deleted as well')">
        <button class='buttonSec button3'>Delete</button></a>
</td>
</tr>

<?php
    }
}

?>