<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $usernameold = $_POST['usernameold'];
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = $filename;

  $link = mysqli_connect("localhost", "root", "", "robot_live");
  $sql = "UPDATE `users` SET `username`='$username',`password`='$password',`filename`='$filename' WHERE username=$usernameold";

  if ($link->query($sql) === TRUE) {
    echo "<h1>حساب کاربری شما بروز شد</h1>"."<br /><br /> ";

    if (move_uploaded_file($tempname, $folder)) {
      echo "<h1>فایل  با موفقیت آپلود شد</h1>"."<br /><br /> ";
    } else {
      echo  "<h1>آپلود ناموفق بود</h1>"."<br /><br /> ";
    }
  } else {
    echo "خطا: " . $conn->error;
  }

  $link->close();
?>
<html>

<head>
  <meta charset="UTF-8" />
  <title>به‌روزرسانی</title>
  <link type="text/css" href="../css/admin.css" rel="stylesheet" />
</head>

<body>
  <div>
    <a href="javascript:history.back();">بازگشت به ادمین</a>
  </div>
</body>

</html>