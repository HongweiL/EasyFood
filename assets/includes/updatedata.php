<?php 
include_once "connect.php";
session_start();
$uid = $_SESSION['uid'];
    if (isset($_POST['updfname'])) {
        $fname = $_POST['fname'];
        $sql = "UPDATE users SET firstname = '$fname' WHERE uid = '$uid';";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            header("Location: ../personalprofile.php");
            exit();
        } else {
            header("Location: ../update.php?update=failed");
            exit();
        } 
    } elseif (isset($_POST['updlname'])) {
        $lname = $_POST['lname'];
        $sql = "UPDATE users SET lastname = '$lname' WHERE uid = '$uid';";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            header("Location: ../personalprofile.php");
            exit();
        } else {
            header("Location: ../update.php?update=failed");
            exit();
        } 
    } elseif (isset($_POST['updemail')])) {
        $email = $_POST['email'];
        $sql = "UPDATE users SET email = '$email' WHERE uid = '$uid';";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            header("Location: ../personalprofile.php");
            exit();
        } else {
            header("Location: ../update.php?update=failed");
            exit();
        } 
    } elseif (isset($_POST['updgender'])) {
        $gender = $_POST['gender'];        
        $sql = "UPDATE information SET gender = '$gender' WHERE uid = '$uid';";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            header("Location: ../personalprofile.php");
            exit();
        } else {
            header("Location: ../update.php?update=failed");
            exit();
        } 
    } elseif (isset($_POST['updaddr'])) {
        $addr = $_POST['addr'];        
        $sql = "UPDATE information SET address = '$addr' WHERE uid = '$uid';";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            header("Location: ../personalprofile.php");
            exit();
        } else {
            header("Location: ../update.php?update=failed");
            exit();
        } 
    }


?>