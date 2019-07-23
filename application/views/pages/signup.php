
			<?php
				if (isset($result)) {
					echo "<script type='text/javascript'>
	 			 		alert('".$result."');
	 			 </script>";
				}

			 ?>
			<script src="<?php echo base_url();?>assets/jquery-3.3.1.min.js"></script>
			<section class = "main">
				<div id = "log-sign">
				<div class = "blank">
					<img src = "<?php echo base_url();?>assets/images/saltyduck.jpeg" alt = "Salty Duck">
					<h2>Welcome to EasyFood!</h2>
				</div>
				<article class = "login-signup">
					 <form role="form" method="post" action="<?php echo site_url('Pages/insertUser');?>">
						<div class="container">
						    <label for="uid"><b>User Name</b></label>
							<input type="text" maxlength= 10 placeholder="User Name" name="uid" id = 'uid' required>
							<span id = 'avalibilityun'></span>
							<label for="fname"><b>First Name</b></label>
                            <input type="text" placeholder="First Name" name="fname" required>
                            <label for="lname"><b>Last Name</b></label>
							<input type="text" placeholder="Last Name" name="lname" required>
							<label for="email"><b>Email</b></label>
							<input type="email" placeholder="Enter Email Address" name="email" id = 'email' required>
							<span id = 'avalibilitye'></span>
							<label for="psw"><b>Password</b></label>

							<input id = 'signpw' type='password' maxlength=10 placeholder='Enter Password' name='psw' required>
							<div id ='getstrength' style='width: 40%; height: 2vh;' name = 'strength'></div>
							<input class = 'submitbutton' type = 'submit' name = "submit" value = "Sign up">
                        </div>
						<script>
						$(document).ready(function() {
							$('#uid').blur(function() {
								var uid = $(this).val();
								$.ajax({
									url: "<?php echo site_url('Pages/checkexistun');?>",
									method: "POST",
									data: {username:uid},
									dataType: "text",
									success: function(html) {
										$('#avalibilityun').html(html);
									}
								});
							});
							$('#email').blur(function() {
								var emailAddr = $(this).val();
								$.ajax({
									url: "<?php echo site_url('Pages/checkexiste');?>",
									method: "POST",
									data: {email:emailAddr},
									dataType: "text",
									success: function(html) {
										$('#avalibilitye').html(html);
									}
								});
							});
						});
						</script>
						<style>
						.text-danger {
							color: red;
						}
						.text-success {
							color: green;
						}
						#getstrength {
							color: red;
						}
						</style>




					</form>
				</article>
				</div>
			</section>
		</main>
		<script type="text/javascript" src = "<?php echo base_url();?>assets/js/pswstr.js"></script>
