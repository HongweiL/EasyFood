<?php 
    include_once "connect.php";
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE uid = '$email'; ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) >0) {
            echo "<span class = 'text-danger'>This E-mail has been registered.</span>";
        } else {
            echo "<span class = 'text-success'>You can use this E-mail to sign up.</span>";
        }

    }

?>