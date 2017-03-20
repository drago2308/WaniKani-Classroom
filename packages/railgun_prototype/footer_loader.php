<?php defined('C5_EXECUTE') or die("Access Denied.");

//--------------------------------------------------------------------------------//
//				|| Railgun Prototype Footer Loader || Version 1.1.0 ||
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
<?php if ($bootstrap4){ ?>
<script src="<?php echo $versionPath ?>/plugins/bootstrap4<?php echo $bootstrap4ver ?>/js/tether.min.js"></script>
<script src="<?php echo $versionPath ?>/plugins/bootstrap4<?php echo $bootstrap4ver ?>/js/bootstrap.min.js"></script>
<?php } ?>
<!-- Bootstrap 3 -->
<?php if ($bootstrap3){ ?>
<script src="<?php echo $versionPath ?>/plugins/bootstrap3/js/tether.min.js"></script>
<script src="<?php echo $versionPath ?>/plugins/bootstrap3/js/bootstrap.min.js"></script>
<?php } ?>

<!-- Plugins -->
<!-- Material -->
<?php	if ($materialRipple){ ?>
<script src="<?php echo $versionPath . "/plugins/material_ripple/js/material.js"?>"></script>
<?php } ?>
<!-- Responsive Scroll -->
<?php if ($scrollReveal){ ?>
<script src="<?php echo $versionPath ?>/plugins/scroll_reveal/js/scrollreveal.js"></script>
<?php }?>
<!-- AnimeJS -->
<?php if ($animeJS){ ?>
<script src="<?php echo $versionPath ?>/plugins/animejs/js/anime.min.js"></script>
<?php }?>
<!-- Design Script -->
<script src="<?php echo $this->getThemePath(); ?>/js/design-script.js"></script>
<?php }// End optimizeForHTTP2 if ?>

			<!-- It is always a good idea to load whatever doesnt need downloading straight away after the initial loading these are scripts that dont change
			<script type="text/javascript">
function downloadJSAtOnload() {
var element = document.createElement("script");
element.src = "<?php// echo $this->getThemePath(); ?>/js/lazyloaded.js";
document.body.appendChild(element);
}
if (window.addEventListener)
window.addEventListener("load", downloadJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", downloadJSAtOnload);
else window.onload = downloadJSAtOnload;
</script>
-->

				</body>

				</html>
