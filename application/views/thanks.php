<div class="inner">

	<h1>Thank you for your donation.</h1>
	<p style="padding-bottom:10px;">Thank you, <?php echo $payer_firstname; ?>, for your donation. Every little bit helps in the fight against lung cancer.</p>
	<p>If you would like to leave a comment or a statement of supprt for <?php echo $grower_name; ?> and his grow campaign, that would be great and you can do that right here.</p>

	<br />
	<p>Leave your comment here.</p> 
	<form action="<?php echo base_url(); ?>thanks/comment" method="POST">
		<input type="hidden" value="<?php echo $growerid; ?>" name="grower">
		<input type="hidden" value="<?php echo $payer_firstname; ?>" name="commenter">
		<input type="hidden" value="<?php echo $campaignid; ?>" name="campaign">
		<input type="hidden" value="<?php echo $grower_name; ?>" name="growername">
		<textarea style="padding:10px;font-size:16px;" maxlength="100" name="comment" rows="4" cols="50"></textarea>
		<br />
		<input type="submit" value="Leave Comment" style="font-size:16px;" />
	</form>


</div>