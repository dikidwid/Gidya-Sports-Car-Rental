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

   $query = mysqli_query($mysqli, "SELECT * FROM invoice WHERE invoice_id LIKE '%" . $search . "%'");
   while ($row = mysqli_fetch_object($query)) {

      echo "<tr>";
      echo "<td>" . $row->invoice_id . "</td>";
      echo "<td>" . $row->book_id . "</td>";
      echo "<td>" . $row->date . "</td>";
      echo "<td>" . $row->status . "</td>";


      echo "<td><a href='invoiceprint.php?pdf=$row->invoice_id'>
                     <button class='buttonRd button4'>Print</button></a>

                  <a href='invoiceedit.php?invoice_id=$row->invoice_id'>
                     <button class='buttonTh button2'>Edit</button></a>";
?>

<a href='invoicedelete.php?invoice_id=<?php echo $row->invoice_id ?>'
   onclick="return confirm('Are you sure want to delete invoice <?php echo $row->invoice_id ?>?')">
   <button class='buttonSec button3'>Delete</button></a></td>
</tr>

<?php
   }
}

?>