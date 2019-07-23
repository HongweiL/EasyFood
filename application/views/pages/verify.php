<section class = 'main'>
  <section class = 'main-body'>
<form class="verify" action="<?php echo site_url('Pages/verify');?>" method="post">
  <input type="text" name="code"><br>
  <input type="submit" name="submit" value="Verify">
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
</main>
