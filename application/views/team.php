<div class="inner">

<h1>See All Members of Team <?php echo $team_name ?></h1>
<p>See all the friends who have grouped together to fight again Lung Cancer. Help the ones you know by pledging them to the top!</p>

<div class="new-section">

		<?php 

		foreach ($teammembers as $member) {

			if ($member->profilePic) {
				$photo = '<img src="' . base_url() . 'userphotos/' . str_replace('.', '_thumb.', $member->profilePic) . '" width="200px" />';
			} else {
				$photo = '<img src="http://placehold.it/200x300&text=NoProfilePhoto" />';
			}

			?>
			<div class="members left p10">
				<p><a href="<?php echo base_url(); ?>grower/<?php echo  strtolower($member->firstName) . '-' . strtolower($member->lastName) ?>/<?php echo $member->userID; ?>"><?php echo $member->firstName . ' ' . $member->lastName; ?></a></p>
				<a href="<?php echo base_url(); ?>grower/<?php echo  strtolower($member->firstName) . '-' . strtolower($member->lastName) ?>/<?php echo $member->userID; ?>"><?php echo $photo; ?></a>
			</div>

			<?php } ?>
	</div>



</div>