<div class="inner">

<h1>Already have an account? Log in here.</h1>

<div class="login">

<?php
	$attributes = array('class' => 'log-in', 'id' => 'log-in');
	echo form_open('login', $attributes);
?>

	Email Address : <?php echo form_input('emailaddress', set_value('emailaddress')); ?>
	Password: <?php echo form_input('password', set_value('password')); ?>
	<input type="submit" value="Log In" />

</form>

</div>

<h1>No Account? Do your part. Become a Grower.</h1>

<p class="sub-head">Let's just start with your basic contact information first.</p>

<?php
$attributes = array('class' => 'registration_form', 'id' => 'registration_form');
echo form_open('register', $attributes);
?>

<table>
	<tr>
		<td>First Name:<?php echo form_error('firstname'); ?></td>
		<td><?php echo form_input('firstname', set_value('firstname')); ?></td>
	</tr>
	<tr>
		<td>Last Name:<?php echo form_error('lastname'); ?></td>
		<td><?php echo form_input('lastname', set_value('lastname')); ?></td>
	</tr>
	<tr>
		<td>Email Address:<?php echo form_error('email'); ?></td>
		<td><?php echo form_input('email', set_value('email')); ?></td>
	</tr>
	<tr>
		<td>Site Password:<?php echo form_error('password1'); ?></td>
		<td><?php echo form_input('password1', ''); ?></td>
	</tr>
	<tr>
		<td>ReType Password:<?php echo form_error('password2'); ?></td>
		<td><?php echo form_input('password2', ''); ?></td>
	</tr>
	<tr>
		<td>If you have been invited to join a team, enter your team secret code here:</td>
		<td><?php echo form_input('secretcode', ''); ?></td>
	</tr>
</table>


<p class="sub-head">Now let's get to setting up your grow.</p>

<table>
	<tr>
		<td>If starting a new team, what is your team name. If you have entered an invitation code above, you can ignore this:</td>
		<td><?php echo form_input('teamname', ''); ?></td>
	</tr>
	<tr>
		<td>When would you like your fundraiser to end:<?php echo form_error('enddate'); ?></td>
		<td><?php echo form_input('enddate', ''); ?></td>
	</tr>
	<tr>
		<td>To prove you are human :), what color is a banana?<?php echo form_error('color'); ?></td>
		<td><?php echo form_input('color', ''); ?></td>
	</tr>	<tr>
		<td></td>
		<td><div><input type="submit" value="Submit" /></div></td>
	</tr>
</table>

</div>