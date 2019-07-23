<?php
  if (isset($answer)) {
    echo "<script type='text/javascript'>
      alert('".$answer."');
    </script>";
  }
 ?>
<section class = 'main'>
  <section class = 'main-body'>
    <form class="dishes" action = '<?php echo site_url('Pages/checkAnswer')?>' method="post">
      <div class="getuid">
        <input type="text" name="uid" placeholder="User Name or Email Address">
      </div>
      <h2>Security Questions</h2>
      <div>
        <h3>PLEASE SELECT THE FIRST QUESTION</h3><br>
        <div>
          <select class="question1" name="q1">
            <option value="addr">What is your current address?</option>
            <option value="city">What is your born city?</option>
            <option value="middleName">What is your middle name?</option>
          </select>
          <input type="text" name="a1" placeholder="Your Answer Here">
        </div>

      </div>
      <div>
        <h3>PLEASE SELECT THE FIRST QUESTION</h3><br>
        <div>
          <select class="question2" name="q2">
            <option value="pet">What is the name of your pet?</option>
            <option value="mother">What is the name of your mother?</option>
            <option value="father">What is the name of your father?</option>
          </select>
          <input type="text" name="a2" placeholder="Your Answer Here">
        </div>

      </div>
      <div class = 'ab'>
        <input type="submit" name="submit" value="Submit">
      </div>
    </form>
  </section>

</section>
</main>
