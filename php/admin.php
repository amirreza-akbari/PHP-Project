<?php
session_start();


if (isset($_SESSION['user_type']) && isset($_SESSION['username']) && isset($_SESSION['password']) &&
	!empty($_SESSION['user_type']) && !empty($_SESSION['username']) && !empty($_SESSION['password'])) {

	$user_type = $_SESSION['user_type'];
    $username = $_SESSION['username'];
	$password = $_SESSION['password'];

    $con = mysqli_connect("localhost", "root", "", "robot_live");
    $query = "SELECT * FROM `admin` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "hello:".$username;
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
        <title>admin</title>
        <style>
            html{
                text-align: center;
                background-color: #21D4FD;
                background-image: linear-gradient(180deg, #21D4FD 0%, #B721FF 100%);
                font-family: Arial, sans-serif;
            }
            .a{
                font-size: 30px;
                padding: 10px 20px;
                border-radius: 20px;
                border: none;
                background-color: red;
                color: white;
                font-size: 16px;
                cursor: pointer;
            }
            input{
                border-radius: 11px;
                height: 30px;
                width: 200px;
                border: none;
            }
            .submit{
                padding: 10px 20px;
                border-radius: 20px;
                border: none;
                background-color: #9A15A2;
                color: white;
                font-size: 16px;
                cursor: pointer;
            }
            .cen {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            }

            form {
            background-color: rgba(255,255,255,0.13);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            width: 300px;
            margin: 10px; 
            text-align: left;
            }

            label, input {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            }

            h3 {
            text-align: center;
            }

            .submit {
            background: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            }

            .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('path_to_background_image.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -1;
            filter: blur(5px); 
            }

            .shape {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #007BFF, #61045F);
            clip-path: polygon(0% 0%, 100% 0%, 100% 100%);
            z-index: -1;
            }

            .a {
            font-size: 30px;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            background-color: red;
            color: white;
            font-size: 16px;
            cursor: pointer;
            }
        </style>
    </head>
        <div class="cen">
    <form action="../pdf/action_admin.php" method="post" enctype="multipart/form-data">
        <label>code:</label><input type="text" placeholder="username" name="username" />
        <label>password:</label><input type="text" placeholder="password" name="password" />
        <label>image:</label><input type="file" name="uploadfile" value="" /> 
        <button type="submit" name="upload" class="submit"> 
         UPLOAD 
        </button>
    </form>
    <form action="../pdf/update.php" method="post" enctype="multipart/form-data">
        <label>code old:</label><input type="text" placeholder="usernameold" name="usernameold" />
        <label>code:</label><input type="text" placeholder ="username"name="username" />
        <label>password:</label><input type="text" placeholder="password" name="password" />
        <label>image:</label><input type="file" name="uploadfile" value="" /> 
        <button type="submit" name="upload" class="submit"> 
        UPDATE 
        </button>
    </form>
    <form action="../pdf/delete.php" method="post" enctype="multipart/form-data">
        <label>code:</label><input type="text" placeholder="username" name="username" />
        <button type="submit" class="submit"> 
         DELETE 
        </button> 
       </form>
        </div>
       <a href="logout.php" class="a">logout</a>
       <h1>users</h1>
    </body>
</html>
<?php

$conesen=mysqli_connect("localhost","root","","robot_live");
$pas=mysqli_query($conesen,"SELECT * FROM users");
while($row=mysqli_fetch_assoc($pas))
{
   echo $row["username"].":username"."<br>";
   echo $row["password"].":password"."<br>";
   echo $row['filename'].":filename"."<br />"."<hr />";
}
mysqli_close($conesen);

?>