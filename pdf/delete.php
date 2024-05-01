<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $link = mysqli_connect("localhost", "root", "", "robot_live");

    if ($link === false) {
        die("خطا: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($link, $username);
    $databseFindRows = mysqli_query($link, "select * FROM `users` WHERE username = '$username'");
    if (mysqli_num_rows($databseFindRows) > 0) {
        $rowResult = mysqli_fetch_assoc($databseFindRows);
        if (isset($rowResult['filename']) and file_exists($rowResult['filename'])) {
            if (unlink($rowResult['filename'])) {
                echo "فایل مرتبط با $username با موفقیت از دایرکتوری حذف شد.<br />";
            } else {
                echo "خطا در حذف فایل $username از دایرکتوری.<br />";
            }
        } else {
           /* echo "فایل مرتبط با $username در دایرکتوری یافت نشد.<br />";*/
        }
    }


    $sql = "DELETE FROM `users` WHERE username = '$username'";

    if (mysqli_query($link, $sql)) {
        echo "حذف حساب کاربری شما"."<br /> <br />";


        $pdfPath = "../pdf/$username.pdf";

        if (file_exists($pdfPath)) {
            if (unlink($pdfPath)) {
                echo "<h1>فایل مرتبط با $username با موفقیت از دایرکتوری حذف شد</h1><br /><br />";
            } else {
                echo "<h1>خطا در حذف فایل $username از دایرکتوری</h1><br /><br />";
            }
        } else {
           /* echo "<h1>فایل مرتبط با $username در دایرکتوری یافت نشد</h1><br /><br />";*/
        }
    } else {
        echo "خطا در حذف اطلاعات پایگاه داده: " . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    echo "<h1>هیچ نام کاربری ارائه نشده است</h1>";
}
?>
<html>

<head>
    <meta charset="UTF-8" />
    <title>حذف کاربر</title>
    <link type="text/css" href="../css/admin.css" rel="stylesheet" />
</head>

<body>
    <div>
        <a href="javascript:history.back();">بازگشت به ادمین</a>
    </div>
</body>

</html>