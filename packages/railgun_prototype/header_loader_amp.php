<?php defined('C5_EXECUTE') or die("Access Denied.");

//--------------------------------------------------------------------------------//
//				|| Railgun Prototype Header Loader AMP || Version 1.1.0 ||
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
?>
	<!doctype html>
	<html amp lang="en">

	<head>
					<script async src="https://cdn.ampproject.org/v0.js"></script>
		<!-- Load Bootstrap and font before the assets as the assets take priority over bootstrap in styling -->
		<?php $u = new User();
					$c = \Page::getCurrentPage();
					// Remember to change this url to whatever website url it is //
					$base = $baseURL;

		// Load Jquery 2 to overwrite 3 if logged in
		if ($useJQuery2OnEditMode && $jQuery3){
		if ($u->isLoggedIn()){ ?><script src="<?php echo $versionPath ?>/plugins/jquery2/js/jquery2.min.js"></script> <?php }else{ ?><?php }
		}
		if ($useJQuery2OnEditMode && $jQuery3Slim){
		if ($u->isLoggedIn()){ ?><script src="<?php echo $versionPath ?>/plugins/jquery2/js/jquery2.min.js"></script> <?php }else{ ?><?php }
		}
		  ?>
			<!-- Bootstrap -->
			<?php	if ($bootstrap4){ ?>
			<style amp-custom>

 .container,.container-fluid{margin-left:auto;margin-right:auto}.container-fluid::after,.container::after,.row::after{content:"";display:table;clear:both}.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-7,.col-xs-8,.col-xs-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left}.container{padding-left:15px;padding-right:15px}.container-fluid{padding-left:15px;padding-right:15px}.row{margin-left:-15px;margin-right:-15px}.col-xs-1{width:8.33333%}.col-xs-2{width:16.66667%}.col-xs-3{width:25%}.col-xs-4{width:33.33333%}.col-xs-5{width:41.66667%}.col-xs-6{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:50%}.col-xs-7{width:58.33333%}.col-xs-8{width:66.66667%}.col-xs-9{width:75%}.col-xs-10{width:83.33333%}.col-xs-11{width:91.66667%}.col-xs-12{width:100%}.pull-xs-0{right:auto}.pull-xs-1{right:8.33333%}.pull-xs-2{right:16.66667%}.pull-xs-3{right:25%}.pull-xs-4{right:33.33333%}.pull-xs-5{right:41.66667%}.pull-xs-6{right:50%}.pull-xs-7{right:58.33333%}.pull-xs-8{right:66.66667%}.pull-xs-9{right:75%}.pull-xs-10{right:83.33333%}.pull-xs-11{right:91.66667%}.pull-xs-12{right:100%}.push-xs-0{left:auto}.push-xs-1{left:8.33333%}.push-xs-2{left:16.66667%}.push-xs-3{left:25%}.push-xs-4{left:33.33333%}.push-xs-5{left:41.66667%}.push-xs-6{left:50%}.push-xs-7{left:58.33333%}.push-xs-8{left:66.66667%}.push-xs-9{left:75%}.push-xs-10{left:83.33333%}.push-xs-11{left:91.66667%}.push-xs-12{left:100%}.offset-xs-1{margin-left:8.33333%}.offset-xs-2{margin-left:16.66667%}.offset-xs-3{margin-left:25%}.offset-xs-4{margin-left:33.33333%}.offset-xs-5{margin-left:41.66667%}.offset-xs-6{margin-left:50%}.offset-xs-7{margin-left:58.33333%}.offset-xs-8{margin-left:66.66667%}.offset-xs-9{margin-left:75%}.offset-xs-10{margin-left:83.33333%}.offset-xs-11{margin-left:91.66667%}@media (min-width:544px){.container{max-width:576px}.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-7,.col-sm-8,.col-sm-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left}.col-sm-1{width:8.33333%}.col-sm-2{width:16.66667%}.col-sm-3{width:25%}.col-sm-4{width:33.33333%}.col-sm-5{width:41.66667%}.col-sm-6{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:50%}.col-sm-7{width:58.33333%}.col-sm-8{width:66.66667%}.col-sm-9{width:75%}.col-sm-10{width:83.33333%}.col-sm-11{width:91.66667%}.col-sm-12{width:100%}.pull-sm-0{right:auto}.pull-sm-1{right:8.33333%}.pull-sm-2{right:16.66667%}.pull-sm-3{right:25%}.pull-sm-4{right:33.33333%}.pull-sm-5{right:41.66667%}.pull-sm-6{right:50%}.pull-sm-7{right:58.33333%}.pull-sm-8{right:66.66667%}.pull-sm-9{right:75%}.pull-sm-10{right:83.33333%}.pull-sm-11{right:91.66667%}.pull-sm-12{right:100%}.push-sm-0{left:auto}.push-sm-1{left:8.33333%}.push-sm-2{left:16.66667%}.push-sm-3{left:25%}.push-sm-4{left:33.33333%}.push-sm-5{left:41.66667%}.push-sm-6{left:50%}.push-sm-7{left:58.33333%}.push-sm-8{left:66.66667%}.push-sm-9{left:75%}.push-sm-10{left:83.33333%}.push-sm-11{left:91.66667%}.push-sm-12{left:100%}.offset-sm-0{margin-left:0}.offset-sm-1{margin-left:8.33333%}.offset-sm-2{margin-left:16.66667%}.offset-sm-3{margin-left:25%}.offset-sm-4{margin-left:33.33333%}.offset-sm-5{margin-left:41.66667%}.offset-sm-6{margin-left:50%}.offset-sm-7{margin-left:58.33333%}.offset-sm-8{margin-left:66.66667%}.offset-sm-9{margin-left:75%}.offset-sm-10{margin-left:83.33333%}.offset-sm-11{margin-left:91.66667%}}@media (min-width:768px){.container{max-width:720px}.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-7,.col-md-8,.col-md-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left}.col-md-1{width:8.33333%}.col-md-2{width:16.66667%}.col-md-3{width:25%}.col-md-4{width:33.33333%}.col-md-5{width:41.66667%}.col-md-6{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:50%}.col-md-7{width:58.33333%}.col-md-8{width:66.66667%}.col-md-9{width:75%}.col-md-10{width:83.33333%}.col-md-11{width:91.66667%}.col-md-12{width:100%}.pull-md-0{right:auto}.pull-md-1{right:8.33333%}.pull-md-2{right:16.66667%}.pull-md-3{right:25%}.pull-md-4{right:33.33333%}.pull-md-5{right:41.66667%}.pull-md-6{right:50%}.pull-md-7{right:58.33333%}.pull-md-8{right:66.66667%}.pull-md-9{right:75%}.pull-md-10{right:83.33333%}.pull-md-11{right:91.66667%}.pull-md-12{right:100%}.push-md-0{left:auto}.push-md-1{left:8.33333%}.push-md-2{left:16.66667%}.push-md-3{left:25%}.push-md-4{left:33.33333%}.push-md-5{left:41.66667%}.push-md-6{left:50%}.push-md-7{left:58.33333%}.push-md-8{left:66.66667%}.push-md-9{left:75%}.push-md-10{left:83.33333%}.push-md-11{left:91.66667%}.push-md-12{left:100%}.offset-md-0{margin-left:0}.offset-md-1{margin-left:8.33333%}.offset-md-2{margin-left:16.66667%}.offset-md-3{margin-left:25%}.offset-md-4{margin-left:33.33333%}.offset-md-5{margin-left:41.66667%}.offset-md-6{margin-left:50%}.offset-md-7{margin-left:58.33333%}.offset-md-8{margin-left:66.66667%}.offset-md-9{margin-left:75%}.offset-md-10{margin-left:83.33333%}.offset-md-11{margin-left:91.66667%}}@media (min-width:992px){.container{max-width:940px}.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-7,.col-lg-8,.col-lg-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left}.col-lg-1{width:8.33333%}.col-lg-2{width:16.66667%}.col-lg-3{width:25%}.col-lg-4{width:33.33333%}.col-lg-5{width:41.66667%}.col-lg-6{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:50%}.col-lg-7{width:58.33333%}.col-lg-8{width:66.66667%}.col-lg-9{width:75%}.col-lg-10{width:83.33333%}.col-lg-11{width:91.66667%}.col-lg-12{width:100%}.pull-lg-0{right:auto}.pull-lg-1{right:8.33333%}.pull-lg-2{right:16.66667%}.pull-lg-3{right:25%}.pull-lg-4{right:33.33333%}.pull-lg-5{right:41.66667%}.pull-lg-6{right:50%}.pull-lg-7{right:58.33333%}.pull-lg-8{right:66.66667%}.pull-lg-9{right:75%}.pull-lg-10{right:83.33333%}.pull-lg-11{right:91.66667%}.pull-lg-12{right:100%}.push-lg-0{left:auto}.push-lg-1{left:8.33333%}.push-lg-2{left:16.66667%}.push-lg-3{left:25%}.push-lg-4{left:33.33333%}.push-lg-5{left:41.66667%}.push-lg-6{left:50%}.push-lg-7{left:58.33333%}.push-lg-8{left:66.66667%}.push-lg-9{left:75%}.push-lg-10{left:83.33333%}.push-lg-11{left:91.66667%}.push-lg-12{left:100%}.offset-lg-0{margin-left:0}.offset-lg-1{margin-left:8.33333%}.offset-lg-2{margin-left:16.66667%}.offset-lg-3{margin-left:25%}.offset-lg-4{margin-left:33.33333%}.offset-lg-5{margin-left:41.66667%}.offset-lg-6{margin-left:50%}.offset-lg-7{margin-left:58.33333%}.offset-lg-8{margin-left:66.66667%}.offset-lg-9{margin-left:75%}.offset-lg-10{margin-left:83.33333%}.offset-lg-11{margin-left:91.66667%}}@media (min-width:1200px){.container{max-width:1140px}.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-7,.col-xl-8,.col-xl-9{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left}.col-xl-1{width:8.33333%}.col-xl-2{width:16.66667%}.col-xl-3{width:25%}.col-xl-4{width:33.33333%}.col-xl-5{width:41.66667%}.col-xl-6{position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:50%}.col-xl-7{width:58.33333%}.col-xl-8{width:66.66667%}.col-xl-9{width:75%}.col-xl-10{width:83.33333%}.col-xl-11{width:91.66667%}.col-xl-12{width:100%}.pull-xl-0{right:auto}.pull-xl-1{right:8.33333%}.pull-xl-2{right:16.66667%}.pull-xl-3{right:25%}.pull-xl-4{right:33.33333%}.pull-xl-5{right:41.66667%}.pull-xl-6{right:50%}.pull-xl-7{right:58.33333%}.pull-xl-8{right:66.66667%}.pull-xl-9{right:75%}.pull-xl-10{right:83.33333%}.pull-xl-11{right:91.66667%}.pull-xl-12{right:100%}.push-xl-0{left:auto}.push-xl-1{left:8.33333%}.push-xl-2{left:16.66667%}.push-xl-3{left:25%}.push-xl-4{left:33.33333%}.push-xl-5{left:41.66667%}.push-xl-6{left:50%}.push-xl-7{left:58.33333%}.push-xl-8{left:66.66667%}.push-xl-9{left:75%}.push-xl-10{left:83.33333%}.push-xl-11{left:91.66667%}.push-xl-12{left:100%}.offset-xl-0{margin-left:0}.offset-xl-1{margin-left:8.33333%}.offset-xl-2{margin-left:16.66667%}.offset-xl-3{margin-left:25%}.offset-xl-4{margin-left:33.33333%}.offset-xl-5{margin-left:41.66667%}.offset-xl-6{margin-left:50%}.offset-xl-7{margin-left:58.33333%}.offset-xl-8{margin-left:66.66667%}.offset-xl-9{margin-left:75%}.offset-xl-10{margin-left:83.33333%}.offset-xl-11{margin-left:91.66667%}}	/* Font Styles */

	.mi-wrapper a, .mi-wrapper body, .mi-wrapper h1, .mi-wrapper h2, .mi-wrapper h3, .mi-wrapper h4, .mi-wrapper h5, .mi-wrapper h6, .mi-wrapper html, .mi-wrapper p, .mi-wrapper input {
	    font-family: 'Source Sans Pro', sans-serif;
	    text-rendering: optimizeLegibility;
	    -webkit-font-smoothing: subpixel-antialiased;
	}


	h1 {
	    font-weight: 400;
	    color: #222;
	    padding-top: 1rem;
	}

	p {
	    font-weight: 400;
	}
	.light {
	    font-weight: 300;
	}
	.narrow1 {
	    line-height: 1.2rem;
	}
	.narrow2 {
	    line-height: 1.4rem;
	}

	body {
	  overflow-x: hidden;

	}

	html {
	  font-size: 1em;
	}


	/* Text Themes */

	.text-theme-primary {
	    color: rgb(220, 30, 40);
	    color: black;
	}
	.text-theme-secondary {
	    color: rgb(180, 80, 100);
	}
	.text-theme-warning {
	    color: rgb(255, 80, 100);
	}
	.text-theme-success {
	    color: rgb(120, 220, 120);
	}
	.text-theme-inverse {
	    color: #fff;
	}

	/* Button Themes */

	.btn-theme-primary {
	    color: #fff;
	    padding: 0.5rem 1rem;
	    background-color: rgb(255,85,85);
	    border-color: rgb(255,85,85);
	    border-radius: 0;
	    transition: 0.4s cubic-bezier(0.4, 0.0, 0.2, 1) all;
	}
	.btn-theme-primary:hover {
	    background-color: rgb(235,55,55);
	}

	.btn-theme-secondary {
	  color: #fff;
	  padding: 0.5rem 1rem;
	  background-color: rgb(0,153,211);
	  border-color: rgb(0,153,211);
	  border-radius: 0;
	  transition: 0.4s cubic-bezier(0.4, 0.0, 0.2, 1) all;
	}

	.btn-theme-secondary:hover {
	    background-color: rgb(0,123,181);
	    border-color: rgb(0,123,181);
	}

	.alert.alert-danger {
	  background-color: rgb(255, 125, 125);
	  border: 1px solid rgb(255,85,85);
	  border-radius: 0px;
	  color: white;
	}

	.alert.alert-success {
	  border-radius: 0px;
	}

	/* Backgrounds */

	.bg-theme1 {
	    background-color: rgb(6, 124, 68);
	}
	.bg-theme1 .ink {
	    background-color: rgb(36, 152, 98);
	}
	.bg-theme2 {
	    background-color: rgb(66,66,66);
	    color:white;
	}
	.bg-theme3 {
	    background-color: rgba(5,82,45, 0.8);
	    color:white;
	}
	.bg-theme3 .ink {
	    background-color: rgba(36, 152, 98, 0.8);
	}

	body {
	      background-color: rgb(66,66,66);
	  /*  background-color: rgb(255,229,229);*/
	}

	.bg-black {
	  background-color: rgb(0,0,0);
	}

	.bg-white {
	    background-color: white;
	}

	.bg-white-50 {
	  background-color: rgba(255,255,255,0.65);
	}

	/* images */
	.img-fluid {
	    padding: 1rem;
	    width: 100%;

	}

	.h-img-fluid {
	    box-sizing: border-box;
	    padding: 0.5rem 2rem 0.5rem 0rem;
	    width: auto;
	}

	@media (max-width: 1199px){
	  .h-img-fluid {
	      box-sizing: border-box;
	      padding: 1.5rem 1.95rem;
	      width: auto;
	  }
	}

	@media (max-width: 991px){
	  .h-img-fluid {
	      box-sizing: border-box;
	      padding: 1.5rem 0rem;
	      width: auto;
	      text-align: center;
	  }
	  .h-img-fluid img {
	      max-width: 300px;
	  }
	}

	img {
	  max-width: 100%;
	  height: auto;
	}


	/* Header */

	header p {
	  color: black;
	  letter-spacing: 1px;
	  text-align: right;
	}

	header h5 {
	  color: rgb(6,124,68);
	  font-weight: bold;
	  letter-spacing: 1px;
	  margin-bottom: 0.25em;
	  text-align: right;
	}

	@media (max-width: 61.975em){
	  header p {
	    text-align: center;
	  }

	  header h5 {
	    text-align: center;
	  }
	}


	.header-right{
	  padding-top: 4rem;
	}

	@media (max-width: 61.975em){
	  .header-right {
	    padding-top: 0;
	  }
	}

	/* Footer */

	.footer-theme {
	    padding-top: 0.5rem;
	    color: white;
	    font-size: 0.75rem;
	}
	.footer-theme strong {
	    color: rgb(0, 0, 0);
	}
	.footer-theme h2 {
	    margin-top: 0.60rem;
	}
	footer a {
	    color: white;
	}
	footer a:hover {
	    color: #eee;
	    text-decoration: none;
	}

	.copyright {
	  background-color: black;
	  border-top: 1px white solid;
	  color: white;
	  font-weight: bold;
	  font-size: 0.75rem;
	  padding-top: 0.5rem;
	}

	.copyright p {
	    font-weight: bold;
	}

	/* Continue Custom things */


	.fb-like{
	  margin-left: 4px;
	}


	.img-responsive{
	  width: 100%;
	  height: auto;
	  max-width: 100%;
	}

	.img-container {
	  padding: 0 0;
	}

	.img-container .container {
	  margin: 5px 0 0;
	}

	.img-container2 .container {
	  padding-left: 0;
	}

	.associates .col-md-4 {
	  margin-bottom: 0.5rem;
	}
	.row {
	  margin: 0;
	  padding: 0;
	}
	.row-fluid {
	  margin: 0;
	  padding: 0;
	}
	.row-fluid .col-lg-12 {
	  margin: 0;
	  padding: 0;
	}
	.row-fluid .col-sm-12 {
	  margin: 0;
	  padding: 0;
	}

	.row-fluid .container {
	  margin: 0;
	  padding: 0;
	}

	.no-gutter {
	  padding:0;
	}


	/* Correct Media Querys */

	/* Extra small devices (portrait phones, less than 34em) */
	@media (max-width: 33.975em) { }

	/* Small devices (landscape phones, less than 48em) */
	@media (max-width: 47.975em) {
	  .img-fluid {
	    margin: 0 auto;
	    text-align: center;
	  }

	  .footer-theme {
	    text-align: center;
	  }

	  .button-container {
	    display: none;
	  }

	}

	/* Medium devices (tablets, less than 62em) */
	@media (max-width: 61.975em) {

	  .img-container2 .container {
	    padding-left: 0.925em;
	    display: none;
	  }

	}

	/* Large devices (desktops, less than 75em) */
	@media (max-width: 74.975em) { }

			</style>
			<?php } else { ?>
			<link rel="stylesheet" href="<?php echo $versionPath . "/plugins/bootstrap3/css/bootstrap.min.css"?>" type="text/css">
			<?php	}
			?>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=<?php echo $font ?>:300,400,400i,700" rel="stylesheet">
		<!-- Design Style -->
		<?php if($optimizeForHTTP2){ ?>
		<!--<link rel="stylesheet" href="<?php// echo $this->getThemePath(); ?>/css/design-style.css" type="text/css">-->
		<?php } ?>
		<!-- Required Header -->
		<?php Loader::element('header_required_amp'); ?>
		<!-- Meta -->
			<meta charset="utf-8" />
			<meta http-equiv="x-ua-compatible" content="ie=edge">
			<meta name="viewport" content="width=device-width,minimum-scale=1">
			<link rel="canonical" href="<?php echo $base . $c->getCollectionLink(); ?>">
			<script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "BlogPosting",
				"author": "Drew Hutton",
				"publisher": "Yoroshiii, Drew Hutton",
        "headline": "Test Blog Post",
        "datePublished": "2017-1-10T12:00:00Z",
				"dateModified": "2017-1-10T12:00:00Z",
        "image": [
          "logo.jpg"
        ]
      }
    </script>
			<!-- Open Graph Protocol - Facebook - Optimization -->
			<meta property="og:title" content="<?php echo $c->getCollectionName(); ?>"/>
			<meta property="og:type" content="website" />
			<meta property="og:url" content="<?php echo $base . $c->getCollectionLink(); ?>" />
			<meta property="og:image" content="<?php echo $base . $this->getThemePath();?>/img/thumbnail.jpg" />
			<meta property="og:image:width" content="400" />
			<meta property="og:image:height" content="300" />
			<meta itemprop="name" content="Railgut Test"/>
    <meta itemprop="url" content="http://test.com.au/blah"/>
    <meta itemprop="creator" content="Drew Hutton"/>
			<!-- REQUIRED FOR AMP -->
			<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	</head>
	<body>
				<div class="<?php echo $c->getPageWrapperClass()?>">
				<!-- This only exists to ensure not stuffing up fonts -->
					<div class="mi-wrapper">
<!-- Finish Header -->
