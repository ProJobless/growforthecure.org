
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

<div class="description">
	<p><?php echo $copy; ?> <a href="/about/">Read more...</a></p>
</div>

<div class="donations-where">
	<div class="inner">
	
		<p class="donation-head">Where do your donations go?</p>
		<p class="donation-desc"><a href="foundation.php"><img src="artwork/foundation_logo.png" width="150px" align="right"></a>All net proceeds will be used by the Bonnie J. Addario Lung Cancer Foundation on the front lines of lung cancer research. Their scientific and medical advisory boards consider only immediate results-oriented projects promising to catalyze progress through early detection, genetic testing, drug discovery and patient-focused outcomes. <a href="http://www.lungcancerfoundation.org" target="_blank">More about the foundation</a>.</p>

		<br clear="all">

	</div>
</div>

