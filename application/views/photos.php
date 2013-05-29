<?php 
if (!isset($error)) {
	echo '<pre>';
	print_r($error);
	echo '</pre>';
}
?>

<?php
$attributes = array('class' => 'registration_form', 'id' => 'registration_form');
echo form_open_multipart('photos/upload_photos', $attributes);
?>


<?php echo form_hidden('userID', $user_id); ?>
<?php echo form_hidden('campaignID', $campaign_id); ?>

<input type="file" name="userfile" size="20" /><br />

Caption for photo. <?php echo form_input('caption', set_value('caption')); ?>
Set this as your profile picture. <?php echo form_checkbox('profilepic', 'yes', FALSE); ?>

<?php 
if (!isset($photoName)) {
	echo '<img src="/userphotos/"' . $photoName . '>';
}
?>
<?php 
if (isset($photos)) {
foreach ($photos as $photo) {
	echo '<img src="' . base_url() . 'userphotos/' . $photo->photoImage . '" width="100px">';
}
}
?>

<br /><br />

<input type="submit" value="upload" />

</form>