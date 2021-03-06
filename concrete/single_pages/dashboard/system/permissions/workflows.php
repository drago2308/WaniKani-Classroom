<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php $c = Page::getCurrentPage(); ?>

<?php if (isset($wf)) {
    ?>

<?php if ($this->controller->getTask() == 'edit_details') {
    ?>

<form method="post" action="<?php echo $view->action('save_workflow_details')?>" method="post">
<input type="hidden" name="wfID" value="<?php echo $wf->getWorkflowID()?>" />
<?php echo Loader::helper('validation/token')->output('save_workflow_details')?>

<?php Loader::element("workflow/edit_type_form_required", array('workflow' => $wf));
    ?>

<div class="ccm-dashboard-form-actions-wrapper">
<div class="ccm-dashboard-form-actions">
	<a href="<?php echo URL::page($c, 'view_detail', $wf->getWorkflowID())?>" class="btn btn-default pull-left"><?php echo t("Cancel")?></a>
	<input type="submit" name="submit" value="<?php echo t('Save')?>" class="btn btn-primary pull-right" />
</div>
</div>
</form>

<?php 
} else {
    ?>

	<?php Loader::element("workflow/type_form_required", array('workflow' => $wf));
    ?>

<?php 
}
    ?>



<?php 
} elseif ($this->controller->getTask() == 'add' || $this->controller->getTask() == 'submit_add') {
    ?>

	<form method="post" action="<?php echo $view->action('submit_add')?>">
	<?php echo Loader::helper('validation/token')->output('add_workflow')?>
		<fieldset>
		
			<legend><?php echo t('Add Workflow')?></legend>
			
			<div class="form-group">
				<?php echo $form->label('wfName', t('Name'))?>
				<div class="input-group">
					<?php echo $form->text('wfName', $wfName)?>
					<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
				</div>
			</div>
			
			<div class="form-group">
				<?php echo $form->label('wftID', t('Type'))?>
				<div class="input-group">
					<?php echo $form->select('wftID', $types)?>
				</div>
			</div>

			<?php foreach ($typeObjects as $type) {
    ?>
				
				<div style="display: none" class="form-group ccm-workflow-type-form" id="ccm-workflow-type-<?php echo $type->getWorkflowTypeID()?>">
					<?php
                    if ($type->getPackageID() > 0) {
                        @Loader::packageElement('workflow/types/' . $type->getWorkflowTypeHandle()  . '/add_type_form', $type->getPackageHandle(), array('type' => $type));
                    } else {
                        @Loader::element('workflow/types/' . $type->getWorkflowTypeHandle() . '/add_type_form', array('type' => $type));
                    }
    ?>
				</div>
			<?php 
}
    ?>
		</fieldset>
		
		<div class="ccm-dashboard-form-actions-wrapper">
		<div class="ccm-dashboard-form-actions">
			<a href="<?php echo URL::page($c)?>" class="btn btn-default pull-left"><?php echo t('Cancel')?></a>
			<button type="submit" class="btn btn-primary pull-right"><?php echo t('Add')?></button>
		</div>
		</div>
			
	</form>
	
	<script type="text/javascript">
	$(function() {
		$('select[name=wftID]').change(function() {
			$('.ccm-workflow-type-form').hide();
			$('#ccm-workflow-type-' + $(this).val()).show();
		})
		$('#ccm-workflow-type-' + $('select[name=wftID]').val()).show();
	});
	</script>

<?php 
} else {
    ?>

	<div class="ccm-dashboard-header-buttons">
		<a href="<?php echo URL::to('/dashboard/system/permissions/workflows', 'add')?>" class="btn btn-primary"><?php echo t('Add Workflow')?></a>
	</div>
	
	<h4><?php echo t2('%d Workflow', '%d Workflows', count($workflows))?></h4>
	
	<ul class="item-select-list">
	<?php foreach ($workflows as $workflow) {
    ?>
		<li><a href="<?php echo $view->url('/dashboard/system/permissions/workflows', 'view_detail', $workflow->getWorkflowID())?>"><i class="fa fa-exchange"></i> <?php echo $workflow->getWorkflowDisplayName()?></a></li>
	<?php 
}
    ?>
	</ul>

<?php 
} ?>