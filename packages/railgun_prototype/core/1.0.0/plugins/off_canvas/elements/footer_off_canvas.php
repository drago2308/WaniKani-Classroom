<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
	<footer>
		<!-- Stuff for footer content -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<?php
					$a = new Area('Footer Left Content');
					$a-> display($c);
					?>
				</div>
				<div class="col-md-6">
					<?php
					$a = new Area('Footer Right Content');
					$a-> display($c);
					?>
				</div>
			</div>
		</div>

		<!-- might need to add more to this -->


	</footer>

	<?php $this->inc('elements/modules/off_canvas/footer_bottom_off_canvas.php');?>
