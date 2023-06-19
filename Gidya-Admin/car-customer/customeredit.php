<!-- Checking Whether the admin has been login or not -->
<?php

session_start();

if (!isset($_SESSION['user_name'])) {
	header("Location: ../index.php");
}

?>

<?php
include_once("../config.php");

if (isset($_POST['updateCustomer'])) {
	$customer_id = $_POST['customer_id'];
	$customer_name = $_POST['customer_name'];
	$customer_address = $_POST['customer_address'];
	$customer_ktp_no = $_POST['customer_ktp_no'];
	$customer_phone = $_POST['customer_phone'];
	$customer_email = $_POST['customer_email'];
	$customer_emergcp = $_POST['customer_emergcp'];
	$customer_emergcp_phone = $_POST['customer_emergcp_phone'];
	$customer_emergcp_email = $_POST['customer_emergcp_email'];
	$customer_bankaccount = $_POST['customer_bankaccount'];
	$customer_bankaccount_no = $_POST['customer_bankaccount_no'];

	$result = mysqli_query($mysqli, "UPDATE customer SET customer_name = '$customer_name', customer_address = '$customer_address', customer_ktp_no = '$customer_ktp_no', customer_phone = '$customer_phone', customer_email = '$customer_email', customer_emergcp = '$customer_emergcp', customer_emergcp_phone = '$customer_emergcp_phone', customer_emergcp_email = '$customer_emergcp_email', customer_bankaccount = '$customer_bankaccount', customer_bankaccount_no = '$customer_bankaccount_no' WHERE customer_id = $customer_id");

	header("Location: customer.php");
}
?>

<?php
$customer_id = $_GET['customer_id'];

$result = mysqli_query($mysqli, "SELECT * FROM customer WHERE customer_id=$customer_id");

while ($user_data = mysqli_fetch_array($result)) {
	$customer_id = $user_data['customer_id'];
	$customer_name = $user_data['customer_name'];
	$customer_address = $user_data['customer_address'];
	$customer_ktp_no = $user_data['customer_ktp_no'];
	$customer_phone = $user_data['customer_phone'];
	$customer_email = $user_data['customer_email'];
	$customer_emergcp = $user_data['customer_emergcp'];
	$customer_emergcp_phone = $user_data['customer_emergcp_phone'];
	$customer_emergcp_email = $user_data['customer_emergcp_email'];
	$customer_bankaccount = $user_data['customer_bankaccount'];
	$customer_bankaccount_no = $user_data['customer_bankaccount_no'];
}
?>



<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Edit Customer</title>
	<!-- Custom fonts for this template-->

	<script src="https://kit.fontawesome.com/5861662ffd.js" crossorigin="anonymous"></script>
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/roomcss.css?v=1.4">
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



				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Edit Customer</h1>

					</div>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-success">Customer Information</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<form id="tableshow" method="post" action="customeredit.php">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<tr>
											<th>Customer ID

											<td><input type="text" size="50" name="customer_id"
													value="<?php echo $customer_id; ?>" readonly>

											</td>

											</th>
										</tr>
										<tr>
											<th>Customer Name</th>
											<td><input type="text" size="50" name="customer_name"
													value="<?php echo $customer_name; ?>" required>
											</td>
										</tr>
										<tr>
											<th>Customer Address</th>
											<td><input type="text" size="50" name="customer_address"
													value="<?php echo $customer_address; ?>" required></td>
										</tr>
										<tr>
											<th>Customer KTP No</th>
											<td><input type="text" size="50" name="customer_ktp_no"
													value="<?php echo $customer_ktp_no; ?>" required>
											</td>
										</tr>
										<tr>
											<th>Customer Phone</th>
											<td><input type="text" size="50" name="customer_phone"
													value="<?php echo $customer_phone; ?>" required>
											</td>
										</tr>
										<tr>
											<th>Customer Email</th>
											<td><input type="text" size="50" name="customer_email"
													value="<?php echo $customer_email; ?>" required>
											</td>
										</tr>
										<tr>
											<th>Customer Bank Account</th>
											<td><input type="text" size="50" name="customer_bankaccount"
													value="<?php echo $customer_bankaccount; ?>" required></td>
										</tr>
										<tr>
											<th>Customer Bank Account No</th>
											<td><input type="text" size="50" name="customer_bankaccount_no"
													value="<?php echo $customer_bankaccount_no; ?>" required></td>
										</tr>
										<tr>
											<th>Customer's Emergency Contact</th>
											<td></td>
										</tr>
										<tr>
											<th>Customer Emergency CP</th>
											<td><input type="text" size="50" name="customer_emergcp"
													value="<?php echo $customer_emergcp; ?>" required></td>
										</tr>
										<tr>
											<th>Customer Emergency CP Phone</th>
											<td><input type="text" size="50" name="customer_emergcp_phone"
													value="<?php echo $customer_emergcp_phone; ?>" required></td>
										</tr>
										<tr>
											<th>Customer Emergency CP Email</th>
											<td><input type="text" size="50" name="customer_emergcp_email"
													value="<?php echo $customer_emergcp_email; ?>" required></td>
										</tr>
										<tr>
											<th><input type="hidden" name="customer_id"
													value="<?php echo $_GET['customer_id']; ?>"></th>



											<td><a href='customeredit.php?customer_id=<?php echo $customer_id ?>'
													onclick="return confirm('Please make sure you change the right data of customer <?php echo $customer_id ?>!')">
													<button class='button button1' name="updateCustomer">Update
														Customer</button></a></td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>


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