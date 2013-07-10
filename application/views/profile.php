<div class="inner">

	<div class="subnav">
	<a href="<?php echo base_url() ?>about/">About</a>
	<a href="<?php echo base_url() ?>about/fundraising/">Fundraising Tips</a>
	<a href="<?php echo base_url() ?>about/faq/">Frequently asked questions</a>
	<a href="<?php echo base_url() ?>about/lung_cancer_facts/">Lung Cancer Facts</a>
	<a href="<?php echo base_url() ?>about/beards101/">Beards 101</a>
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
		<td>Change End Date:</td>
		<td><?php echo form_input('enddate', $endDate, 'id="datepicker"'); ?></td>
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
		<td><?php echo form_textarea('statement', $statement, 'cols=5'); ?></td>
	</tr>
</table>

<div class="left">
	<input type="submit" value="Update Profile" />
</div>

</form>
</div>


<div class="invite-area">
	<a href="<?php echo base_url(); ?>grower/<? echo str_replace(' ', '-', strtolower($full_name)); ?>/<? echo $user_id; ?>" class="profile-return">Return to your public profile</a>
	<br clear="all" />
	<br clear="all" />
	<p class="sub-head">Send an Invite to your friends.</p>
	<p>Don't grow alone! Invite a friend to help you! Enter an email address in the box below and send someone an invitation to join your team and grow campaign.</p>
		<br clear="all" />
	<br clear="all" />

	<p><input type="text" id="invitee" value=""> <a href="#" id="send-invite">Click to Send Invitation</a></p>
	<br clear="all" />
	<p id="invite-result"></p>
</div>	

<div class="share-area" style="margin-top:10px;">
	<p class="sub-head">Share your campaign with friends.</p>

	<?php 
	$facebookTitle = 'Grow For The Cure';
	$facebookCaption = 'Funny Hair. Serious Cause.';
	$facbookDesc = 'Help us in our fight against lung cancer.';

	$facebookTitle = str_replace(' ', '%20', $facebookTitle);
	$facebookCaption = str_replace(' ', '%20', $facebookCaption);
	$facebookDesc = str_replace(' ', '%20', $facbookDesc);

	 ?>

	<a target="_blank" href="https://www.facebook.com/dialog/feed?%20%20app_id=651258791554526&%20%20link=https://developers.facebook.com/docs/reference/dialogs/&picture=http://createdbysteve.com/growforthecure/artwork/footer-logo.png&name=<?php echo $facebookTitle; ?>&caption=<?php echo $facebookCaption; ?>&description=<?php echo $facebookDesc; ?>&redirect_uri=http://growforthecure.org/">
	  <img src="<?php echo base_url(); ?>artwork/facebook-share.png" /></a>
	<?php 
	$tweetURL = 'http://growforthecure.org/profile/' . strtolower($full_name) . '/' . $user_id . '/';
	$tweetURL = str_replace(':', '%3A', $tweetURL);
	$tweetURL = str_replace('/', '%2F', $tweetURL);
	$tweetURL = str_replace(' ', '-', $tweetURL);
	?>

	<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Flocalhost%3A8888%2Fgrowforthecure.org%2Fprofile%2Fcraig-chicchi%2F3&text=Help%20me%20in%20my%20campaign%20to%20fight%20Lung%20Cancer.%20Funny%20Hair.%20Serious%20Cause.&tw_p=tweetbutton&url=<?php echo $tweetURL; ?>&via=growforthecure1&hashtags=growforthecure" target="_blank"><img src="<?php echo base_url(); ?>artwork/twitter-share.png" /></a>
</div>


<br clear="all" />



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
		if (invitee == "") {
			// DO NOTHING
			console.log("No email in box. No email sent.")
		} else {
			$.get( 
				"<?php echo base_url(); ?>teaminvite?user=<?php echo $user_id; ?>&invite="+invitee,
				function(data) {
				    $('#invite-result').html("Successfully invited " + invitee + ". Feel free to invite another friend.");
			 	}
		);
		}
		
	});


</script>

</div>