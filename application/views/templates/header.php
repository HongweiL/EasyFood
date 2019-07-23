<html lang="en">
<head>
	<title>Easy Food</title>
	<link rel = "stylesheet"  href = "<?php echo base_url();?>assets/css/style.css" />
	<script src = "<?php echo base_url();?>assets/jquery-3.3.1.min.js"></script>
</head>





<body name = "lp">
	<main name = "mb">
		<section class = "top-search">
			<div class="top-nav">
				<?php
					if (isset($_SESSION['uid'])) {
						echo "<div class='loginfo'>
						<a href = '".site_url('Pages/logout')."'><h4>Logout</h4></a>
						<a href = '".site_url('Pages/viewChart')."' style='text-decoration: none;'><h4>My Chart</h4></a>
						<a href = 'login' style='text-decoration: none;'><h4>Support</h4></a>";
						if (isset($_SESSION['activate'])) {
							if ($_SESSION['activate'] != '-1') {
								echo "<br><a href = '".site_url('Pages/view/verify')."'style = 'color: red;'>PLEASE CHECK YOUR EMAIL TO VERIFY YOUR ACCOUNT, click to verify</a> </div>";
							} else {
								echo " </div>";
							}
						}
					} else {
						echo "<a href = '".site_url('Pages/view/login')."' style='text-decoration: none;'><h4>Log In/Sign up</h4></a>";
					}
				?>
			</div>
			<div class="main-search">
				<div>
					<a href="<?php echo site_url('Pages/view');?>"><img src = "<?php echo base_url();?>assets/images/logo.jpg" alt = "Website Logo"></a>
				</div>
				<div class= "location">
					<select id = "location">
						<option value="10">St Lucia</option>
						<option value="11">Toowong</option>
						<option value="14">Milton</option>
						<option value="17">City</option>
						<option value="10">Woolongaba</option>
						<option value="11">Garden City</option>
						<option value="14">Indooropily</option>
						<option value="17">Sunny Bank</option>
					</select>
				</div>
				<form class = "search-bar" action="<?php echo site_url('Pages/search');?>" method = 'post'>
				  <input class = "search-bar" id = 'key' type="text" name="key" placeholder="Search Food or Restaurant You Like"><button type="submit" name = 'search'>Search</button>
					<div id = 'similar'></div>


				</form>
				<script>
				 $(document).ready(function(){
				      $('#key').keyup(function(){
				           var query = $(this).val();
			                $.ajax({
			                     url:"<?php echo site_url('Pages/dishes');?>",
			                     method:"POST",
			                     data:{query:query},
			                     success:function(data)
			                     {
			                          $('#similar').fadeIn();
			                          $('#similar').html(data);
			                     }
			                });
				      });
				      $(document).on('click', 'li', function(){
				           $('#key').val($(this).text());
				           $('#similar').fadeOut();
				      });
				 });
 			 	</script>
				<style media="screen">
				#similar {
					margin-top: none;
				}
					.auto {
						margin-left: 50px;
						background: #f6f6f6;
						width: 300px;
						margin-top: none;
					}
				</style>
			</div>
		</section>
