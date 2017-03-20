<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
	<!doctype html>
	<html class="no-js" lang="en">

	<head>
		<?php Loader::element('header_required'); ?>
			<meta charset="utf-8" />
			<meta http-equiv="x-ua-compatible" content="ie=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			
			<!-- Super Module CSS -->
			<link rel="stylesheet" href="<?php echo $view->getThemePath()?>/css/modules/ml-menu/normalize.css" />
			<link rel="stylesheet" href="<?php echo $view->getThemePath()?>/css/modules/ml-menu/demo.css" />
			<link rel="stylesheet" href="<?php echo $view->getThemePath()?>/css/modules/ml-menu/icons.css" />
			<link rel="stylesheet" href="<?php echo $view->getThemePath()?>/css/modules/ml-menu/component.css" />
			<!-- Modernizr -->
			<script src="<?php echo $view->getThemePath()?>/js/modules/ml-menu/modernizr.custom.js"></script>
			<style>
				#ccm-highlighter {
					margin-top: -49px;
				}
				/* Forces all content to be pushed down to avoid clipping with concrete header */

				#WContainer {
					margin-top: 49px;
				}
			</style>
	</head>

	<body>
		<?php if ($c->isEditMode()) { ?>
			<!-- disabled untill futher notice		<div id="WContainer"> -->
			<?php } ?>
				<div class="<?php echo $c->getPageWrapperClass()?>">
				<div class="container">
					<!-- Push Wrapper -->
						<div class="mp-pusher" id="mp-pusher">
								<?php
						$a = new GlobalArea('Off Canvas Content');
						$a->display($c);
						 ?>
							<div class="scroller"><!-- this is for emulating position fixed of the nav -->
								<div class="scroller-inner">
