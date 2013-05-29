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
		$photo = '<img src="' . base_url() . 'userphotos/' . str_replace('.', '_thumb.', $profile_pic) . '" width="200px" />';
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
		<div class="image-row">
		<?php 
			if (isset($styles_choices)) {
				foreach ($styles_choices as $choice) {
					echo '<div class="icon"><img width="50px" id="' . $choice->styleID . '" alt="' . $choice->styleName . '" title="' . $choice->styleName . '" src="' . base_url() .'artwork/styles/'. $choice->fileName . '" /></div>';

				}
			}
		 ?>
		</div>

		<br clear="all" />

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
	
<?php if (isset($statement)) { ?>
	<div class="new-section">
		<p class="sub-head">Personal Statement.</p>
		<p><?php echo $statement; ?></p>
	</div>
<?php } ?>

<?php if (isset($photos)) { ?>
	<div class="new-section">
		<p class="sub-head">See All of <?php echo $full_name; ?>'s Current Photos</p>
		<?php 
				foreach ($photos as $photo) {
					echo '<img src="' . base_url() . 'userphotos/' . $photo->photoImage . '" width="100px">';
				}
		?>

	</div>
<?php } ?>



	<div class="new-section">
		<p class="sub-head">See All Members of Team <?php echo $team_name ?></p>
		
		<?php 

		foreach ($teammembers as $member) {

			if ($member->profilePic) {
				$photo = '<img src="' . base_url() . 'userphotos/' . str_replace('.', '_thumb.', $member->profilePic) . '" width="100px" />';
			} else {
				$photo = '<img src="http://placehold.it/100x100&text=NoProfilePhoto" />';
			}

			?>
			<div class="members">
				<p><a href="<?php echo base_url(); ?>grower/<?php echo $member->userID; ?>/<?php echo  strtolower($member->firstName) . '-' . strtolower($member->lastName) ?>/"><?php echo $member->firstName . ' ' . $member->lastName; ?></a></p>
				<?php echo $photo; ?>
			</div>

			<?php } ?>
	</div>

<br clear="all" />
<br clear="all" />

</div>



</div>