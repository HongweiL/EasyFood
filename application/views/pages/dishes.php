<section class = 'main'>
  <section class = 'main-body'>
    <?php
      if (isset($result)) {
        echo "<script type='text/javascript'>
          alert('".$result."');
        </script>";
      }
      if (isset($favourate)) {
        echo "<script type='text/javascript'>
          alert('".$favourate."');
        </script>";
      }
     ?>

    <div class="dishes">
      <div>
        <h1><?php echo $detail->name;?></h1>
        <div class="thisOne">
          <div>
            <?php
              if (!$detail->image) {
                echo "<div style = 'width: 300px; height: 300px; background: lightgrey'>Image currently unavailable</div>";
              }
             ?>
          </div>
          <div class="more">
            <h3> RESTAURANT: <?php echo $detail->restaurant;?></h3>
            <h4>Category: <?php echo $detail->category;?></h4>
            <h4>VOTES: <?php echo $detail->fav; ?></h4>
            <?php
              if ($detail->avalibility) {
                echo "<h3 class = 'available'>".$detail->avalibility." Avaliable</h4><br>
                <form method = 'post' action = '".site_url('Pages/addToChart/'.$did)."'>
                <input class = 'add' type='submit' value = 'ADD TO CHART'>
                </form>
                <form method = 'post' action = '".site_url('Pages/favIt/'.$did)."'>
                <input class = 'add' type='submit' value = 'VOTE FOR IT'> </form>";
              } else {
                echo "<h3 class = 'unavailable'>Out of Stock</h4><br>
                <a href = '".site_url('Pages/view')."'>See Others</a>";
              }
             ?>
          </div>
        </div>
        <form  action="<?php echo site_url('Pages/pdf/'.$did);?>" method="post">
            <input type="submit" name="pdf" value="Generate print description">
        </form>
      </div>

    </div>
  </section>
  <style media="screen">
  .thisOne {
    display: flex;
    flex-direction: row;
    padding: 20px;
  }
  h1 {
    margin-left: 150px;
    font-size: 3vh;
    color: red;
  }
  .available {
    color: green;
  }

  .thisOne input {
    background: green;
    color: white;
    height: 5vh;
    max-width:256px;
    border: none;
    border-radius: 5px;
  }
  </style>

</section>
</main>
