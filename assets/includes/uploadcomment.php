<?php 
    session_start();
    include_once "connect.php";

    if (isset($_POST['submit'])) {
        $comment = $_POST['comment'];
        $uid = $_SESSION['uid'];
        $restaurant = $_POST['restaurant'];
        $sql = "INSERT INTO comment (uid, restaurant, comment) VALUES ('$uid', '$restaurant', '$comment');";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            header("Location: ../insertcomment.php?comment = fail");
            exit();
        } else {
            header("Location: ../insertcomment.php?comment = sucess");
        }
    }
?>