<div class="inner news-admin">


<p>Use this page to Add, Edit, and Delete items that will appear on the News and Events page of the website.</p>

<br />





<p class="sub-head">Add and Remove Sponsors.</p>

<?php 
	if (isset($error)){
		print_r($error);
	}
?>


<?php echo form_open_multipart('admin/sponsor_add');?>
<p>Sponsor Name</p>
<div class="error"><?php echo form_error('name'); ?></div>
<?php echo form_input('name', set_value('name')); ?>

<p>Sponsor Copy</p>
<?php echo form_error('copy'); ?>
<?php echo form_textarea('copy', set_value('copy')); ?>

<p>Sponsor Link</p>
<?php echo form_error('link'); ?>
<?php echo form_input('link', set_value('link')); ?>

<p>Sponsor Logo</p>
<?php echo form_error('logo'); ?>
<?php echo form_upload('logo', set_value('logo')); ?>

<input type="submit" value="upload" />

</form>


		<br clear="all" />
		<br clear="all" />
		<br clear="all" />
	<?php
	if ($sponsors) { 
		foreach ($sponsors as $sponsor) {

		?>
		<p class="sub-head" id="headline-<?php echo $sponsor->id; ?>">Sponsor: <?php echo $sponsor->sponsorName; ?></p>
		<p><?php echo $sponsor->sponsorCopy; ?></p>
		<p>Link: <?php echo $sponsor->sponsorLink; ?></p>
		<a sponsorid="<?php echo $sponsor->id; ?>" class="delete-button intro-update-button">Delete Sponsor.</a>
		<br clear="all" />
		<br clear="all" />
		<br clear="all" />
		<?php }
	}
	?>


<script>

$('a.delete-button').click(function() {
	id = $(this).attr('sponsorid');
	console.log(id);

	if (id) {
		$.post(
			"<?php echo base_url(); ?>admin/sponsor_delete/",
			{i:id},
			function(data) {
				// WHEN SUCCESSFUL DO THIS
				console.log("Redirecting...");
				window.location.replace("<?php echo base_url(); ?>admin/sponsor");
		})
	} else {
		// DO NOTHING
	}

});

</script>




</div>