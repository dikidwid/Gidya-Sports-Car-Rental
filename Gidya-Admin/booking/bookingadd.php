<?php

session_start();

if (!isset($_SESSION['user_name'])) {
	header("Location: ../index.php");
}

?>

<?php
include_once("../config.php");

$customerOpt = mysqli_query($mysqli, "SELECT customer_id, customer_name FROM customer ORDER BY customer_name");
$carOpt = mysqli_query($mysqli, "SELECT number_plate_id, car_type FROM car ORDER BY car_type"); ?>
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
	<link rel="stylesheet" href="../css/roomcss.css">
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
			<li class="nav-item">
				<a class="nav-link" href="../car-customer/customer.php">
					<i class="fa-solid fa-user"></i>
					<span>Customer</span></a>
			</li>

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
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
						<h1 class="h3 mb-0 text-gray-800">Booking</h1>
					</div>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-success">Add Booking Schedule</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<form id="tableshow" action="bookingadd.php" method="post">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Today's Date</th>
												<th>Customer Name</th>
												<th>Car Model</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Action</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td><input type="date" name="todaysdate"
														value="<?php echo date("Y-m-d"); ?>" readonly></td>

												<td>
													<select name="customer_id">
														<?php
                                                        $i = 0;
                                                        while ($row = mysqli_fetch_array($customerOpt)) {
                                                        ?>

														<option value="<?= $row["customer_id"]; ?>">
															<?= $row["customer_name"]; ?>
														</option>
														<?php
	                                                        $i++;
                                                        }
                                                        ?>
													</select>
												</td>

												<td>
													<select name="number_plate_id">
														<?php
                                                        $i = 0;
                                                        while ($row = mysqli_fetch_array($carOpt)) {
                                                        ?>

														<option value="<?= $row["number_plate_id"]; ?>">
															<?= $row["car_type"]; ?>
														</option>
														<?php
	                                                        $i++;
                                                        }
                                                        ?>
													</select>
												</td>

												<td><input type="date" name="book_start_date" required></td>

												<td><input type="date" name="book_end_date" required></td>

												<td><button class='button button1' name="saveBooking">Save
														Booking</button>
												</td>

											</tr>
										</tbody>
									</table>
									<?php
                                    if (isset($_POST['saveBooking'])) {
	                                    $customer_id = $_POST['customer_id'];
	                                    $number_plate_id = $_POST['number_plate_id'];
	                                    $book_start_date = $_POST['book_start_date'];
	                                    $book_end_date = $_POST['book_end_date'];
	                                    $todaysdate = $_POST['todaysdate'];

	                                    $checkAvail = mysqli_query($mysqli, "SELECT * FROM car, customer, booking WHERE
										booking.number_plate_id = '$number_plate_id' AND customer.customer_id = booking.customer_id AND
										'$book_start_date' <= book_end_date AND '$book_end_date' >= book_start_date
										AND booking.number_plate_id = car.number_plate_id");

	                                    if (mysqli_num_rows($checkAvail) > 0) {
                                    ?>
									<br>
									<div class="card bg-danger text-white col-6">
										<div class="card-body">Upsss! the <b>car</b> and <b>date</b> you selected
											already
											<b>booked by someone</b>, <br> Please select the other <b>car</b> or
											<b>date!</b> <br>
											<?php
		                                    while ($row = mysqli_fetch_array($checkAvail)) {

			                                    $carmodel = isset($row['car_type']) ? $row['car_type'] : '';
			                                    $bookedby = isset($row['customer_name']) ? $row['customer_name'] : '';
			                                    $bookstart = isset($row['book_start_date']) ? $row['book_start_date'] : '';
			                                    $bookend = isset($row['book_end_date']) ? $row['book_end_date'] : '';
                                            ?>
											<br><br>
											<b> Car Model : </b>
											<?php echo "$carmodel"; ?><br>
											<b> Booked By : </b>
											<?php echo "$bookedby"; ?><br>
											<b> Book Start Date : </b>
											<?php echo "$bookstart"; ?><br>
											<b> Book End Date : </b>
											<?php echo "$bookend"; ?><br>
										</div>
									</div>

									<?php
		                                    }
	                                    } else {
		                                    echo '<script language="javascript">
                 								window.alert("Book Success");
                 								window.location.href="booking.php";
                    							 </script>';
                                    ?>
									<?php
		                                    $insert = "INSERT INTO booking (number_plate_id, customer_id, book_start_date, book_end_date, book_transaction_date) VALUES ('$number_plate_id', '$customer_id', '$book_start_date', '$book_end_date', '$todaysdate')";

		                                    $result = mysqli_query($mysqli, $insert);

		                                    if ($result == 1) {
			                                    $ins = "INSERT INTO invoice (book_id, status) VALUES ((SELECT book_id FROM booking ORDER BY book_id DESC LIMIT 1), 'Unpaid')";
			                                    $quey = mysqli_query($mysqli, $ins);
		                                    }
	                                    }

                                    }
                                    ?>
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
		</div>
		<!-- End of Content Wrapper -->

	</div>

	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

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
</body>

</html>