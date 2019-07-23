<section class = "main">
    <div class = "comment">

        <form action="<?php echo site_url('Pages/uploadComment');?>" method="post">
            <label for="restaurant">Please Choose the Restaurant you want to comment</label>
            <select name="restaurant">
                <option value='hongwei'>Hongwei's Restaurant</option>
                <option value="danyang">Danyang's Kitchen</option>
                <option value="kfc">KFC</option>
                <option value="hungury-jacks">Hungury Jacks</option>
            </select><br>
            <textarea name = "comment" rows = "10" cols = "128">Your text here</textarea><br>
            <input type="submit" name="submit" value = "submit"  style ="margin: 2vh;"/><br>


        </form>
      </div>
        <br>
        <div class="view-comments">
          <a href="<?php echo site_url('Pages/getComments')?>">View My Comments</a>
          <?php
          if(isset($comments))
          foreach($comments as $row){
            echo "
              <div class = 'myComment'>
                <h4>$row->restaurant</h4>
                <p>$row->comment</p>
              </div>
            ";
          }
           ?>
        </div>
</section>
