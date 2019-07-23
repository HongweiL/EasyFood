<?php 
session_start();
if (isset($_POST['submit'])) {
    include_once "connect.php";    
    $first = mysqli_real_escape_string($con, $_POST['fname']);
    $last = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $uid = mysqli_real_escape_string($con, $_POST['uid']);
    $psw = mysqli_real_escape_string($con, $_POST['psw']);
    $_SESSION['first'] = $first;
    $_SESSION['last'] = $last;
    $_SESSION['email'] =$email;
    $_SESSION['uid'] = $uid;
    $_SESSION['psw'] = $psw;
    // Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            $_SESSION['error'] = "First name and last name can only cntain upper and lower letters";
            header("Location:../error.php");
            exit();
        } else {       
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
            $sqli = "INSERT INTO information (uid, gender, address) VALUES ('$uid', '', '');";
            mysqli_query($con, $sql);
            header("Location:../index.php?signup = success");
            exit();
        }
         
    }
       
        


} else {
    header("Location: signup.php?signup = not submit");
    exit();
}
