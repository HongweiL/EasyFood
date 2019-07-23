<section class = "main">
    <div class = "main-body" id = "ppd" >
      <div class = 'show-image'>
        <form action="<?php echo site_url('Pages/getImageNum');?>" method="post">
            <input type="submit" name="view" value="View My Photo"><br>
        </form>
        <form id = "ppf" method="POST" action="<?php echo site_url('Pages/uploadImage');?>" enctype="multipart/form-data">
          <img src = "<?php if(isset($imageNum)) {
            echo site_url('Pages/displayImage');
          } else {
            echo "../../assets/images/login.png";
          }?>">
            <input type="file" name="image">
            <input type="submit" name="submit" value="Upload"><br>
            <!-- <img src='<?php echo site_url('Pages/displayImage'); ?>' alt = 'User Photo' > -->
        </form>
      </div>
      <div id = "pp">
          <form action = "<?php echo site_url('updatepersonalprofile');?>" method = 'POST'>
            <h4>First Name</h4>
            <h3><?php echo $accountInfo->firstname;?></h3>

            <h4>Last Name</h4>
            <h3 class  = 'content'><?php echo $accountInfo->lastname;?></h3>

            <h4>User Name</h4>
            <h3 class  = 'content'><?php echo $accountInfo->uid;?></h3>

            <h4>E-mail</h4>
            <h3 class  = 'content'><?php echo $accountInfo->email;?></h3>

            <h4>Verify Status</h4>
            <h3 class  = 'content'><?php if ($accountInfo->activate == -1) {echo "VERIFIED";} else {
              echo "NOT YET VERIFIED";
            }?></h3>

              <h4>Gender</h4>
              <h3 class  = 'content'><?php echo $info->gender;?></h3>

              <h4>Address</h4>
              <h3 class  = 'content'><?php echo $info->address;?></h3>
              <input type="submit" name="update" value="Update">
          </form>
      </div>

    </div>

</section>
		</main>
