<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1" />
    <title>کاربران آنلاین سایت</title>
    <link type="text/css" href="../css/admin.css" rel="stylesheet" />
</head>
<body>
    <h1>نمایش کاربران آنلاین</h1>
    <br />
    <div>
      <!--  <a href="admin.php" class="offline">بازگشت</a><br /><br />-->
    </div>
</body>
</html>
<?php

$host = 'localhost';
$dbname = 'robot_live';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM users WHERE online_status = 1";
    $stmt = $pdo->query($query);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['username'] . ":نام کاربری" . "<br>";
        echo $row['password'] . ":رمزعبور" . "<br>";
        echo $row['filename'] . ":فایل" . "<br />";
        echo $row['online_status'] . ":وضعیت آنلاین" . "<br />";
        echo $row['ip_address'] . ":IP" . "<br />" . "<hr />";
    }

    $pdo = null;
} catch (PDOException $e) {
    die("خطا: " . $e->getMessage());
}
?>  <!--javascript:history.back();-->