<?php
    include_once "connect.php";
    session_start();
    if (isset($_POST['submit'])){
        $uid = $_SESSION['uid'];
        $image=addslashes (file_get_contents($_FILES['image']['tmp_name']));

        $name = addslashes($_FILES['image']['name']);
        $size = getimagesize($_FILES['image']['tmp_name']);
        if ($size == FALSE) {
            echo "That is not a image";
        } else {
            $sql = "INSERT INTO photo (uid, name, image) VALUES ('$uid', '$name', '$image');";
            if (!$result = mysqli_query($con, $sql)) {
                echo "There is a problem";
            }
            header("Location: ../personalprofilewithphoto.php?upload = sucess");
        }

    } else {
        header("Location: ../personalprofile.php?upload = fialed upload");
        exit();
    }
                
                
            

?>
