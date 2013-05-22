
<div class="image-row">
<?php 
	foreach ($styles as $row) {
		echo '<img alt="' . $row->styleName . '" title="' . $row->styleName . '" src="' . base_url() .'artwork/styles/'. $row->fileName . '" />';
	}
 ?>
</div>

<div class="tagline">
	<img src="<?php echo base_url(); ?>artwork/tagline-razor.png" />
</div>

<div class="description">
	<p><?php echo $copy; ?> <a href="<?php echo base_url(); ?>about/">Read more...</a></p>
</div>


<div class="right-now">
	<img id="Image-Maps_2201305191435081" src="<?php echo base_url(); ?>artwork/right-now.png" usemap="#Image-Maps_2201305191435081" border="0" width="520" height="62" alt="" style="outline:none;" />
	<map id="Image-Maps_2201305191435081" name="Image-Maps_2201305191435081">
	<area shape="rect" coords="302,0,422,57" href="<?php echo base_url(); ?>donate" alt="Donate Now" title="Donate Now" />
	<area shape="rect" coords="423,0,515,57" href="<?php echo base_url(); ?>register" alt="Register as a Grower" title="Register as a Grower" />
</map>
</div>



<div class="donations-where">
	<div class="inner">
	
		<p class="donation-head">Where do your donations go?</p>
		<p class="donation-desc"><a href="foundation.php"><img src="<?php echo base_url(); ?>artwork/foundation_logo.png" width="150px" align="right"></a>All net proceeds will be used by the Bonnie J. Addario Lung Cancer Foundation on the front lines of lung cancer research. Their scientific and medical advisory boards consider only immediate results-oriented projects promising to catalyze progress through early detection, genetic testing, drug discovery and patient-focused outcomes. <a href="http://www.lungcancerfoundation.org" target="_blank">More about the foundation</a>.</p>

		<br clear="all">

	</div>
</div>


</div>
            