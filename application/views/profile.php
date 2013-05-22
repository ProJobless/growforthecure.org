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
<?php echo form_hidden('campaignID', $campaign_id); ?>

<div class="contact-info">
<table>
	<tr>
		<td>First Name:<?php echo form_error('firstname'); ?></td>
		<td><?php echo form_input('firstname', $first_name); ?></td>
	</tr>
	<tr>
		<td>Last Name:<?php echo form_error('lastname'); ?></td>
		<td><?php echo form_input('lastname', $last_name); ?></td>
	</tr>
	<tr>
		<td>Email Address:<?php echo form_error('email'); ?></td>
		<td><?php echo form_input('email', $email); ?></td>
	</tr>
	<tr>
		<td>Set New Password:<?php echo form_error('password1'); ?></td>
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
	Change End Date:<br /><br />
	<?php echo form_input('enddate', $endDate); ?><br /><br />
	<img src="http://placehold.it/345x300&text=Calendar">
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
		echo '<div class="icon"><img id="' . $row->styleID . '" alt="' . $row->styleName . '" title="' . $row->styleName . '" src="' . base_url() .'artwork/styles/'. $row->fileName . '" /></div>';
	}
 ?>
</div>

<script>
<?php 
foreach ($styles_choices as $choice) {
	echo "$('.image-row img#".$choice->styleID."').parent().addClass('styleBG');";
}
?>
</script>
		
<br clear="all" />
<br clear="all" />






</div>