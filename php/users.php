<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کاربران سایت</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
    <br />
    <div class="content">
        <input type="text" id="searchInput" class="search" placeholder="...جستجو">
        <div id="usersList">
            <h1>نمایش کاربران سایت</h1>
            <div>
                <br />
                <!--<a href="admin.php" class="offline">بازگشت</a><br><br>-->
            </div>
            <?php
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "robot_live";


            $conn = mysqli_connect($hostname, $username, $password, $database);


            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }


            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);


            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="user" data-username="' . $row["username"] . '" data-password="' . $row["password"] . '" data-filename="' . $row['filename'] . '" data-ip="' . $row['ip_address'] . '">';
                echo $row["username"] . ": نام کاربری<br>";
                echo $row["password"] . ": رمزعبور<br>";
                echo $row['filename'] . ": فایل<br>";
                echo $row['ip_address'] . ": IP<br>" . "<hr>";
                echo '</div>';
            }


            mysqli_close($conn);
            ?>
        </div>
    </div>

    <script>
        var searchInput = document.getElementById('searchInput');
        var searchButton = document.getElementById('searchButton');
        var usersList = document.getElementById('usersList');

        function performSearch() {
            var searchText = searchInput.value.trim().toLowerCase();
            var users = usersList.getElementsByClassName('user');

            Array.from(users).forEach(function(user) {
                var username = user.getAttribute('data-username').toLowerCase();
                var password = user.getAttribute('data-password').toLowerCase();
                var filename = user.getAttribute('data-filename').toLowerCase();
                var ipAddress = user.getAttribute('data-ip').toLowerCase();

                if (
                    username.includes(searchText) ||
                    password.includes(searchText) ||
                    filename.includes(searchText) ||
                    ipAddress.includes(searchText)
                ) {
                    user.style.display = 'block';
                } else {
                    user.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', performSearch);
        searchButton.addEventListener('click', performSearch);
    </script>
</body>

</html>