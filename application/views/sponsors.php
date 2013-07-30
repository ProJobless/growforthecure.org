<div class="inner">

<h1>Our Sponsors</h1>

<p class="data-copy"><?php echo $copy; ?> For more information, email us at <a href="mailto:info@growforthecure.org">info@growforthecure.org</a><p>

<br /><br />

<?php 
		foreach ($sponsors as $sponsor) {
			$link = $sponsor->sponsorLink;
			if (strpos($link, 'http://') !== 0) {
				$link = 'http://' . $link;
			}

?>
<div class="sponsor">

<p class="sub-head"><a target="_blank" href="<?php echo $link; ?>"><?php echo $sponsor->sponsorName; ?></a></p>
<?php if ($sponsor->sponsorLogo) { ?>
<img src="<?php echo base_url(); ?>artwork/sponsors/<?php echo $sponsor->sponsorLogo; ?>">
<?php } ?>
<p class="desc"><?php echo $sponsor->sponsorCopy; ?> <a target="_blank" href="<?php echo $link; ?>">Click for more on <?php echo $sponsor->sponsorName; ?>.</a></p>
</div>

<br clear="all" />
<?php 
		}
 ?>



</div>