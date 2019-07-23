<?php
session_start();
        include_once "connect.php";  
          $uid = $_SESSION['uid'];
          $sql = "SELECT * FROM photo WHERE uid='$uid'";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_assoc($result);        
          header("Content-type: image/jpeg");
          echo $row['image'];        
                
            

?>
