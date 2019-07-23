<?php 
    include_once "includes/connect.php";
    include_once "includes/header.php";
    if (isset($_POST['submit'])) {
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        
            if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
                $_SESSION['error'] = "First name and last name can only cntain upper and lower letters";
                header("Location:../personalprofile.php?invalid first name or last name");
                exit();
            } else {
                $sql = "UPDATE users SET firstname  = '$fname', lastname = '$lname', email = '$email';";
                $var = mysqli_query($con, $sql);
                $sql1 = "SELECT * FROM information where uid = '$uid';";
                $var1 = mysqli_query($con, $sql1);
                if (mysqli_num_rows($var1) > 0) {
                    $sql2 = "UPDATE information SET gender = '$gender', address = '$address';";
                    
                } else {
                    $sql2 = "INSERT INTO information (uid, gender, address) VALUES ('$uid','$gender','$address';);";
                }
                $var2 = mysqli_query($con, $sql2);
                if (mysqli_num_rows($var) && mysqli_num_rows($var2)) {
                    header("Location:../personalprofile.php?update = sucess");
                    exit();
                } else {
                    header("Location:../personalprofile.php?update = unable to update");
                    exit();
                }
            }
        
        
    }
?>        