<?php
	defined('C5_EXECUTE') or die("Access Denied.");

		$this->inc('elements/header_amp.php'); ?>
	<main>
		<div class="container main bg-white p-t-1 p-b-1">
		<div class="row-fluid">
			<div class="col-lg-12">
				<?php
				$a = new Area('Content');
				$a->enableGridContainer();
				$a->display($c);
			?>
			</div>
		</div>
	</div>

	</main>
	<?php
		$this->inc('elements/footer_amp.php'); ?>
