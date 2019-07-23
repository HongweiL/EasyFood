<?php 
    include_once "connect.php";
    if(isset($_POST['username'])) {
        $uid = $_POST['username'];
        $sql = "SELECT * FROM users WHERE uid = '$uid'; ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) >0) {
            echo "<span class = 'text-danger'>This username has been used</span>";
        } else {
            echo "<span class = 'text-success'>This username is available now.</span>";
        }

    }

?>