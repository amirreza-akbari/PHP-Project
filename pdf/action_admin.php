<?php

// error_reporting(0); 
?> 
<?php 
  $msg = ""; 
 
  if (isset($_POST['upload'])) { 
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = $filename; 
 
        $db = mysqli_connect("localhost", "root", "", "robot_live"); 
 
        $sql = "INSERT INTO `users`(`username`, `password`, `filename`) VALUES ('$username','$password','$filename')"; 
       
        mysqli_query($db, $sql); 
     
        if (move_uploaded_file($tempname, $folder))  { 
           echo "file uploaded successfully."; 
        }else{ 
            echo "Failed to upload file"; 
      } 
  } 
  $result = mysqli_query($db, "SELECT * FROM image"); 
?>
<html>
    <head>
        <meta charset="UT-8" />
        <title>upload</title>
    </head>
        <style>
            html{
                text-align: center;
                background-color: #21D4FD;
                background-image: linear-gradient(180deg, #21D4FD 0%, #B721FF 100%);
                font-size: 30px;
            }
        </style>
    <body>
        <div>
            <a href="javascript:history.back();">Back to admin</a>
        </div>
    </body>
</html>