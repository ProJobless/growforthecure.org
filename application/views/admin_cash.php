<div class="inner cash-admin">


<p>Use this page to manually add a cash donation for a grower/style.</p>

<br />





<p class="sub-head">Add a cash donation.</p>

	<select id="styleSelection">
		<option value="0">Select a style</option>

	<?php
	if ($styles) { 
		foreach ($styles as $style) {
		?>
		<option value="<?php echo $style->styleID; ?>"><?php echo $style->styleName; ?></option>

		<?php }
	}
	?>
	</select>

	<select id="growerSelection">
		<option value="0">Select a grower</option>
	<?php
	if ($users) { 
		foreach ($users as $user) {
		?>
		<option value="<?php echo $user->userID; ?>"><?php echo $user->firstName; ?> <?php echo $user->lastName; ?></option>

		<?php }
	}
	?>
	</select>

	&nbsp;$<input id="cashAmount" type="text" value="0" />

	<a href="#" class="cash-button">Add Cash Donation.</a>

	<div class="hidden results"></div>

</div>



<script>

$("a.cash-button").click(function() {

	s = $("#styleSelection").val();
	g = $("#growerSelection").val();
	c = $("#cashAmount").val();


//	console.log("Style: " + s);
//	console.log("Grower: " + g);
//	console.log("Cash: " + c);
	
	if( Math.floor(c) == c && $.isNumeric(c) && c > 0) {
		if (s != 0 && g != 0) {

		$.post(
			"<?php echo base_url(); ?>admin/cash_update/",
			{style:s,grower:g,cash:c},
			function(data) {
				// WHEN SUCCESSFUL DO THIS
				console.log(data);
				$("div.results").html(data);
				$("div.results").fadeIn().delay(1000).fadeOut();
			})
		



		} else {
			alert("Make appropriate sections before adding donation.");
		}
	} else {
		console.log("Not an Int.");
		alert("Sorry, cash value must be a number greater than 0.");
		$("#cashAmount").val("0");
	}

	// if (introCopy == "") {
	// 	// Do Nothing.
	// 	console.log("No copy to update. Doing Nothing.")
	// } else {


	
});
</script>