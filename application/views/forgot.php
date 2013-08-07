<div class="inner">

<?php if($reason) { ?>
<p style="color:white;padding:10px;font-size:18px;background-color:red;margin-bottom:10px;">
	<?php if ($reason == "no_email") {
		echo "You clicked the button, but didn't provide an email address!";
	} elseif ($reason == "no_user") {
		echo "The email you entered is not connected with any of our growers. Maybe you used a different email?";
	} elseif ($reason == "good_user") {
		echo "Thank you. We will send an email to that address to initiate a password reset.";
	}

	 ?>
</p>

<?php } ?>

<h1>I Forgot My Password</h1>
<p style="max-width:800px;padding-bottom:20px;">Hey, it happens. Enter your email address in the form below and we will email you (to the address provided) a link to update the password to your account.</p>



<form action="<?php echo base_url(); ?>register/send_email" method="post">
	Email address: <input type="text" name="email" value="" />
	<input type="submit" value="Forgot Password" />
</form>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />


</div>