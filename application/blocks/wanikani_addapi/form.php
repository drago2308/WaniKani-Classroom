<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

$ps = Core::make('helper/form/page_selector');
$bf = null;
?>

<div class="form-group">
    <label class="control-label" for="text"><?=t('Text')?></label>
    <input type="text" class="form-control" name="text" value="<?php echo $text?>">
</div>
