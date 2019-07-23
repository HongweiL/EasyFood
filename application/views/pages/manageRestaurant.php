<section class = 'main'>
  <section class = 'main-body'>

<form class="verify" action="<?php echo site_url('Pages/addDish');?>" method="post">
  <label for="restaurant">RESTAURANT</label>
  <select name="restaurant">
      <option value='hongwei'>Hongwei's Restaurant</option>
      <option value="danyang">Danyang's Kitchen</option>
      <option value="kfc">KFC</option>
      <option value="hungury-jacks">Hungury Jacks</option>
  </select><br>
  <label for="category">CATEGORY</label>
  <select name="category">
      <option value='CHN'>Chinese</option>
      <option value="JP">Japanese</option>
  </select><br>
  <input type="text" name="name"><br>
  <input type="number" name="price" placeholder="Price">
  <input type="number" name="avaliable" placeholder="Avaliable">
  <input type="submit" name="submit" value="Add">
</form>
<style media="screen">
  verify {
    width: 90%;
    display: block;
    margin: auto;
    border-radius: 10px;
    border: 1px solid grey;
  }
  input {
    display: block;
    margin: auto;
  }
</style>


</section>
</section>
</main>
