<?php 

session_start();
	if (isset($_POST['submit'])) {
		//echo "<script>alert('OK');</script>";
		include 'connect.php';
	
		$uid = mysqli_real_escape_string($con, $_POST['uid']);
		$psw = mysqli_real_escape_string($con, $_POST['psw']);	
		$sql = "SELECT * FROM users WHERE uid = '$uid' OR email = '$uid';";
		$result = mysqli_query($con, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1 ){
			header("Location: ../login.php?login=user does not exist");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//dehash the password
				$hashedPswCheck = password_verify($psw, $row['password']);
				if ($hashedPswCheck == false) {
					header("Location: ../login.php?login=wrong password");
				} else if ($hashedPswCheck == true) {
					//Log in the user
					$uid = $row['uid'];
					$psw = $_POST['psw'];
					$_SESSION['first'] = $row['firstname'];
					$_SESSION['last'] = $row['lastname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['uid'] = $uid;
					setcookie("uid", $uid, time()+86400, "/");
					if(isset($_POST['check'] )) {
                        setcookie('psw', $psw, time()+84600, "/");
                        setcookie('check', 'true', time()+84600, "/");
					}
					
					header("Location: ../index.php?login=sucess");
					exit();
				}
			}
		}

		

	} else {
		header("Location: ../index.php?login=not submit");
		exit();
    }
    ?>