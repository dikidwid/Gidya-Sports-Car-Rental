<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['user_name'])) {
	header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_password = md5($_POST['user_password']);
	$user_cpassword = md5($_POST['user_cpassword']);

	if ($user_password == $user_cpassword) {
		$sql = "SELECT * FROM user WHERE user_email='$user_email'";
		$result = mysqli_query($mysqli, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (user_name, user_email, user_password)
					VALUES ('$user_name', '$user_email', '$user_password')";
			$result = mysqli_query($mysqli, $sql);
			if ($result) {
				echo "<script>alert('Admin Registration Completed.')</script>";
				$user_name = "";
				$user_email = "";
				$_POST['user_password'] = "";
				$_POST['user_cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Went Wrong.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}

	} else {
		echo "<script>alert('Password Not Matched.')</script>";
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

	<title>faHouse - Register</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Name" name="user_name" value="<?php echo $user_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="user_email" value="<?php echo $user_email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="user_password"
					value="<?php echo $_POST['user_password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="user_cpassword"
					value="<?php echo $_POST['user_cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
		</form>
	</div>
</body>

</html>