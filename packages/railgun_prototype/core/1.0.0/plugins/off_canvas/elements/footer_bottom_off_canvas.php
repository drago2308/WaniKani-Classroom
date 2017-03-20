<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

	<?php if ($c->isEditMode()) { ?>
		<!-- Disabled </div> -->
		<?php } ?>
			<!-- End Scroller-inner -->
			</div>
			<!-- End Scroller -->
			</div>
			<!-- End Pusher -->
			</div>
			<!-- End Container -->
</div>
</div>

			<?php Loader::element('footer_required'); ?>
				<!-- Super Modules -->
				<script src="<?php echo $view->getThemePath()?>/js/modules/ml-menu/classie.js"></script>
				<script src="<?php echo $view->getThemePath()?>/js/modules/ml-menu/mlpushmenu.min.js"></script>

				<!-- Last script to trigger menu -->
				<script>
					new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
				</script>

				</body>

				</html>
