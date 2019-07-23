<?php 
session_start();
$first = $_SESSION['first'];
$last = $_SESSION['last'];
$email = $_SESSION['email'];
$uid = $_SESSION['uid'];
$psw = $_SESSION['psw'];

$sql = "SELECT * FROM users WHERE uid = '$uid' OR email = '$email';";
        $result = mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {   
            $_SESSION['error'] = "Username taken or email has been taken";         
            header("Location:../error.php?error = username taken or email has been taken.");
            exit();
        } else {
            //hashing the passwowrd
            $hashedpsw = password_hash($psw, PASSWORD_DEFAULT);
            //Insert the user into the database
            $sql = "INSERT INTO users (firstname, lastname, email, 
                    uid, password) VALUES ('$first', '$last', '$email', 
                    '$uid', '$hashedpsw');";
            
            mysqli_query($con, $sql);
            session_start();
            session_unset();
            session_destroy();
            header("Location:../index.php?signup = success");
            exit();
        }
?>