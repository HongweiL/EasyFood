<section class = 'main'>
  <section class = 'main-body'>
    <?php
      if (isset($remove)) {
        echo "<script type='text/javascript'>
          alert('".$remove."');
        </script>";
      }
     ?>
    <div class="dishes">
      <?php
      if (isset($items)) {
        if ($items) {
          foreach ($items as $result) {
            echo "<div class = 'result'><h3 >".$result->dishname."--------------------</h3><h3 >Price:".$result->price."</h3> <a href = '".site_url('Pages/removeFromChart/'.$result->did)."'>Remove</a> </div>";
          }
        } else {
          echo "<h1>Sorry, You currently have no result in chart.</h1>";
        }
      } else {
        echo "<h1 class = 'result'>Sorry, You currently have no result in chart.</h1>";
      }

      ?>

      <style media="screen">
      .result {
        margin: 15px;
        display: flex;
        flex-direction: row;
        border: 1px solid orange;
        border-radius: 10px;
        padding: 10px;
      }
      .result a {
        margin-top: 20px;
        margin-left: 30px;
        text-align: center;
      }

      </style>

    </div>

    </div>
  </section>

</section>
</main>
