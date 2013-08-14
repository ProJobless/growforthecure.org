<!DOCTYPE html>
<html>
<head>
	
	<title><?php echo $page_title ?></title>
	
	<meta charset="UTF-8">
	<meta name="description" content="<?php echo $page_description; ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="msvalidate.01" content="6274B65405F8EE4FDE5A1311D552E76D" />
	<meta name="google-site-verification" content="TYS4uHfPCV2OqdVGIPemNevumjX66tptcHF_pOfgwwc" />
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.3.custom.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<link rel="stylesheet" href="/<?php echo base_url(); ?>scripts/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans|Francois+One|Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>

	<meta property="og:title" content="Grow for the Cure" />
	<meta property="og:image" content="http://createdbysteve.com/growforthecure/artwork/logos/GrowLogo-small.jpg" />

</head>

<body class="<?php echo $body_class; ?>">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=148040096614";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="header inner">
<a href="<?php echo base_url(); ?>"><img id="Image-Maps_22013051914350812" src="<?php echo base_url(); ?>artwork/header-donate-button.png" usemap="#Image-Maps_22013051914350812" border="0" width="610" height="152" alt="" /></a>
<map id="Image-Maps_22013051914350812" name="Image-Maps_22013051914350812">
<area shape="rect" coords="457,97,605,147" href="<?php echo base_url(); ?>donate" alt="Make a donation." title="Make a donation." />
</map>
</div>
            


</div>

<div class="social-icons inner">
	<div class="right">
		<a href="https://www.facebook.com/growforthecure.org" target="_blank"><img width="40px" src="<?php echo base_url(); ?>artwork/facebook.png" /></a>
		<a href="https://twitter.com/growforthecure1" target="_blank"><img width="40px" src="<?php echo base_url(); ?>artwork/twitter.png" /></a>
		<a href="mailto:info@growforthecure.org"><img width="40px" src="<?php echo base_url(); ?>artwork/mail.png" /></a>
	</div>
</div>

<br clear="all" />

<div class="navigation">
		<div class="inner">
			<div class="navlinks">
				<a href="<?php echo base_url(); ?>">Home</a>
				<a href="<?php echo base_url(); ?>growers/">Growers</a>
				<a href="<?php echo base_url(); ?>sponsors/">Sponsors</a>
				<a href="<?php echo base_url(); ?>news/">News</a>
				<a href="<?php echo base_url(); ?>hall_of_fame/">Hall of Fame</a>
				<a href="http://www.zazzle.com/growforthecure" target="_blank">Shop</a>
				<a href="<?php echo base_url(); ?>about/">About</a>



				<?php if (isset($_COOKIE["userid"])) { ?>
					<?php if (current_url() ==  base_url() . 'profile/' . $_COOKIE["fullname"] .'/' . $_COOKIE['userid']) { ?>
						<a class="button" href="<?php echo base_url(); ?>logout">Log Out</a>
					<?php } else { ?>
						<a class="button" href="<?php echo base_url(); ?>profile/<?php echo $_COOKIE["fullname"] ?>/<?php echo $_COOKIE['userid']; ?>">View / Edit Your Profile</a>
					<?php } ?>
				<?php } else { ?>
				<a class="button" href="<?php echo base_url(); ?>register/">Register Now / Log In</a>
				<?php }	?>

			</div>
		</div>
</div>

<div class="inner" style="margin-top:20px;margin-bottom:50px;">

	<div class="facebook-button left">
		<div class="fb-like" data-href="https://www.facebook.com/growforthecure.org" data-send="false" data-width="450" data-show-faces="false"></div>
	</div>

	<div class="twitter-button right">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.growforthecure.org" data-text="Fighting Lung Cancer. Funny Hair. Serious Cause." data-via="growforthecure1">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>

</div>
<br clear="all" />















