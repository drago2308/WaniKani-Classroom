<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

?>

<div class="form-group">
    <label class="control-label" for="wanikani_type"><?=t('Wanikani Type')?></label>
    <select class="form-control" name="wanikani_type" value="<?php echo $wanikani_type?>">
      <option value="userlist">User List</option>
      <option value="leaderboard">Leaderboard</option>
      <option value="details">Details</option>
    </select>
</div>

<div class="form-group">
    <div class="checkbox">
        <label class="control-label" for"search">
        <input type="checkbox" name="search" value="1" <?php if ($search) { ?>checked<?php } ?>>
        <?php echo t('Search Bar?')?>
        </label>
    </div>
</div>

<div class="form-group">
    <div class="checkbox">
        <label class="control-label" for"get_url">
        <input type="checkbox" name="get_url" value="1" <?php if ($get_url) { ?>checked<?php } ?>>
        <?php echo t('Get URL Info?')?>
        </label>
    </div>
</div>
