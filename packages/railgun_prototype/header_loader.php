<?php defined('C5_EXECUTE') or die("Access Denied.");

//--------------------------------------------------------------------------------//
//				|| Railgun Prototype Header Loader || Version 1.1.0 ||
//				|| Code by Drew Hutton || 27.1.2017 (c) || Updated 27.1.2017 ||
//
//				Purpose of this is to create a truely developer friendly concrete 5 theme that
//				Is both easy to use and easy to extend. Seperating the loading of elements
//				serves as a means for optimization, being able to remove and add features
//				within a theme (developer options) on the fly allows for greater optimization of code
//
//				This file takes care of loading all elements, removing the need for all
//				js, css etc. to be in the themes folder taking up space and confusing the developer.
//
//				If you found this code usefull for you please support me at:
//				After all this is coded with <3 for everyone
//
//--------------------------------------------------------------------------------//


// Load Settings
include('packages/railgun_prototype/settings.php');



// Start Loading Header Things
	//Preload Required Assest Using HTTP/2 Server Push
	/*if ($bootstrap4){
	header("Link: <" . $versionPath . "/plugins/bootstrap4" . $bootstrap4ver . "/css/bootstrap.min.css>; rel=preload; as=style;", false);
	header("Link: <" . $versionPath . "/plugins/bootstrap4" . $bootstrap4ver . "/js/tether.min.js>; rel=preload; as=script;", false);
	header("Link: <" . $versionPath . "/plugins/bootstrap4" . $bootstrap4ver . "/js/bootstrap.min.js>; rel=preload; as=script;", false);
	}else {
	header("Link: <" . $versionPath . "/plugins/bootstrap3/js/bootstrap.min.js>; rel=preload; as=script;", false);
	}
	if ($jQuery3){
	header("Link: <" . $versionPath . "/plugins/jquery3/js/jquery3.min.js>; rel=preload; as=script;", false);
} else if ($jQuery3Slim){
	header("Link: <" . $versionPath . "/plugins/jquery3slim/js/jquery3slim.min.js>; rel=preload; as=script;", false);
} else if ($jQuery2){
	header("Link: <" . $versionPath . "/plugins/jquery2/js/jquery2.min.js>; rel=preload; as=script;", false);
}
	if($optimizeForHTTP2){
	// Always Preload design Resoursces
	header("Link: <" . $this->getThemePath() . "/css/design-style.css>; rel=preload; as=style;", false);
	header("Link: <" . $this->getThemePath() . "/js/design-script.js>; rel=preload; as=script;", false);

	//Preload Plugin Resoursces
	if ($animeJS){
			header("Link: <" . $versionPath . "/plugins/animejs/js/anime.min.js>; rel=preload; as=script;", false);
	}

	if ($materialRipple){
			header("Link: <" . $versionPath . "/plugins/material_ripple/js/material.min.js>; rel=preload; as=script;", false);
			header("Link: <" . $versionPath . "/plugins/material_ripple/js/ripple.min.css>; rel=preload; as=style;", false);
	}

	if($scrollReveal){
			header("Link: <" . $versionPath . "/plugins/scroll_reveal/js/scrollreveal.js>; rel=preload; as=script;", false);
			header("Link: <" . $versionPath . "/plugins/scroll_reveal/js/scrollreveal.css>; rel=preload; as=style;", false);
	}
}*/
	?>

	<!doctype html>
	<html class="no-js" lang="en">
	<link rel="amphtml" href="<?php echo $base . 'amp/' . $c->getCollectionLink(); ?>">

	<head>
		<!-- Load Bootstrap and font before the assets as the assets take priority over bootstrap in styling -->
		<?php $u = new User();
					$c = \Page::getCurrentPage();
					// Remember to change this url to whatever website url it is //
					$base = $baseURL;


		//Jquerys
		if ($jQuery3){
			?><script src="<?php echo $versionPath ?>/plugins/jquery3/js/jquery3.min.js"></script><?php
		}
		if ($jQuery3Slim){
			?><script src="<?php echo $versionPath ?>/plugins/jquery3slim/js/jquery3slim.min.js"></script><?php
		}
		if ($jQuery3Migrate) {
			?><script src="<?php echo $versionPath ?>/plugins/jquery3/js/jquery3migrate.min.js"></script><?php
		}
		if ($jQuery2){
			?><script src="<?php echo $versionPath ?>/plugins/jquery2/js/jquery2.min.js"></script><?php
		}
		// Load Jquery 2 to overwrite 3 if logged in
		if ($useJQuery2OnEditMode && $jQuery3){
		if ($u->isLoggedIn()){ ?><script src="<?php echo $versionPath ?>/plugins/jquery2/js/jquery2.min.js"></script> <?php }else{ ?><script src="<?php echo $versionPath ?>/plugins/jquery3/js/jquery3.min.js"></script><?php }
		}
		if ($useJQuery2OnEditMode && $jQuery3Slim){
		if ($u->isLoggedIn()){ ?><script src="<?php echo $versionPath ?>/plugins/jquery2/js/jquery2.min.js"></script> <?php }else{ ?><script src="<?php echo $versionPath ?>/plugins/jquery3Slim/js/jquery3slim.min.js"></script><?php }
		}
		  ?>
			<!-- Bootstrap -->
			<?php	if ($bootstrap4){ ?>
			<link rel="stylesheet" href="<?php echo $versionPath . "/plugins/bootstrap4" . $bootstrap4ver . "/css/bootstrap.min.css"?>" type="text/css">
			<?php } else { ?>
			<link rel="stylesheet" href="<?php echo $versionPath . "/plugins/bootstrap3/css/bootstrap.min.css"?>" type="text/css">
			<?php	}
		if($optimizeForHTTP2){

			?>
		<!-- Begin Plugins -->
		<!-- Material -->
		<?php	if ($materialRipple){ ?>
		<link rel="stylesheet" href="<?php echo $versionPath . "/plugins/material_ripple/css/ripple.min.css"?>" type="text/css">
		<?php } ?>
		<!-- Responsive Scroll -->
		<?php if ($scrollReveal){ ?>
		<link rel="stylesheet" href="<?php echo $versionPath ?>/plugins/scroll_reveal/css/scrollreveal.css" type="text/css">
		<link rel="stylesheet" href="<?php echo $versionPath ?>/plugins/scroll_reveal/css/rs-hider.css" type="text/css">
		<?php }
		}// Optimize for HTTP2 if end
			?>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=<?php echo $font ?>:300,400,400i,700" rel="stylesheet">
		<!-- Design Style -->
		<?php if($optimizeForHTTP2){ ?>
		<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/design-style.css" type="text/css">
		<?php } ?>
		<!-- Required Header -->
		<?php Loader::element('header_required'); ?>
		<!-- Meta -->
			<meta charset="utf-8" />
			<meta http-equiv="x-ua-compatible" content="ie=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<!-- Open Graph Protocol - Facebook - Optimization -->
			<meta property="og:title" content="<?php echo $c->getCollectionName(); ?>"/>
			<meta property="og:type" content="website" />
			<meta property="og:url" content="<?php echo $base . $c->getCollectionLink(); ?>" />
			<meta property="og:image" content="<?php echo $base . $this->getThemePath();?>/img/thumbnail.jpg" />
			<meta property="og:image:width" content="400" />
			<meta property="og:image:height" content="300" />
	</head>
	<body>
				<div class="<?php echo $c->getPageWrapperClass()?>">
				<!-- This only exists to ensure not stuffing up fonts -->
					<div class="mi-wrapper">
<!-- Finish Header -->
