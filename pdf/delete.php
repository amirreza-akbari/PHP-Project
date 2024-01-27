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
            echo "فایل مرتبط با $username در دایرکتوری یافت نشد.<br />";
        }
    }


    $sql = "DELETE FROM `users` WHERE username = '$username'";

    if (mysqli_query($link, $sql)) {
        echo "حذف حساب کاربری شما<br />";


        $pdfPath = "../pdf/$username.pdf";

        if (file_exists($pdfPath)) {
            if (unlink($pdfPath)) {
                echo "فایل مرتبط با $username با موفقیت از دایرکتوری حذف شد<br />";
            } else {
                echo "خطا در حذف فایل $username از دایرکتوری<br />";
            }
        } else {
            echo "فایل مرتبط با $username در دایرکتوری یافت نشد.<br />";
        }
    } else {
        echo "خطا در حذف اطلاعات پایگاه داده: " . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    echo "هیچ نام کاربری ارائه نشده است.";
}
?>
<html>

<head>
    <meta charset="UTF-8" />
    <title>حذف کاربر</title>
    <style>
        html {
            text-align: center;
            background-color: #21D4FD;
            background-image: linear-gradient(180deg, #21D4FD 0%, #B721FF 100%);
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div>
        <a href="javascript:history.back();">بازگشت به ادمین</a>
    </div>
</body>

</html>