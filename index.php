<?php
	$fullImageBackground=true;
	include ("header.php");
	include('emailUtils.php');
	$sentMail = false;
	$mailSuccess = false;
		if (isset($_POST['list']) && isset($_POST['email'])) {
			$email = $_POST['email'];
			$list = $_POST['list'];
			$message = sprintf("Add this to the email list: \n Email: %s \n List: %s\n",$email,$list);

			$to = array("cjustinsanders@gmail.com");

			$mailSuccess = generalSendMail($to, "Reader interested (automatic notification)", $message);
			$sentMail = true;
		}
		if($_POST['message']==""){
			$sentMail = false;
			$mailSuccess = false;
		}	
?>

<div class="col-md-12 text-center white">
	<img style="margin-top:10vh;max-height:300px" src="images/wh.png">
	<h2>Pre-register for the Weekly Harvest:</h2>
	<div class="col-md-8 col-md-offset-2">
		<div class="col-md-8 col-md-offset-2">
			<form class="form" method="post">
				<input class="text text-center" type="email" id="email" name="email" style="margin-bottom:5px;color:#333;" placeholder="you@host.com">
				<br>
				<input class="hidden" id="list" name="list" value="Email List">
				<button class="button btn-success">Register</button>
			</form>
		</div>
	</div>
</div>
