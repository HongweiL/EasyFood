<section class = "main">
  <section class = "main-body">
    <?php
    if (isset($added)) {
      echo "<script type='text/javascript'>
        alert('".$added."');
      </script>";
    }
     ?>
    <nav class= "cuisine-category">
      <h4>CUISINE</h4>
      <h5><a href ="<?php echo site_url('Pages/view/chineseFood');?>">Chinese</a></h5>
      <h5>Chinese</h5>
      <h5>Chinese</h5>
      <h5>Chinese</h5>
      <h5>Chinese</h5>
      <h5>Chinese</h5>
      <h5>Chinese</h5>
      <h5>Chinese</h5>
      <h5>Chinese</h5>
      <h5>View All Category</h5>
    </nav>
    <article class = "activities">
      <div class ="welcome-part">
        <h4 class = "current">New Users</h4>
        <h4>Good Deals</h4>
        <h4>Reserve Seats</h4>
      </div>
      <div class = "welcome-activity">
        <div class="act">

          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade">
          <img src="<?php echo base_url();?>assets/images/activities.jpg" style="width:100%">
          </div>

          <div class="mySlides fade">
          <img src="<?php echo base_url();?>assets/images/lunch.jpg" style="width:100%">
          </div>


          <div class="mySlides fade">
          <img src="<?php echo base_url();?>assets/images/dinner.jpg" style="width:100%">
          </div>

          <div class="mySlides fade">
          <img src="<?php echo base_url();?>assets/images/food.jpg" style="width:100%">
          </div>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>



        <div class = "account">
          <?php
            if (isset($_SESSION['uid'])) {
              include "userprofile.php";
            } else {
              echo "<div>
                  <img class = 'login-img'src='".base_url()."assets/images/login.png' alt='Log in logo'>
                  <h4>G'day</h4>
                  <h5>Log in to find more<br>as a customer</h5>
                  <div class = 'button-set'>
                    <a href='".site_url('Pages/view/login')."'><button type = 'submit'>Log in</button></a>
                    <a href='".site_url('Pages/view/signup')."'><button type = 'submit'>Sign up</button></a>
                  </div></div>
                  <div>
                    <img class = 'login-img'src='".base_url()."assets/images/login.png' alt='Log in logo'>
                    <h4>G'day</h4>
                    <h5>Log in to find more <br>as a customer</h5>
                    <div class = 'button-set'>
                    <a href='".site_url('Pages/view/login')."'><button type = 'submit'>Log in</button></a>
                    <a href='".site_url('Pages/view/signup')."'><button type = 'submit'>Sign up</button></a>
                    </div>
                  </div>";
            }
           ?>
        </div>
      </div>
    </article >
  </section>
  <section class = "recommendation">
    <div class= "rec-food">

      <h5>You May Like These Food</h4>
      <h5 class = "dish">Mapo Tofu</h5>
      <h5 class = "dish">Mapo Tofu</h5>
      <h5 class = "dish">Mapo Tofu</h5>
      <h5 class = "dish">Mapo Tofu</h5>
    </div>
    <article class = "hot-ranking">
      <div class = "week-bs" class = "rank">
        <div class = "logo-name">
          <div class = "restaurant-logo">
            <img src = "<?php echo base_url();?>assets/images/hongwei.jpg" alt = "Hongwei's Restaurant Logo">
          </div>
          <div class = "name">
            <p><strong>Hongwei's <br>Restaurant</strong></p>
          </div>
        </div>
        <div>
          <h5>This Week's Best Sellor</h5>
          <h6 class = "dish"><a>Hot Deal: Mapo Tofu</a></h6>
        </div>
      </div>
      <div class = "week-bs" class = "rank">
        <div class = "logo-name">
          <div class = "restaurant-logo">
            <img src = "<?php echo base_url();?>assets/images/hongwei.jpg" alt = "Hongwei's Restaurant Logo">
          </div>
          <div class = "name">
            <p><strong>Hongwei's <br>Restaurant</strong></p>
          </div>
        </div>
        <div>
          <h5>Today's Best Sellor</h5>
          <h6 class = "dish"><a>Hot Deal: Mapo Tofu</a></h6>
        </div>
      </div>
      <div class = "week-bs" class = "rank">
        <div class = "logo-name">
          <div class = "restaurant-logo">
            <img src = "<?php echo base_url();?>assets/images/hongwei.jpg" alt = "Danyang's Restaurant Logo">
          </div>
          <div class = "name">
            <p><strong>Danyang's <br>Kitchen</strong></p>
          </div>
        </div>
        <div>
          <h5>Best Ranking</h5>
          <h6 class = "dish"><a>Hot Deal: Mapo Tofu</a></h6>
        </div>
      </div>

    </article>
    <div class= "rec-restaurant">
      <h5>You May Like These Brand</h4>
      <h5 class= "b1">KFC</h5>
      <h5 class= "b2">Peaking Duck</h5>
      <h5 class= "b3">Hongwei's Restaurant</h5>
      <h5 class= "b3">Hongwei's Restaurant</h5>
    </div>
  </section>
</section>
</main>
<script type="text/javascript" src = "<?php echo base_url();?>assets/js/js.js"></script>
