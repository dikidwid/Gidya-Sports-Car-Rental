<!-- Checking Whether the admin has been login or not -->
<?php

session_start();

if (!isset($_SESSION['user_name'])) {
  header("Location: ../index.php");
}

?>

<?php
include_once("../config.php");

$result = mysqli_query($mysqli, "SELECT * FROM customer ORDER BY customer_id");
?>



<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gidya Sports Car Rental</title>

  <!-- Custom fonts for this template-->

  <script src="https://kit.fontawesome.com/5861662ffd.js" crossorigin="anonymous"></script>
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/roomcss.css?v=1.4">
  <link rel="stylesheet" href="../css/floatbtn.css?v=1.2">
  <link rel="stylesheet" href="../css/floatbtn.css?v=1.2">

</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../car-info/carinfo.php">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">Gidya Sports Car Rental</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../car-info/carinfo.php">
          <i class="fa-solid fa-car"></i>
          <span>Car Info</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../car-customer/customer.php">
          <i class="fa-solid fa-user"></i>
          <span>Customer</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../booking/booking.php">
          <i class="fa-solid fa-calendar"></i>
          <span>Booking</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../invoice/invoice.php">
          <i class="fa-solid fa-file-invoice-dollar"></i>
          <span>Payment Invoice</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" id="search" class="form-control bg-light border-0 small"
                placeholder="Search by Customer ID or Customer Name" aria-label="Search"
                aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topnav-right">
              <a href="../logout.php">
                <span style="font-size: 1em; color: Tomato;">
                  <i class="fa-solid fa-right-from-bracket fa-sm fa"> Logout</i>
                </span>
              </a>
            </div>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Customer Info</h1>

          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">List of Customer Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Customer ID</th>
                      <th>Customer Name</th>
                      <th>Customer Address</th>
                      <th>Customer KTP No</th>
                      <th>Customer Phone</th>
                      <th>Customer Email</th>
                      <th>Bank Name</th>
                      <th>Bank Account No</th>
                      <th>Emergency CP Name</th>
                      <th>Emergency CP Phone</th>
                      <th>Emergency CP Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody id="tampil">

                    <?php
                    while ($user_data = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>" . $user_data['customer_id'] . "</td>";
                      echo "<td>" . $user_data['customer_name'] . "</td>";
                      echo "<td>" . $user_data['customer_address'] . "</td>";
                      echo "<td>" . $user_data['customer_ktp_no'] . "</td>";
                      echo "<td>" . $user_data['customer_phone'] . "</td>";
                      echo "<td>" . $user_data['customer_email'] . "</td>";
                      echo "<td>" . $user_data['customer_bankaccount'] . "</td>";
                      echo "<td>" . $user_data['customer_bankaccount_no'] . "</td>";
                      echo "<td>" . $user_data['customer_emergcp'] . "</td>";
                      echo "<td>" . $user_data['customer_emergcp_phone'] . "</td>";
                      echo "<td>" . $user_data['customer_emergcp_email'] . "</td>";

                    ?>
                    <td><a href='customeredit.php?customer_id=<?php echo $user_data['customer_id'] ?>'>
                        <button class='buttonTh button2'>Edit</button></a> <br>

                      <a href='customerdelete.php?customer_id=<?php echo $user_data['customer_id'] ?>'
                        onclick="return confirm('Are you sure want to delete customer (<?php echo $user_data['customer_id'] ?>) <?php echo $user_data['customer_name'] ?>?')">
                        <button class='buttonSec button3'>Delete</button></a>
                    </td>
                    </tr>

                    <?php

                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <a href="customeradd.php" class="act-btn">
            +
          </a>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Gidya Sports Car Rental 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

  <script src="../jquery.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#search').on('keyup', function () {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            search: $(this).val()
          },
          cache: false,
          success: function (data) {
            $('#tampil').html(data);
          }
        });
      });
    });
  </script>

</body>

</html>