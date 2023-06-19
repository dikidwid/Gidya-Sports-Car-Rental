<!-- Checking Whether the admin has been login or not -->
<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['user_name'])) {
	header("Location: car-info/carinfo.php");
}

if (isset($_POST['submit'])) {
	$user_email = $_POST['user_email'];
	$user_password = md5($_POST['user_password']);

	$sql = "SELECT * FROM user WHERE user_email='$user_email' AND user_password='$user_password'";
	$result = mysqli_query($mysqli, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_name'] = $row['user_name'];
		header("Location: car-info/carinfo.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/login.css?v=1.1">

	<title>faHouse - Login</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Admin Gidya Sports Car Rental
			</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="user_email" value="<?php echo $user_email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="user_password"
					value="<?php echo $_POST['user_password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p text-align=center>Don't have an account? Contact Website Developer at support@gidya.com</p>
		</form>
	</div>
</body>

</html>