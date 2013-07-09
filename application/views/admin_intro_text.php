<div class="inner intro-admin">

	<?php
	if ($introtexts) { 
		foreach ($introtexts as $intro) {

			if ($intro->page == 'front') {
				$page = "Front Page of Site.";
			} elseif ($intro->page == 'growers') {
				$page = "Growers Search page Intro.";
			} elseif ($intro->page == 'sponsors') {
				$page = "Sponsor Page Intro.";
			} elseif ($intro->page == 'news') {
				$page = "News Page Intro.";
			} elseif ($intro->page == 'halloffame') {
				$page = "Hall Of Fame Page Intro.";
			} else {
				$page = "Intro Copy.";
			}
		?>
		<p class="sub-head"><?php echo $page; ?></p>
		<textarea rows="4" name="<?php echo $intro->page; ?>"><?php echo $intro->introCopy; ?></textarea>
		<br />
		<a href="#" id="send-invite" class="intro-update-button">Update <?php echo $page; ?></a>
		<span id="result">Updated Successfully.</span>


		<?php }
	}
	?>



</div>