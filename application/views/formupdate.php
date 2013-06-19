<div class="inner">
	
	<div class="subnav">
		<a href="fundraising.php">Fundraising Hints</a>
		<a href="faq.php">Frequently asked questions</a>
		<a href="lung-cancer-facts.php">Lung Cancer Facts</a>
		<a href="beards101.php">Beards 101</a>
	</div>

<br clear="all" />

<h1>Edit your grower profile.</h1>

<?php
$attributes = array('class' => 'registration_form', 'id' => 'registration_form');
echo form_open('formupdate', $attributes);
?>

<?php echo form_hidden('userID', $user_id); ?>

<div class="contact-info">
<table>
<?php if (form_error('firstname')) { ?>
	<tr>
		<td></td>
		<td><?php echo form_error('firstname'); ?></td>
	</tr>
<?php } ?>	
	<tr>
		<td>First Name:</td>
		<td><?php echo form_input('firstname', $first_name); ?></td>
	</tr>
<?php if (form_error('lastname')) { ?>
	<tr>
		<td></td>
		<td><?php echo form_error('lastname'); ?></td>
	</tr>
<?php } ?>	

	<tr>
		<td>Last Name:</td>
		<td><?php echo form_input('lastname', $last_name); ?></td>
	</tr>
<?php if (form_error('email')) { ?>
	<tr>
		<td></td>
		<td><?php echo form_error('email'); ?></td>
	</tr>
<?php } ?>	

	<tr>
		<td>Email Address:</td>
		<td><?php echo form_input('email', $email); ?></td>
	</tr>
<?php if (form_error('password1')) { ?>
	<tr>
		<td></td>
		<td><?php echo form_error('password1'); ?></td>
	</tr>
<?php } ?>	
	<tr>
		<td>Set New Password:</td>
		<td><?php echo form_input('password1', ''); ?></td>
	</tr>
	<tr>
		<td>ReType Password:<?php echo form_error('password2'); ?></td>
		<td><?php echo form_input('password2', ''); ?></td>
	</tr>
	<tr>
		<td>Enter your personal Statement:<?php echo form_error('statement'); ?></td>
		<td><?php echo form_textarea('statement', $statement); ?></td>
	</tr>
</table>
</div>

<div class="calendar-area">
	<table>
<?php if (form_error('enddate')) { ?>
	<tr>
		<td colspan="2"><?php echo form_error('enddate'); ?></td>
	</tr>
<?php } ?>	
		<tr>
			<td>Change End Date:&nbsp;&nbsp;</td>
			<td><?php echo form_input('enddate', $endDate, 'id="datepicker"'); ?></td>
		</tr>

	</table>
</div>

<br clear="all" />

<div class="left">
	<input type="submit" value="Update Profile" />
</div>

<br clear="all" />
<br clear="all" />
<br clear="all" />

<h1>Update your available grow styles.</h1>

<div class="image-row">
<?php 
	foreach ($styles as $row) {
		echo '<div class="icon"><img alt="' . $row->styleName . '" title="' . $row->styleName . '" src="'. base_url() . '/artwork/styles/'. $row->fileName . '" /></div>';
	}
 ?>
</div>






</div>