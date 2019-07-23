<section class = "main">
  <div id = "log-sign">
  <div class = "blank">
    <img src = "images/saltyduck.jpeg" alt = "Salty Duck">
    <h2>Welcome to EasyFood!</h2>
  </div>
  <article class = "login-signup">
              <div class = "container" style ="height: 38vh;">
                  <form action="includes/createuser.inc" method="post">
                      <h5 style="font-size: 2vh">Your Password Strength</h5>
                      <?php
                          $score = $_SESSION['score'];
                          if ($score <= 3) {
                              echo "<h1 style = 'width: 100%;text-align: center; font-size: 3vh;'>WEAK</h1>";
                          }elseif ($score <= 6) {
                              echo "<h1 style = 'width: 100%;text-align: center; font-size: 3vh;'>MEDIUM</h1>";
                          } elseif ($score <= 8) {
                              echo "<h1 style = 'width: 100%;text-align: center; font-size: 3vh;'>STRONG</h1>";
                          } elseif ($score <= 10) {
                              echo "<h1 style = 'width: 100%;text-align: center; font-size: 3vh;'>VERY STRONG</h1>";
                          }
                      ?>
                      <a href="signup"
                      style = 'text-decoration: none; display: block; margin: auto; margin-top: 10vh; height: 5vh; width: 80%; font-size: 1.5vh; background: #ff9800;
                      border-radius: 3px; color: white; text-align: center; padding-top: 2vh;'>Set a stronger password</a>
                      <button type="submit" name = 'submit'
                          style = 'display: block; margin: auto; margin-top: 3vh; height: 5vh; width: 60%; font-size: 1.5vh;'>Finish Sign Up</button>
                  </form>
              </div>

  </article>
  </div>
</section>
</main>
