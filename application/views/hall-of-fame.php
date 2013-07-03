<div class="inner">

<h1>The Grow for the Cure Hall Of Fame.</h1>

<p class="introPara"><?php echo $copy; ?></p>

<br /> <br />

	<?php 
		foreach ($hallusers as $user) {

			$photo = $user->profilePic;

			if (empty($photo)) {
				$photo = "http://placehold.it/200x300&text=No+Profile+Photo";
			} else {
				$photo = str_replace('.', '_thumb.', $photo);
				$photo = base_url() . 'userphotos/' . $photo;
			}

			echo '<div class="grower"><a href="' . base_url() . 'grower/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '/' . $user->userID .'"><img width="200px" src="'. $photo . '" /><br/>' . $user->firstName . ' ' . $user->lastName . '</a></div>';
		}
	?>
</div>