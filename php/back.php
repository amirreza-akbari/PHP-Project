<?php
session_start();

$conn = new mysqli("localhost", "root", "", "robot_live");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("UPDATE `users` SET `online_status` = 0 WHERE `username` = ?");
$stmt->bind_param("s", $username);

$username = $_SESSION['username'];

if (isset($_POST['status']) && $_POST['status'] == 0) {
    if ($stmt->execute()) {
        header("Location: logout.php");
    } else {
        /*echo " error: " . $conn->error;*/
    }
} else {
    /*echo "error";*/
}

$stmt->close();
$conn->close();
