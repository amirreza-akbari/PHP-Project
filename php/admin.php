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
    $query = "SELECT * FROM `admin` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "خوش آمدید مدیرگرامی:" . $username;
    } else {
        echo '<script>window.alert("لطفا نام کاربری ورمزعبورا به درستی وارد کنید");window.location.href = "../index.html";</script>';
    }

    mysqli_close($con);
} else {
    echo '<script>window.alert("لطفا نام کاربری ورمزعبورا به درستی وارد کنید");window.location.href = "../index.html";</script>';
}
?>
<html>

<head>
    <meta charset="UT-8" />
    <title>پنل ادمین</title>
    <link type="text/css" rel="stylesheet" href="../css/admin.css" />
</head>

<body>
    <div class="right">
    <a href="logout.php" class="offline">خروج</a>
    <a href="online.php" class="online" target="_blank">نمایش کاربران آنلاین</a>
    <a href="users.php"class="users" target="_blank">کاربران سایت</a>
    </div>
    <div class="cen">
        <form action="../pdf/action_admin.php" method="post" enctype="multipart/form-data">
            <label>:نام کاربری</label><input type="text" placeholder="نام کاربری را وارد کنید" name="username" />
            <label>:رمزعبور</label><input type="text" placeholder="رمزعبور را وارد کنید" name="password" />
            <label>:فایل</label><input type="file" name="uploadfile" value="" />
            <button type="submit" name="upload" class="submit">
                ایجاد کاربر
            </button>
        </form>
        <form action="../pdf/update.php" method="post" enctype="multipart/form-data">
            <label>:نام کاربری فعلی</label><input type="text" placeholder="نام فعلی کاربر را وارد کنید" name="usernameold" />
            <label>:نام کاربری جدید</label><input type="text" placeholder="نام کاربری جدید را وارد کنید" name="username" />
            <label>:رمزعبور</label><input type="text" placeholder="رمزعبور را وارد کنید" name="password" />
            <label>:فایل</label><input type="file" name="uploadfile" value="" />
            <button type="submit" name="upload" class="submit">
                ویرایش کاربر
            </button>
        </form>
        <form action="../pdf/delete.php" method="post" enctype="multipart/form-data">
            <label>:نام کاربری</label><input type="text" placeholder="نام کاربری را وارد کنید" name="username" />
            <button type="submit" class="submit">
                حذف کاربر
            </button>
        </form>
    </div>
    <script src="../js/admin.js"></script>
</body>

</html>
