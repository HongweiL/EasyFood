<h3>Hi, <?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?></h3>
<ul>
    <li>chart</li>
    <li>voucher</li>
    <li><a href="<?php echo site_url('Pages/view/insertcomment');?>">write a comment</a></li>
    <li>information</li>
    <li>service</li>
    <li>favourate</li>
    <li>setting</li>
    <a href= "<?php echo site_url('Pages/getPersonalInfo');?>">Personal Profile</a>
</ul>
