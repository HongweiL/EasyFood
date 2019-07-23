<section class = "main">
  <div id = "log-sign">
  <div class = "blank">
    <img src = "images/saltyduck.jpeg" alt = "Salty Duck">
    <h2>Welcome to EasyFood!</h2>
  </div>
  <article class = "login-signup">
              <div class = "container" style ="height: 38vh;">
                  <form action="signup" method="post">
                      <h5 style="font-size: 2vh">Sorry, Unable to sign up</h5>
                      <?php
          echo "<h3>".$_SESSION['error']."</h3>";
          if ($_SESSION['error'] == "Weak Password.") {
            echo "<h3>Password Must Contain Both Letters and Numbers";
          }
                      ?>
                      <button type="submit" name = 'submit' style = 'display: block; margin: auto; margin-top: 10vh; height: 5vh; width: 60%;'>OK</button>
                  </form>
              </div>

  </article>
  </div>
</section>
</main>
