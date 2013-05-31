<div class="inner">

	<h1>Meet the Growers</h1>

	<p class="data-copy"><?php echo $copy; ?><p>

	<div class="left search-bar-p">
		<p class="sub-head">Grower and Team Search:</p>
	</div>

	<div class="left search-bar-i">
		<input type="text" name="search" id="searchUsers" />
		<div class="results"></div>
	</div>

</div> <!-- END INNER -->

<br clear="all" />

<div class="easy-banner">
	
	<div class="inner" align="center">
		<img src="<?php echo base_url() ?>artwork/itssoeasy.png">
	</div>

</div>

<div class="image-row">
	<?php 
		foreach ($styles as $row) {
			echo '<img alt="' . $row->styleName . '" title="' . $row->styleName . '" src="' . base_url() .'artwork/styles/'. $row->fileName . '" />';
		}
	 ?>
</div>


<div class="easy-banner">
	<div class="inner" align="center">
		<img src="<?php echo base_url() ?>artwork/ourcurrenttopgrowers.png">
	</div>
</div>


<div class="inner">

	<?php 
		foreach ($users as $user) {

			$photo = $user->profilePic;

			if (empty($photo)) {
				$photo = "http://placehold.it/400x300&text=No+Profile+Photo";
			} else {
				$photo = str_replace('.', '_thumb.', $photo);
				$photo = base_url() . 'userphotos/' . $photo;
			}

			echo'<div class="grower">

			

			<a href="' . base_url() . 'grower/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '/' . $user->userID .'"><img src="'. $photo . '" /><br/>' . $user->firstName . ' ' . $user->lastName . '</a></div>';
		}
	?>

</div>

<br clear="all" />
<br clear="all" />
<br clear="all" />


<script>
	$('#searchUsers').autocomplete({
		source: "<?php echo base_url(); ?>growers/get_grower_list",
		select: function(event, ui) { 
			var searchLink = ui.item.link;
			window.location = '<?php echo base_url(); ?>grower/' + searchLink;
		 }
	})
</script>
