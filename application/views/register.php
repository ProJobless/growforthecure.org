<div class="inner">

<?php if (!isset($_GET['team'])) { ?>

<div class="login">

	<h1>Already have an account? Log in here.</h1>

	<?php
		$attributes = array('class' => 'log-in', 'id' => 'log-in');
		echo form_open('login', $attributes);
	?>

		Email Address : <?php echo form_input('emailaddress', set_value('emailaddress')); ?>
		Password: <?php echo form_input('password', set_value('password')); ?>
		<input type="submit" value="Log In" />

	</form>

</div>

<?php } ?>

<div align="center">

<?php if (!isset($_GET['team'])) { ?>
	<h1>No Account? Do your part. Become a Grower.</h1>
<?php } ?>

	<p class="sub-head">Let's just start with your basic contact information first.</p>

	<?php
	$attributes = array('class' => 'registration_form', 'id' => 'registration_form');
	
	if (isset($_GET['team'])) {
		echo form_open('register/?team=' . $_GET['team'], $attributes);
	} else {
		echo form_open('register', $attributes);
	}

	?>

	<table>
		<?php if (form_error('firstname')) { ?>
		<tr>
			<td></td>
			<td><?php echo form_error('firstname'); ?></td>
		</tr>
		<?php } ?>
		
		<tr>
			<td>First Name:</td>
			<td><?php echo form_input('firstname', set_value('firstname')); ?></td>
		</tr>
		<?php if (form_error('lastname')) { ?>
		<tr>
			<td></td>
			<td><?php echo form_error('lastname'); ?></td>
		</tr>
		<?php } ?>
		
		<tr>
			<td>Last Name:</td>
			<td><?php echo form_input('lastname', set_value('lastname')); ?></td>
		</tr>
		<?php if (form_error('email')) { ?>
		<tr>
			<td></td>
			<td><?php echo form_error('email'); ?></td>
		</tr>
		<?php } ?>		
		<tr>
			<td>Email Address:</td>
			<td><?php echo form_input('email', set_value('email')); ?></td>
		</tr>
		<?php if (form_error('password1')) { ?>
		<tr>
			<td></td>
			<td><?php echo form_error('password1'); ?></td>
		</tr>
		<?php } ?>
		<tr>
			<td>Site Password:</td>
			<td><?php echo form_input('password1', ''); ?></td>
		</tr>
		<?php if (form_error('password2')) { ?>
		<tr>
			<td></td>
			<td><?php echo form_error('password2'); ?></td>
		</tr>
		<?php } ?>		<tr>
			<td>ReType Password:</td>
			<td><?php echo form_input('password2', ''); ?></td>
		</tr>
		<?php if (isset($_GET['team'])) { ?>
		<?php echo form_hidden('secretcode', $_GET['team']); ?>
		<tr>
			<td>Team invitation code:</td>
			<td><?php echo form_input('secretcode2', $_GET['team'], 'disabled'); ?></td>
		</tr>
		<?php } ?>
	</table>


	<p class="sub-head">Now let's get to setting up your grow.</p>

	<table>
		<?php if (!isset($_GET['team'])) { ?>
		<tr>
			<td>Every Grower is a team, even if you are growing alone. Enter your team name below, or your last name will be used as a default.</td>
			<td><?php echo form_input('teamname', ''); ?></td>
		</tr>
		<?php } ?>

		<?php if (form_error('enddate')) { ?>
		<tr>
			<td></td>
			<td><?php echo form_error('enddate'); ?></td>
		</tr>
		<?php } ?>

		<tr>
			<td>When would you like your fundraiser to end:</td>
			<td><?php echo form_input('enddate', '', "id='datepicker'"); ?></td>
		</tr>

		<?php if (form_error('color')) { ?>
		<tr>
			<td></td>
			<td><?php echo form_error('color'); ?></td>
		</tr>
		<?php } ?>


		<tr>
			<td>To prove you are human :), what color is a banana?</td>
			<td><?php echo form_input('color', ''); ?></td>
		</tr>	<tr>
			<td></td>
			<td><div><input type="submit" value="Submit" /></div></td>
		</tr>
	</table>

</div>



</div>