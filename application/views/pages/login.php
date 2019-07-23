<section class = "main" name = "mblp" onload = "checkCookie()">
  <div id = "log-sign" name = "lf">
    <div class = "blank">
      <img src = "<?php echo base_url();?>assets/images/saltyduck.jpeg" alt = "Salty Duck">
      <h2>Welcome to EasyFood!</h2>
    </div>
    <article class = "login-signup">
    <form name="login" action = "<?php echo site_url('Pages/login');?>" method = "POST">
      <div class = "container" name = "formDis">
        <?php
          if (isset($_COOKIE['uid'] )) {
            echo "<label>User Name:</label><input type='text'  name='uid' id = 'uid' value = ".$_COOKIE['uid']." required> ";
          } else {
            echo "<label>User Name:</label><input type='text'  name='uid' id = 'uid' placeholder = 'User Name' required> ";
          }
          if (isset($_COOKIE['psw'])) {
            echo "Password:<input type='password' name='psw' id = 'psw' value = ".$_COOKIE['psw']." required>";
          } else {
            echo "Password:<input type='password' name='psw' id = 'psw' required>";
          }
          if (isset($_COOKIE['check'])) {
            echo "<input type='checkbox' name='check'  checked>Remember me ";
          } else {
            echo "<input type='checkbox' name='check' />Remember me";
          }

        ?>
        <style>
        .container label {
          margin-top: 10px;

        }

        </style>

        <input class = 'submitbutton' type = 'submit' name = "submit" value = "Log in">
        <a href="<?php echo site_url('Pages/view/verifysecur');?>">Forget Password</a>
        <a href="<?php echo site_url('Pages/view/signup');?>">Sign Up</a>
      </div>
    </form>
    <article class = "login-signup">
  </div>
</section>
</main>
