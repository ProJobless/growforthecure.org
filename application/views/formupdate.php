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

		<?php if (form_error('enddate')) { ?>
	<tr>
		<td></td>
		<td><?php echo form_error('enddate'); ?></td>
	</tr>
	<?php } ?>	
	<tr>
		<td>Change End Date:</td>
		<td><?php echo form_input('enddate', $endDate, 'id="datepicker"'); ?></td>
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

<div class="left">
	<input type="submit" value="Update Profile" />
</div>

</form>
</div>
<div class="calendar-area">


<div class="invite-area">
	<p class="sub-head">Send an Invite.</p>
	<p>Don't grow alone! Invite a friend to help you! Enter an email address in the box below and send someone an invitation to join your team and grow campaign.</p>
	<p><input type="text" id="invitee" value=""> <a href="#" id="send-invite">Click to Send Invitation</a></p>
	<br clear="all" />
	<p id="invite-result"></p>
</div>	

	<p class="sub-head" style="margin-top:40px;">Share your Grow campaign with your friends.</p>

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

<h1>Update your available grow styles.</h1>

<div class="image-row">
<?php 
	foreach ($styles as $row) {
		echo '<div class="icon"><img alt="' . $row->styleName . '" title="' . $row->styleName . '" src="'. base_url() . '/artwork/styles/'. $row->fileName . '" /></div>';
	}
 ?>
</div>






</div>