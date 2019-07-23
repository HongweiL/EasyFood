<section class = "main">
    <div class = "main-body" id = "ppd" >
        <form id = "ppf" method="POST" action="includes/uploaddata" enctype="multipart/form-data">
            <?php
                $uid = $_SESSION['uid'];
                $sql = "SELECT * FROM photo WHERE uid = '$uid';";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result)) {
                    echo "<img src='includes/getimage' />";
                } else {
                    echo "<img src='images/login.png' alt='user photo'>";
                }
            ?>

            <input type="file" name="image">
            <input type="submit" name="submit" value="Upload">
        </form>



        <div id = "pp">
            <form action = "update" method = 'POST'>
                <?php
                    $uid = $_SESSION['uid'];
                    $sql = "SELECT * FROM users WHERE uid = '$uid';";
                    $sqli = "SELECT * FROM information WHERE uid = '$uid';";
                    $infor = mysqli_query($con, $sqli);
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $info = mysqli_fetch_assoc($infor);
                    if ($info['gender'] == null) {
                        $gender = 'Prefer not to Say';
                    } else {
                        $gender = $info['gender'];
                    }
                    if ($info['address'] == null) {
                        $addr = 'Not Adding';
                    } else {
                        $addr = $info['address'];
                    }
                    if (isset($_POST['upname'])) {
                        echo "<form action = 'includes/updatedata' method = 'POST'>
                        <label>First Name: </label><input type ='text' name = 'fname' value = ".$row['firstname']."><input type = 'submit' name = 'updfname' value = 'save'><br>
                        <label>Last Name: </label><input type ='text' name = 'fname' value = ".$row['lastname']."><input type = 'submit' name = 'updlname' value = 'save'><br>
                        </form>";
                    } else {
                        echo "<label>Name: </label><h3>".$row['firstname']." ".$row['lastname']."</h3><input type = 'submit' name = 'upname' value = 'update'><br>";
                    }
                    if (isset($_POST['upgender'])) {
                        echo "<form action = 'includes/updatedata' method = 'POST'>";
                        echo "<label>Gender: </label><input type = 'text' name = 'gender' value= ".$gender."><input type = 'submit' name = 'updgender' value = 'save'><br>";
                        echo "</form>";
                    } else {
                        echo "<label>Gender: </label><h3>".$gender."</h3><input type = 'submit' name = 'upgender' value = 'update'><br>";
                    }

                    echo "<label>User Name: </label><h3>".$row['uid']."</h3><br>";
                    if (isset($_POST['upemail'])) {
                        echo "<form action = 'includes/updatedata' method = 'POST'>";
                        echo "<label>E-mail: </label><input type = 'text' name = 'email' value = ".$row['email']."><input type = 'submit' name = 'updemail' value = 'save'><br>";
                        echo "</form>";
                    } else {
                        echo "<label>E-mail: </label><h3>".$row['email']."</h3><input type = 'submit' name = 'upemail' value = 'update'><br>";
                    }
                    echo "<label class = 'rating'> Rating: </label><h3>5.0</h3><br>";
                    if (isset($_POST['upaddr'])) {
                        echo "<form action = 'includes/updatedata' method = 'POST'>";
                        echo "<label>Address: </label><input type = 'text' name = 'addr' value =".$addr."><input type = 'submit' name = 'updaddr' value = 'save'><br>";
                        echo "</form>";
                    } else {
                        echo "<label>Address: </label><h3>Not Adding</h3><input type = 'submit' name = 'upaddr' value = 'update'><br>";

                    }
                ?>

            </form>
        </div>
    </div>

</section>
		</main>
