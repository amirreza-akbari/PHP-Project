<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $link = mysqli_connect("localhost", "root", "", "robot_live");
    
    if ($link === false) {
        die("Error: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($link, $username);
    $databseFindRows=mysqli_query($link,"select * FROM `users` WHERE username = '$username'");
    if (mysqli_num_rows($databseFindRows) > 0) {
        $rowResult = mysqli_fetch_assoc($databseFindRows);
        if (isset($rowResult['filename']) and file_exists($rowResult['filename'])) {
            if (unlink($rowResult['filename'])) {
                echo "file related to $username removed from the directory successfully.<br />";
            } else {
                echo "Error deleting file $username from the directory.<br />";
            }
        } else {
            echo "file related to $username not found in the directory.<br />";
        }
      

    } 
    
  
    $sql = "DELETE FROM `users` WHERE username = '$username'";

    if (mysqli_query($link, $sql)) {
        echo "Delete your Account.<br />";

       
        $pdfPath = "../pdf/$username.pdf"; 

        if (file_exists($pdfPath)) {
            if (unlink($pdfPath)) {
                echo "file related to $username removed from the directory successfully.<br />";
            } else {
                echo "Error deleting file $username from the directory.<br />";
            }
        } else {
            echo "file related to $username not found in the directory.<br />";
        }
    } else {
        echo "Error in deleting database data: " . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    echo "No username provided.";
}
?>
<html>
     <head>
          <meta charset="UTF-8" />
          <title>Deleted</title>
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
