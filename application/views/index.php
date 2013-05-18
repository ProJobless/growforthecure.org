
<div class="image-row">
<?php 
	foreach ($styles as $row) {
		echo '<img alt="' . $row->styleName . '" title="' . $row->styleName . '" src="/artwork/styles/'. $row->fileName . '" />';
	}
 ?>
</div>

<div class="tagline">
	<img src="/artwork/tagline-razor.png" />
</div>

<p><?php echo $copy; ?></p>
