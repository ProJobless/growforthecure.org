<div class="inner news-admin">


<p>Use this page to Add, Edit, and Delete items that will appear on the News and Events page of the website.</p>

<br />





<p class="sub-head">News and Events editing.</p>

		<p>Headline</p>
		<input type="text" id="new-headline" value=""><br /><br />
		<p>Body Copy</p>
		<textarea rows="4" id="new-copy"></textarea><br /><br />
		<p>Link</p>
		<input type="text" value="" id="new-link"><br />
		<a id="add-new" class="intro-update-button" style="background-color:green;">Add new entry.</a>

		<br clear="all" />
		<br clear="all" />
		<br clear="all" />
	<?php
	if ($newsitems) { 
		foreach ($newsitems as $item) {

		?>
		<p>Headline</p>
		<input type="text" id="headline-<?php echo $item->id; ?>" value="<?php echo $item->headline; ?>"><br /><br />

		<p>Body Copy</p>
		<textarea rows="4" id="copy-<?php echo $item->id; ?>"><?php echo $item->copy; ?></textarea><br /><br />

		<p>Link</p>
		<input type="text" id="link-<?php echo $item->id; ?>" value="<?php echo $item->link; ?>"><br />
		<a storyID="<?php echo $item->id; ?>" class="edit-button intro-update-button" style="background-color:green;">Edit this entry.</a>
		<a storyID="<?php echo $item->id; ?>" class="delete-button intro-update-button">Delete this entry.</a>
		<br clear="all" />
		<br clear="all" />
		<br clear="all" />
		<?php }
	}
	?>




<script>

$("a#add-new").click(function() {

	headline = $('#new-headline').val();
	copy = $('#new-copy').val();
	link = $('#new-link').val();

	if (headline == '' || copy == '') {
		console.log("Missing Data.");
		alert("Sorry, all items must have a Headline and Body copy at a minimum.");
	} else {
		$.post(
			"<?php echo base_url(); ?>admin/news_add/",
			{h:headline,c:copy,l:link},
			function(data) {
				// WHEN SUCCESSFUL DO THIS
				console.log("Redirecting...");
				window.location.replace("<?php echo base_url(); ?>admin/news");

		})
	}
});

$('a.delete-button').click(function() {
	id = $(this).attr('storyID');
	console.log(id);

	if (id) {
		$.post(
			"<?php echo base_url(); ?>admin/news_delete/",
			{i:id},
			function(data) {
				// WHEN SUCCESSFUL DO THIS
				console.log("Redirecting...");
				window.location.replace("<?php echo base_url(); ?>admin/news");
		})
	} else {
		// DO NOTHING
	}

});

</script>




</div>