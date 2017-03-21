<?php defined('C5_EXECUTE') or die(_("Access Denied.")) ?>

<!-- Search -->

<?php if ($search){ ?>
  <div class="search-container">
      <div class="search-form-container">
        <!-- Singular search from, for searching username -->
      </div>
  </div>


<?php } ?>
<!-- Listen for Events -->

<!-- Grid -->
<div class="grid-container">

<?php
//Database
$db = \Database::connection();

$search_name = null;

if (isset($_GET['name'])) {
  $search_name = $_GET['name'];
  if ($search_name == "undefined"){
    $search_name = "%";
  }
}else{
  $search_name = "%";
}
/*
if (isset($_GET['min_price'])) {
  $search_min_price = $_GET['min_price'];
  if($search_min_price == "undefined"){
    $search_min_price = '0';
  }
}else{
  $search_min_price = '0';
}*/


$sql_query = 'SELECT * FROM wanikani WHERE user_information_username LIKE :name';
//PARAMS
if($get_url){
$params['name'] = $search_name;
/*$params['category'] = $search_property_category;
$params['max'] = $search_max_price;
$params['min'] = $search_min_price;
$params['property_id'] = $search_property_id;
$params['state'] = $property_state;*/
}else{
  $params['name'] = "%";
/*  $params['category'] = "%";
  $params['max'] = '999999999999';
  $params['min'] = '0';
  $params['property_id'] = '%';
  $params['state'] = $property_state;*/
}


$stmt = $db->prepare($sql_query);
$stmt->execute($params);

$wanikanidata = $stmt->fetchAll();

usort($wanikanidata, function($a, $b) {
    return $a['user_information_level'] - $b['user_information_level'];
});

$wanikanidata = array_reverse($wanikanidata);

  echo '<div id="default-grid-container" data-animation="hierarchical-display">';
  //Grab Users (per Usersrs stored in list);

  //IF wanikanidata array is none diasplay message Else continue with everything //

  if (sizeof($wanikanidata) != 0){


  //GET PROPERTYS
  foreach ($wanikanidata as $row){

    //Check if user has information set?
    if($row['user_information_username'] === 'null'){

    }else{

    $loop += 1;
    //GET VARIABLES
    $user_information_api_key = $row['api_key'];
    $user_information_username = $row['user_information_username'];
    $user_information_gravatar = $row['user_information_gravatar'];
    $user_information_level = $row['user_information_level'];
    $requested_information_radicals_progress = $row['requested_information_radicals_progress'];
    $requested_information_radicals_total = $row['requested_information_radicals_total'];
    $requested_information_kanji_progress = $row['requested_information_kanji_progress'];
    $requested_information_kanji_total = $row['requested_information_kanji_total'];
    $requested_information_apprentice_radicals = $row['requested_information_apprentice_radicals'];
    $requested_information_apprentice_kanji = $row['requested_information_apprentice_kanji'];
    $requested_information_apprentice_vocabulary = $row['requested_information_apprentice_vocabulary'];
    $requested_information_apprentice_total = $row['requested_information_apprentice_total'];
    $requested_information_guru_radicals = $row['requested_information_guru_radicals'];
    $requested_information_guru_kanji = $row['requested_information_guru_kanji'];
    $requested_information_guru_vocabulary = $row['requested_information_guru_vocabulary'];
    $requested_information_guru_total = $row['requested_information_guru_total'];
    $requested_information_master_radicals = $row['requested_information_master_radicals'];
    $requested_information_master_kanji = $row['requested_information_master_kanji'];
    $requested_information_master_vocabulary = $row['requested_information_master_vocabulary'];
    $requested_information_master_total = $row['requested_information_master_total'];
    $requested_information_enlighten_radicals = $row['requested_information_enlightened_radicals'];
    $requested_information_enlighten_kanji = $row['requested_information_enlightened_kanji'];
    $requested_information_enlighten_vocabulary = $row['requested_information_enlightened_vocabulary'];
    $requested_information_enlighten_total = $row['requested_information_enlightened_total'];
    $requested_information_burned_radicals = $row['requested_information_burned_radicals'];
    $requested_information_burned_kanji = $row['requested_information_burned_kanji'];
    $requested_information_burned_vocabulary = $row['requested_information_burned_vocabulary'];
    $requested_information_burned_total = $row['requested_information_burned_total'];
    $requested_information_type = $row['requested_information_type'];
    $requested_information_character = $row['requested_information_character'];
    $requested_information_meaning = $row['requested_information_meaning'];
    $requested_information_onyomi = $row['requested_information_onyomi'];
    $requested_information_kunyomi = $row['requested_information_kunyomi'];
    $requested_information_important_reading = $row['requested_information_important_reading'];
    $requested_information_percentage = $row['requested_information_percentage'];
    $requested_information_kana = $row['requested_information_kana'];


    //FOR EACH
    //CREATE BOX
  //  echo '<div class="grid-item" id="' . $user_information_api_key . '">';

    echo '<div class="grid-item" id="' . $loop . '">';

    //Container for basic info
    echo '<div class="basic-info-container">';

    //PICTURE ON THE RIGHT https://www.gravatar.com/avatar/HASH
    echo '<div class="basic-info-img-container">';
    echo '<div class="basic-info-profile-img">';

    //echo '<img src="https://www.gravatar.com/avatar/'. $user_information_gravatar . '?s=200"/>';
    echo '<div class="basic-info-profile-img" data-bg="https://www.gravatar.com/avatar/'. $user_information_gravatar . '?s=200"></div>';

    echo '</div>';
    echo '</div>';

    //HEADING CONTAINER
    echo '<div class="basic-info-progress-container">';
    echo '<div class="basic-info-heading-container clearfix">';
    //NAME
    echo '<div class="basic-info-username">' . $user_information_username . '</div>';
    //LEVEL
    echo '<div class="basic-info-level">Level ' . $user_information_level . '</div>';
    //END HEADING CONTAINER
    echo '</div>';
    //RADICAL PROGRESS HEADER
    echo '<div class="basic-info-radical-header">Radical Progress: '. $requested_information_radicals_progress .'/'. $requested_information_radicals_total .'</div>';
    //RADICAL PROGRESS BAR
    $radicalvaluenow = round(($requested_information_radicals_progress / $requested_information_radicals_total) * 100);
    echo '<div class="basic-info-radical-progress progress"><div class="progress-bar progress-bar-radical" role="progressbar" style="width:' . $radicalvaluenow . '%" aria-valuenow="' . $requested_information_radicals_progress .'" aria-valuemin="0" aria-valuemax="' . $requested_information_radicals_total .'"></div></div>';

    //KANJI PROGRESS HEADER
    echo '<div class="basic-info-radical-header">Kanji Progress: '. $requested_information_kanji_progress .'/'. $requested_information_kanji_total .'</div>';
    //KANJI PROGRESS BAR
    $kanjivaluenow = round(($requested_information_kanji_progress / $requested_information_kanji_total) * 100);
    echo '<div class="basic-info-kanji-progress progress"><div class="progress-bar progress-bar-kanji" role="progressbar" style="width:' . $kanjivaluenow . '%" aria-valuenow="' . $requested_information_kanji_progress .'" aria-valuemin="0" aria-valuemax="' . $requested_information_kanji_total .'"></div></div>';
    //END CONTAINER FOR BASIC INFO
    echo '</div>';
    echo '</div>';

    //CONTAINER FOR EXTRA INFO
    echo '<div class="extra-info-container">';



    //CONTAINER DETAILED A G M E
    echo '<div class="extra-info-agme-container">';
    //CONTAINER TOP EGME

    echo '<div class="extra-info-agme-burned">';
    echo '<h5>'. $requested_information_burned_total .'</h5>';

    echo '<div class="extra-info-agme-burned-radicals">';
    echo '<h5>'. $requested_information_burned_radicals .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-burned-kanji">';
    echo '<h5>'. $requested_information_burned_kanji .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-burned-vocabulary">';
    echo '<h5>'. $requested_information_burned_vocabulary .'</h5>';
    echo '</div>';

    echo '</div>';
    

    echo '<div class="extra-info-agme-container-top">';
    //Apprentice
    echo '<div class="extra-info-agme-apprentice">';
    echo '<h5>'. $requested_information_apprentice_total .'</h5>';

    echo '<div class="extra-info-agme-apprentice-radicals">';
    echo '<h5>'. $requested_information_apprentice_radicals .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-apprentice-kanji">';
    echo '<h5>'. $requested_information_apprentice_kanji .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-apprentice-vocabulary">';
    echo '<h5>'. $requested_information_apprentice_vocabulary .'</h5>';
    echo '</div>';

    echo '</div>';


    //Guru
    echo '<div class="extra-info-agme-guru">';
    echo '<h5>'. $requested_information_guru_total .'</h5>';

    echo '<div class="extra-info-agme-guru-radicals">';
    echo '<h5>'. $requested_information_guru_radicals .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-guru-kanji">';
    echo '<h5>'. $requested_information_guru_kanji .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-guru-vocabulary">';
    echo '<h5>'. $requested_information_guru_vocabulary .'</h5>';
    echo '</div>';

    echo '</div>';


    //Master
    echo '<div class="extra-info-agme-master">';
    echo '<h5>'. $requested_information_master_total .'</h5>';

    echo '<div class="extra-info-agme-master-radicals">';
    echo '<h5>'. $requested_information_master_radicals .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-master-kanji">';
    echo '<h5>'. $requested_information_master_kanji .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-master-vocabulary">';
    echo '<h5>'. $requested_information_master_vocabulary .'</h5>';
    echo '</div>';

    echo '</div>';

    //Enlighten
    echo '<div class="extra-info-agme-enlighten">';
    echo '<h5>'. $requested_information_enlighten_total .'</h5>';

    echo '<div class="extra-info-agme-enlighten-radicals">';
    echo '<h5>'. $requested_information_enlighten_radicals .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-enlighten-kanji">';
    echo '<h5>'. $requested_information_enlighten_kanji .'</h5>';
    echo '</div>';

    echo '<div class="extra-info-agme-enlighten-vocabulary">';
    echo '<h5>'. $requested_information_enlighten_vocabulary .'</h5>';
    echo '</div>';

    echo '</div>';


    //END CONTAINER TOP AGME
    echo '</div>';



    //END CONTAINER FOR DETAILED A G M E
    echo '</div>';



    //CONTAINER left
    echo '<div class="extra-info-left-container">';
    echo '<div class="extra-info-title">Most Difficult Item:</div>';
    //MOST DIFFICULT ITEM
    //KANA OR CHARACTER

    if ($requested_information_character != 'null'){
      echo '<div class="extra-info-left-character">'. $requested_information_character .'</div>';
    }else {
      echo '<div class="extra-info-left-complete">Nothing to worry about yet</div>';
    }
    if ($requested_information_kana != 'null'){
      echo '<div class="extra-info-left-kana">'. $requested_information_kana .'</div>';
    }
    //MEANING
    if ($requested_information_character != 'null' || $requested_information_kana != 'null' ){
      echo '<div class="extra-info-left-meaning">'. $requested_information_meaning .'</div>';
    }
    //END CONTAINER LEFT
    echo '</div>';

    //CONTAINER RIGHT
    echo '<div class="extra-info-right-container">';



    //ON-YOMI (if has)
    if($requested_information_important_reading === "onyomi"){
      $onyomi_bold = 'style="font-weight: bold;"';
    }else {
      $onyomi_bold = '';
    }

    if($requested_information_important_reading === "kunyomi"){
      $kunyomi_bold = 'style="font-weight: bold;"';
    }else {
      $kunyomi_bold = '';
    }

    if ($requested_information_onyomi != 'null'){
    echo '<div class="extra-info-right-on-yomi" '. $onyomi_bold .'>on-yomi: '. $requested_information_onyomi .'</div>';
    }
    //KUN-YOMI (if has)
    if ($requested_information_kunyomi != 'null'){
    echo '<div class="extra-info-right-kun-yomi" '. $kunyomi_bold .'>kun-yomi: '. $requested_information_kunyomi .'</div>';
    }
    //PERCENTAGE CORRECT
    if ($requested_information_percentage != 'null'){
    echo '<div class="extra-info-right-percentage">Percent: '. $requested_information_percentage .'%</div>';
    }
    //END CONTAINER RIGHT
    echo '</div>';

    //END CONTAINER FOR EXTRA INFO
    echo '</div>';

    //END BOX
    echo '</div>';

  //CLEAR HISTORY
  $user_information_api_key = "null";
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

    }
    //End if Userinformation set
  }
// End If Statement
}else {
  echo '<div class="display-message" style="text-align: center; padding-top: 2rem;"><h1>Something Went Terribly Wrong (Or you search didnt yeild a result), Please Contact Yoroshi if this persists</h1><p><br/> <span class="lead">Use the search form above to search again!</span></p></div>';
}

//End default Grid
  echo '</div>';
?>

</div>

</div>
