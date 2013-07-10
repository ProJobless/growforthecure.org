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
		<a href="#" id="<?php echo $intro->page; ?>" class="intro-update-button">Update <?php echo $page; ?></a>
		<span id="<?php echo $intro->page; ?>-result" class="hidden intro-result">Updated Successfully.</span>


		<?php }
	}
	?>


<script>

$("a.intro-update-button").click(function() {

	introPage = this.id;
	introCopy = $('textarea[name='+introPage+']').val();
//	console.log(introPage);
//	console.log(introCopy);
	
	if (introCopy == "") {
		// Do Nothing.
		console.log("No copy to update. Doing Nothing.")
	} else {
		$.post(
			"<?php echo base_url(); ?>admin/update_intro/"+introPage,
			{copy:introCopy},
			function(data) {
				// WHEN SUCCESSFUL DO THIS
				console.log(data);
				$("span#"+introPage+"-result").fadeIn().delay(1000).fadeOut();
			})
	}


	
});
</script>



</div>