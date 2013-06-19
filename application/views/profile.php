<div class="inner">

	<div class="subnav">
		<a href="<?php echo base_url(); ?>about/fundraising.php">Fundraising Hints</a>
		<a href="<?php echo base_url(); ?>about/faq">Frequently asked questions</a>
		<a href="<?php echo base_url(); ?>about/lung_cancer_facts">Lung Cancer Facts</a>
		<a href="<?php echo base_url(); ?>about/beards101">Beards 101</a>
	</div>

<br clear="all" />

<?php if (isset($sorry)) {
	echo '<p class="error">' . $sorry . '</p>';
}
?>


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
	<p class="sub-head">Change End Date.</p>
<?php if (form_error('enddate')) { ?>
	<p><?php echo form_error('enddate'); ?></p>
<?php } ?>	
	<p><?php echo form_input('enddate', $endDate, 'id="datepicker"'); ?></p>

</div>

<div class="invite-area">
	<p class="sub-head">Send an Invite.</p>
	<p>Don't grow alone! Invite a friend to help you! Enter an email address in the box below and send someone an invitation to join your team and grow campaign.</p>
	<p><input type="text" id="invitee" value=""> <a href="#" id="send-invite">Send Invitation</a></p>
	<br clear="all" />
	<p id="invite-result"></p>
</div>	


<br clear="all" />

<div class="left">
	<input type="submit" value="Update Profile" />
</div>

</form>

<br clear="all" />





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

<br clear="all" />
<br clear="all" />
<br clear="all" />

<h1>All of your current photos.</h1>

<p><a href="<?php echo base_URL(); ?>photos/<?php echo $user_id; ?>">Click here to add and remove photos.</a></p>

<div class="current-photos">
	<?php 
		if (isset($photos)) {
			foreach ($photos as $photo) {
				echo '<img src="' . base_url() . 'userphotos/' . $photo->photoImage . '" width="100px">';
			}
		}
	?>

</div>

<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />



<script>
<?php 
if (isset($styles_choices)) {
	foreach ($styles_choices as $choice) {
		echo "$('.image-row img#".$choice->StyleID."').parent().addClass('styleBG');";
	}
}
if (isset($pledges)) {
	foreach ($pledges as $pledge) {
		echo "$('.image-row img#".$pledge->styleID."').parent().addClass('pledged');";
	}
}
?>
	$("#send-invite").click(function() {
		
		invitee = $("#invitee").val();
		$.get( 
			"<?php echo base_url(); ?>teaminvite?user=<?php echo $user_id; ?>&invite="+invitee,
			function(data) {
			    $('#invite-result').html("Successfully invited " + invitee + ". Feel free to invite another friend.");
		 	}
		);
	});


</script>


</div>