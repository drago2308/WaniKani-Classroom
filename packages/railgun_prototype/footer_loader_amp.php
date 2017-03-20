<?php defined('C5_EXECUTE') or die("Access Denied.");

//--------------------------------------------------------------------------------//
//				|| Railgun Prototype Footer Loader AMP || Version 1.1.0 ||
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

?>
  <!-- prototype-wrapper -->
		</div>
  <!-- forced-wrapper -->
		</div>
  <!-- Footer Required -->
		<?php Loader::element('footer_required');
		if ($optimizeForHTTP2) {
		?>
<!-- Bootstrap 4 -->
<?php
    $u = new User();
 if ($u->IsLoggedIn()) {
 if ($bootstrap4){ ?>
<script src="<?php echo $versionPath ?>/plugins/bootstrap4<?php echo $bootstrap4ver ?>/js/tether.min.js"></script>
<script src="<?php echo $versionPath ?>/plugins/bootstrap4<?php echo $bootstrap4ver ?>/js/bootstrap.min.js"></script>
<?php }} ?>
<!-- Bootstrap 3 -->
<?php if ($u->IsLoggedIn()) { if ($bootstrap3){ ?>
<script src="<?php echo $versionPath ?>/plugins/bootstrap3/js/tether.min.js"></script>
<script src="<?php echo $versionPath ?>/plugins/bootstrap3/js/bootstrap.min.js"></script>
<?php }} ?>

<!-- Plugins -->
<!-- Material -->
<?php }// End optimizeForHTTP2 if ?>

				</body>

				</html>
