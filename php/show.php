<?php
session_start();


if (
	isset($_SESSION['user_type']) && isset($_SESSION['username']) && isset($_SESSION['password']) &&
	!empty($_SESSION['user_type']) && !empty($_SESSION['username']) && !empty($_SESSION['password'])
) {

	$user_type = $_SESSION['user_type'];
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];

	$con = mysqli_connect("localhost", "root", "", "robot_live");
	$query = "SELECT filename FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($con, $query);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$filename = $row['filename'];


		$_SESSION['username'] = $username;
		$_SESSION['filename'] = $filename;
	} else {
		echo '<script>window.alert("لطفا نام کاربری ورمزعبورا به درستی وارد کنید");window.location.href = "../index.html";</script>';
	}

	mysqli_close($con);
} else {
	echo '<script>window.alert("لطفا نام کاربری ورمزعبورا به درستی وارد کنید");window.location.href = "../index.html";</script>';
}
?>

<!DOCTYPE html>
<html lang="fa">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>دریافت کارنامه -هنرستان راهبرد</title>
	<link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="../css/font-awesome.min.css" rel="stylesheet" />
	<link type="text/css" href="../css/util.css" rel="stylesheet" />
	<link type="text/css" href="../css/style.css" rel="stylesheet" />
</head>

<body class="rtl">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../pics/02.jpeg);">
					<span class="login100-form-title-1">جهت دریافت کارنامه بر روی لینک دانلود کلیک کنید</span>
				</div>
				<br />
				<a href="../pdf/<?php echo $filename; ?>" download="<?php echo $filename; ?>" class="login100-form-btn">دانلود</a><br />
				<form action="back.php" method="post">
					<input type="hidden" name="status" value="0">
					<div class="login100-form-btn">
						<button type="submit" class="login100-form-btn" onclick="back()">خروج</button>
					</div>
				</form>
				<div id="timer" class="timer">زمان باقی‌مانده: <span id="countdown" class="timer"></span></div>
				<br />
			</div>
		</div>
	</div>
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/scripts.js"></script>
	<script src="../js/timer.js"></script>
</body>

</html>

<?php

$link = mysqli_connect("localhost", "root", "", "robot_live");

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$ip_address = $_SERVER['REMOTE_ADDR'];

$sql = "UPDATE `users` SET `username`='$username',`password`='$password',`ip_address`='$ip_address' WHERE username=$username";

if ($link->query($sql) === TRUE) {
	/*echo "yes";*/
} else {
	echo "error: " . $conn->error;
}

$link->close();
?>

<?php

$conn = new mysqli("localhost", "root", "", "robot_live");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("UPDATE `users` SET `online_status` = ? WHERE `username` = ?");
$stmt->bind_param("is", $online_status, $username);

$username = $_SESSION['username'];
$online_status = 1;

if ($stmt->execute()) {
	/*echo "yes";*/
} else {
	/*echo " ere: " . $conn->error;*/
}

$stmt->close();
$conn->close();
?>