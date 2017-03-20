<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/modules/off_canvas/header_top_off_canvas.php');
?>
	<header>
		<!-- actual stuff for showing header and stuff -->
		<!-- Layout Stuff -->
		<?php $uinfo = new User();
		if ($uinfo->isLoggedIn()){ ?>
			<div class="pos-f-t" style="padding-top: 48px; z-index: 300;">
				<?php } else { ?>
			<div class="pos-f-t">
			<?php }?>
				<?php
			$a = new GlobalArea('Header Nav');
			$a->display($c);
		?>
			</div>
			<div class="container-fluid" <?php if ($uinfo->isLoggedIn()){ ?>style="padding-top:54px;" <?php }else { ?> style="padding-top:54px;" <?php } ?>>
			<div class="row">
				<div class="col-md-4">
					<?php
				$a = new GlobalArea('Header Left Content');
				$a->display($c);
			?>
				</div>
				<div class="col-md-5">
					<?php
				$a = new GlobalArea('Header Middle Content');
				$a->display($c);
			?>
				</div>

				<div class="col-md-3">
					<?php
				$a = new GlobalArea('Header Right Content');
				$a->display($c);
			?>
				</div>
			</div>
		</div>

	</header>
