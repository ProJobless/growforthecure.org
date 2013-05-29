<div class="inner">

	<h1>Upload and delete photos from your account.</h1>



<?php 

	if (!isset($error)) {
		echo '<pre>';
		print_r($error);
		echo '</pre>';
	}

	$attributes = array('class' => 'registration_form', 'id' => 'registration_form');
	echo form_open_multipart('photos/upload_photos', $attributes);

?>


<?php echo form_hidden('userID', $user_id); ?>
<?php echo form_hidden('campaignID', $campaign_id); ?>

<table>
	<tr>
		<td>Select a photo from your computer.</td>
		<td><input type="file" name="userfile" size="20" /></td>
	</tr>
	<tr>
		<td>Caption for photo. (Optional)</td>
		<td><?php echo form_input('caption', set_value('caption')); ?></td>
	</tr>
	<tr>
		<td>Set this as your profile picture. (Optional)</td>
		<td><?php echo form_checkbox('profilepic', 'yes', FALSE); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="upload" /></td>
	</tr>
</table>

<br clear="all" />



</form>

	<div class="user-photos">
	<?php 
	if (isset($photos)) {
		foreach ($photos as $photo) {
			echo '<div class="photo"><img src="' . base_url() . 'userphotos/' . str_replace('.', '_thumb.', $photo->photoImage) . '" width="100px"><a href="' . base_URL() . 'deletephoto?id=' . $photo->photoID .'&u=' . $user_id . '&f=' . $photo->photoImage . '">Delete</a></div>';
		}
	}
	?>
	</div>

<br clear="all" />

</div>