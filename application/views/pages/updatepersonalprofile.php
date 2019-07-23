<section class = "main">
    <div class = "main-body" id = "ppd" >
      <div class = 'show-image'>
        <form action="<?php echo site_url('Pages/getImageNum');?>" method="post">
            <input type="submit" name="view" value="View My Photo"><br>
        </form>
        <form id = "ppf" method="POST" action="<?php echo site_url('Pages/uploadImage');?>" enctype="multipart/form-data">
          <img src = "<?php if(isset($imageNum)) {
            echo site_url('Pages/displayImage'); } else {
              echo "../assets/images/login.png";
            }?>">
            <input type="file" name="image">
            <input type="submit" name="submit" value="Upload"><br>
            <!-- <img src='<?php echo site_url('Pages/displayImage'); ?>' alt = 'User Photo' > -->
        </form>
      </div>
      <div id = "pp">
          <form action = "<?php echo site_url('Pages/updateInfo')?>" method = 'POST'>
            <h4>First Name</h4>
            <input type="text" name="fname" value="<?php echo $_SESSION['fname'];?>">

            <h4>Last Name</h4>
            <input type="text" name="lname" value="<?php echo $_SESSION['lname'];?>">

            <h4>User Name</h4>
            <h3 class  = 'content'><?php echo $_SESSION['uid'];?></h3>

            <h4>E-mail</h4>
            <input type="text" name="email" value="<?php echo $_SESSION['email'];?>">

              <h4>Gender</h4>
              <select name="gender">
                <option value="Prefer Not To Say">Prefer Not To Say</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>

              </select>

              <h4>Address</h4>
              <input type="text" name="address" placeholder="Your Address Here"><br><br>
              <input type="submit" name="update" value="Update">
          </form>
      </div>
      <style media="screen">
        #pp {
          max-width:  900px;
          border: 1px solid grey;
          padding: 20px;
        }
        #pp h4 {
          max-width: 800px;
          background: grey;
        }
      </style>

    </div>

</section>
		</main>
