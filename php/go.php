<?php
session_start();

if (
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password'])
) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "robot_live");

    $queryAdmin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $resultAdmin = mysqli_query($con, $queryAdmin);

    if (mysqli_num_rows($resultAdmin) > 0) {

        $rowAdmin = mysqli_fetch_assoc($resultAdmin);

        $_SESSION['user_type'] = 'admin';
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;


        header("Location: admin.php");
    } else {
        $queryUser = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $resultUser = mysqli_query($con, $queryUser);

        if (mysqli_num_rows($resultUser) > 0) {

            $rowUser = mysqli_fetch_assoc($resultUser);

            $_SESSION['user_type'] = 'user';
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            header("Location: show.php");
        } else {
            echo '<script>window.alert("لطفا نام کاربری ورمزعبورا به درستی وارد کنید");window.location.href = "../index.html";</script>';
        }
    }

    mysqli_close($con);
} else {
    echo '<script>window.alert("لطفا نام کاربری ورمزعبورا به درستی وارد کنید");window.location.href = "../index.html";</script>';
}
