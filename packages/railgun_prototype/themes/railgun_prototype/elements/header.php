<?php
defined('C5_EXECUTE') or die("Access Denied.");
include('packages/railgun_prototype/header_loader.php');
$uinfo = new User(); ?>
	<header class="bg-theme1">
		<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
			$a = new GlobalArea('Header Middle Content');
			$a->display($c);
		?>
			</div>

		</div>
	</div>
	</header>
