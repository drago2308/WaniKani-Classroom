<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<footer class="">
<!-- Stuff for footer content -->
<div class="row">
<div class="container-super-fluid copyright bg-black  m-t-1">
	<div class="container">
		<div class="col-lg-12">
			<?php
			$a = new GlobalArea('Copyright');
			$a-> display($c);
			?>
		</div>
	</div>
</div>
</div>

<!-- might need to add more to this -->

</footer>

<?php
$u = new User();
if ($u->isLoggedIn()){
include('packages/railgun_prototype/footer_loader.php');
}else {
	include('packages/railgun_prototype/footer_loader_amp.php');
}?>
