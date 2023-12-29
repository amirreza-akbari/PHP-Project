<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $usernameold=$_POST['usernameold'];
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = $filename; 

    $link=mysqli_connect("localhost","root","","robot_live");
  $sql = "UPDATE `users` SET `username`='$username',`password`='$password',`filename`='$filename' WHERE username=$usernameold";
    if ($link->query($sql) === TRUE) {
       echo "update your Account.";
       if (move_uploaded_file($tempname, $folder))  { 
        echo "PDF uploaded successfully."; 
    }else{ 
      echo  "Failed to upload PDF"; 
    } 
     } else {
       echo "error: " . $conn->error;
     }
     $link->close();
?>
<html>
  <head>
    <meta charset="UT-8" />
    <title>UPDATE</title>
        <style>
            html{
                text-align: center;
                background-color: #21D4FD;
                background-image: linear-gradient(180deg, #21D4FD 0%, #B721FF 100%);
                font-size: 30px;
            }
        </style>
  </head>
  <body>
    <div>
        <a href="javascript:history.back();">Back to admin</a>
    </div>
  </body>
</html>