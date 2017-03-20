<?php
defined('C5_EXECUTE') or die("Access Denied.");
$u = new User();
if ($u->isLoggedIn()){
include('packages/railgun_prototype/header_loader.php');
}else {
include('packages/railgun_prototype/header_loader_amp.php');
}
$uinfo = new User(); ?>
	<header class="bg-white">
		<div class="container">
		<div class="row">
			<div class="col-md-5">
				<?php
			$a = new GlobalArea('Header Left Content AMP');
			$a->display($c);
		?>
			</div>
			<div class="col-md-2">
				<?php
			$a = new GlobalArea('Header Middle Content AMP');
			$a->display($c);
		?>
			</div>

			<div class="col-md-5 header-right">
				<?php
			$a = new GlobalArea('Header Right Content AMP');
			$a->display($c);
		?>
			</div>
		</div>
	</div>
	</header>
