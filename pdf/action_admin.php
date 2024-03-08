 <?php
    $msg = "";

    if (isset($_POST['upload'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = $filename;

        $db = mysqli_connect("localhost", "root", "", "robot_live");

        $sql = "INSERT INTO `users`(`username`, `password`, `filename`) VALUES ('$username','$password','$filename')";

        mysqli_query($db, $sql);

        if (move_uploaded_file($tempname, $folder)) {
            echo "<h1>اطاعات کاربر با موفقیت درج شد</h1>" . "<br /><br />";
        } else {
            echo "<h1>خطا،ایجاد کاربر انجام نشد</h1>" . "<br /><br />";
        }
    }
    $result = mysqli_query($db, "SELECT * FROM image");
    ?>
 <html>

 <head>
     <meta charset="UT-8" />
     <title>ایجاد کاربر</title>
     <link type="text/css" href="../css/admin.css" rel="stylesheet" />
 </head>

 <body>
     <div>
         <a href="javascript:history.back();">بازگشت به ادمین</a>
     </div>
 </body>

 </html>