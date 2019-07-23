<section class = 'main'>
  <section class = 'main-body'>

    <div class="dishes">
      <?php
      if (isset($results)) {
        if ($results) {
          foreach ($results as $result) {
            echo "<div class = 'result'><h3 >".$result->name."</h3> <a href = '".site_url('Pages/viewMore/'.$result->did)."'>View More</a> </div>";
          }
        } else {
          echo "<h1>Sorry, There is no matching result for your searching.</h1>";
        }
      } else {
        echo "<h1 class = 'result'>66 Sorry, There is no matching result for your searching.</h1>";
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
