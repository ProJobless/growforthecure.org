<div class="inner">

<h1><?php echo $full_name; ?> - Member of Team <?php echo $team_name ?></h1>
<div class="social-like-bar">
	facebook, twitter, linkdin, google+
</div>

<div class="grow-status">
	The Grow is over!
</div>

<br clear="all" />

<div class="sidebar">
<?php 
	if ($profile_pic) {
		$photo = '<img src="/userphotos/' . $profile_pic . '" width="200px" />';
	} else {
		$photo = '<img src="http://placehold.it/200x200&text=No+Profile+Photo" />';
	}
 ?>

	<?php echo $photo; ?>
</div>

<div class="main-content">

	<div class="new-section">
		<p class="sub-head">Badges Earned.</p>
		<p>Row of badges</p>
	</div>

	<div class="new-section">
		<p class="sub-head">Make a Pledge and Support <?php echo $full_name; ?>.</p>
		<p>Styles and pledge button</p>
	</div>

	<div class="new-section">
		<p class="sub-head"><?php echo $full_name; ?>'s generous supporters.</p>
		<p>Comments</p>
	</div>

	<div class="new-section">
		<p class="sub-head">Only <?php echo $campaign_remaining; ?> Days Left in the Grow.</p>
		<p>Total Days: <?php echo $campaign_full; ?></p>
		<p>Days Passed: <?php echo $campaign_elapsed; ?></p>
		<p>Days Remaining: <?php echo $campaign_remaining; ?></p>
	</div>
	
	<div class="new-section">
		<p class="sub-head">Personal Statement.</p>
		<p><?php echo $statement; ?></p>
	</div>



	grow photos<br/>
	<div class="new-section">
		<p class="sub-head">See All Members of Team <?php echo $team_name ?></p>
		
		<?php 

		foreach ($teammembers as $member) {

			if ($member->profilePic) {
				$photo = '<img src="/userphotos/' . $member->profilePic . '" width="200px" />';
			} else {
				$photo = '<img src="http://placehold.it/200x200&text=NoProfilePhoto" />';
			}

			?>
			<div class="members">
				<p><a href="/grower/<?php echo $member->userID; ?>/<?php echo  strtolower($member->firstName) . '-' . strtolower($member->lastName) ?>/"><?php echo $member->firstName . ' ' . $member->lastName; ?></a></p>
				<?php echo $photo; ?>
			</div>

			<?php } ?>
	</div>

<br clear="all" />
<br clear="all" />

</div>



</div>