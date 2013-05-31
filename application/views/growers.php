<div class="inner">

<h1>Meet the Growers</h1>

<p class="data-copy"><?php echo $copy; ?><p>

<div class="left search-bar-p">
	<p class="sub-head">Grower and Team Search:</p>
</div>

<div class="left search-bar-i">
	<input type="text" name="search" id="searchUsers" />
</div>

<br clear="all" />

<?php 

	foreach ($users as $user) {
		echo'<li><a href="' . base_url() . 'grower/' . strtolower($user->firstName) . '-' . strtolower($user->lastName) . '/' . $user->userID .'">' . $user->firstName . ' ' . $user->lastName . '</a></li>';
	}

?>


<script>

	$('#searchUsers').autocomplete({
		source: "<?php echo base_url(); ?>growers/get_grower_list",
		position: { my : "bottom left" },
	})

	console.log("working")

</script>




</div>