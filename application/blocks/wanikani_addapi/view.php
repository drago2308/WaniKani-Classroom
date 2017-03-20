<?php defined('C5_EXECUTE') or die(_("Access Denied.")) ?>

<?php
//Database
$db = \Database::connection();

if (isset($_GET['api_key'])) {
  $api_key = $_GET['api_key'];
  if ($api_key === "undefined"){
    $api_key = "";
  }
}
if(isset($_GET['func'])) {
  $func = $_GET['func'];
  if ($func === "undefined"){
    $api_key = "";
  }
}

if ($func === "add"){

  $sql_query = 'SELECT api_key FROM wanikani';

  $stmt = $db->prepare($sql_query);
  $stmt->execute();

  $apiKeys = $stmt->fetchAll();
  $Exist = false;
  foreach ($apiKeys as $key){
  if (in_array ($api_key, $key)){
    $Exist = true;
  }else{
    if ($Exist != true){

    }else{
      $Exist = true;
    }
  }
  }

  if ($Exist === false) {

  $user_information_username = "null";
  $user_information_gravatar = "null";
  $user_information_level = "null";
  $requested_information_radicals_progress = 0;
  $requested_information_radicals_total = 0;
  $requested_information_kanji_progress = 0;
  $requested_information_kanji_total = 0;
  $requested_information_apprentice_radicals = 0;
  $requested_information_apprentice_kanji = 0;
  $requested_information_apprentice_vocabulary = 0;
  $requested_information_apprentice_total = 0;
  $requested_information_guru_radicals = 0;
  $requested_information_guru_kanji = 0;
  $requested_information_guru_vocabulary = 0;
  $requested_information_guru_total = 0;
  $requested_information_master_radicals = 0;
  $requested_information_master_kanji = 0;
  $requested_information_master_vocabulary = 0;
  $requested_information_master_total = 0;
  $requested_information_enlighten_radicals = 0;
  $requested_information_enlighten_kanji = 0;
  $requested_information_enlighten_vocabulary = 0;
  $requested_information_enlighten_total = 0;
  $requested_information_burned_radicals = 0;
  $requested_information_burned_kanji = 0;
  $requested_information_burned_vocabulary = 0;
  $requested_information_burned_total = 0;
  $requested_information_type = "null";
  $requested_information_character = "null";
  $requested_information_meaning = "null";
  $requested_information_onyomi = "null";
  $requested_information_kunyomi = "null";
  $requested_information_important_reading = "null";
  $requested_information_percentage = "null";
  $requested_information_kana = "null";

$vals = array($api_key, $user_information_username, $user_information_gravatar, $user_information_level, $requested_information_radicals_progress, $requested_information_radicals_total, $requested_information_kanji_progress, $requested_information_kanji_total, $requested_information_apprentice_radicals, $requested_information_apprentice_kanji, $requested_information_apprentice_vocabulary, $requested_information_apprentice_total, $requested_information_guru_radicals, $requested_information_guru_kanji, $requested_information_guru_vocabulary, $requested_information_guru_total, $requested_information_master_radicals, $requested_information_master_kanji, $requested_information_master_vocabulary, $requested_information_master_total, $requested_information_enlighten_radicals, $requested_information_enlighten_kanji, $requested_information_enlighten_vocabulary, $requested_information_enlighten_total, $requested_information_burned_radicals, $requested_information_burned_kanji, $requested_information_burned_vocabulary, $requested_information_burned_total, $requested_information_type, $requested_information_character, $requested_information_meaning, $requested_information_onyomi, $requested_information_kunyomi, $requested_information_important_reading, $requested_information_percentage, $requested_information_kana);
$db->execute('INSERT INTO wanikani (api_key, user_information_username, user_information_gravatar, user_information_level, requested_information_radicals_progress, requested_information_radicals_total, requested_information_kanji_progress, requested_information_kanji_total, requested_information_apprentice_radicals, requested_information_apprentice_kanji, requested_information_apprentice_vocabulary, requested_information_apprentice_total, requested_information_guru_radicals, requested_information_guru_kanji, requested_information_guru_vocabulary, requested_information_guru_total, requested_information_master_radicals, requested_information_master_kanji, requested_information_master_vocabulary, requested_information_master_total, requested_information_enlightened_radicals, requested_information_enlightened_kanji, requested_information_enlightened_vocabulary, requested_information_enlightened_total, requested_information_burned_radicals, requested_information_burned_kanji, requested_information_burned_vocabulary, requested_information_burned_total, requested_information_type, requested_information_character, requested_information_meaning, requested_information_onyomi, requested_information_kunyomi, requested_information_important_reading, requested_information_percentage, requested_information_kana) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', $vals);
}
?>
<div class="add-api-blackout-AF"></div>
<div class="popup-add-api-AF">
  <?php if ($Exist){ ?>
    <h3>Your API Key already exists!</h3>
    <p>Please wait for up to an hour for your account to appear on this site :)</p>
    <?php } else { ?>
    <h3>Your API Key has been added!</h3>
    <p>Thanks for adding your API Key please wait up to an hour for your account to show in results :)</p>
    <?php } ?>
    <div class="api-add-btn-red btn"><span>Exit</span></div>
</div>

<?php
}else if ($func === "delete"){

$db->delete('wanikani', array('api_key' => $api_key));
?>
  <div class="add-api-blackout-AF"></div>
  <div class="popup-add-api-AF">
      <h3>Your API Key has been Deleted!</h3>
      <p>Thanks For Testing Out Classroom!</p>
      <div class="api-add-btn-red btn"><span>Exit</span></div>
  </div>

  <?php
} else {

}


?>

<!-- Create single div loader -->
<div class="add-api">
    <p><?php echo $text ?></p>
</div>
<div class="add-api-blackout"></div>
<div class="popup-add-api">
    <h3>Add Your API Key</h3>
    <p>Paste your API key below:</p>
    <input class="u-i-api-key" type="text" value="" name="apikey">
    <div class="api-add-btn btn"><span>Add Me!</span></div>
    <div class="api-add-btn-red btn"><span>Cancel</span></div>
</div>
