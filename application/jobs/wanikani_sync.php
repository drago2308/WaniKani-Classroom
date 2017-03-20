<?php
namespace Application\Job;
use \Concrete\Core\Job\Job as AbstractJob;

class WanikaniSync extends AbstractJob
{

    public function getJobName()
    {
        return t("Sync WaniKani Data");
    }

    public function getJobDescription()
    {
        return t("Takes All Entered API Keys and querys for information to safe to SQL");
    }

    public function run()
    {

      //Creation of table script
      /* CREATE TABLE IF NOT EXISTS wanikani (
      						api_key varchar(255) NOT NULL,
      						user_information_username varchar(255) NOT NULL,
      						user_information_gravatar varchar(255) NOT NULL,
      						user_information_level varchar(255) NOT NULL,
      						requested_information_radicals_progress int(12) NOT NULL,
      						requested_information_radicals_total int(12) NOT NULL,
      						requested_information_kanji_progress int(12) NOT NULL,
      						requested_information_kanji_total int(12) NOT NULL,
      						requested_information_apprentice_radicals int(12) NOT NULL,
      						requested_information_apprentice_kanji int(12) NOT NULL,
      						requested_information_apprentice_vocabulary int(12) NOT NULL,
      						requested_information_apprentice_total int(12) NOT NULL,
      						requested_information_guru_radicals int(12) NOT NULL,
      						requested_information_guru_kanji int(12) NOT NULL,
      						requested_information_guru_vocabulary int(12) NOT NULL,
      						requested_information_guru_total int(12) NOT NULL,
      						requested_information_master_radicals int(12) NOT NULL,
      						requested_information_master_kanji int(12) NOT NULL,
      						requested_information_master_vocabulary int(12) NOT NULL,
      						requested_information_master_total int(12) NOT NULL,
      						requested_information_enlightened_radicals int(12) NOT NULL,
      						requested_information_enlightened_kanji int(12) NOT NULL,
      						requested_information_enlightened_vocabulary int(12) NOT NULL,
      						requested_information_enlightened_total int(12) NOT NULL,
      						requested_information_burned_radicals int(12) NOT NULL,
      						requested_information_burned_kanji int(12) NOT NULL,
      						requested_information_burned_vocabulary int(12) NOT NULL,
      						requested_information_burned_total int(12) NOT NULL,
      						requested_information_type varchar(255) NOT NULL,
      						requested_information_character varchar(255) NOT NULL,
      						requested_information_meaning varchar(255) NOT NULL,
      						requested_information_onyomi varchar(255) NOT NULL,
      						requested_information_kunyomi varchar(255) NOT NULL,
      						requested_information_important_reading varchar(255) NOT NULL,
      						requested_information_percentage varchar(255) NOT NULL,
                  requested_information_kana varchar(255) NOT NULL,
      						PRIMARY KEY  (api_key)
      					)
                */

        $db = \Database::connection();


        //Variables
        //Get API Keys from SQL
        $sql_query = 'SELECT api_key FROM wanikani';

        $stmt = $db->prepare($sql_query);
        $stmt->execute();

        $apiKeys = $stmt->fetchAll();


        //Loop through accounts and set their data (using their api keys as an identifier)
        // for each api key {
        $i = 0;
        foreach ($apiKeys as $key){
        foreach ($apiKeys[$i] as $key){



        //send first argument
        $q1 = file_get_contents('https://www.wanikani.com/api/user/' . $key . '/level-progression');
        $q1 = json_decode($q1, true);
        //level-progression

        //Save Variables to SQL
        $user_information_error = $q1['error']['code'];
        $user_information_username = $q1['user_information']['username'];//user_information_username
        $user_information_gravatar = $q1['user_information']['gravatar'];//user_information_gravatar
        $user_information_level = $q1['user_information']['level'];//user_information_level
        $requested_information_radicals_progress = $q1['requested_information']['radicals_progress'];//requested_information_radicals_progress
        $requested_information_radicals_total = $q1['requested_information']['radicals_total'];//requested_information_radicals_total
        $requested_information_kanji_progress = $q1['requested_information']['kanji_progress'];//requested_information_kanji_progress
        $requested_information_kanji_total = $q1['requested_information']['kanji_total'];//requested_information_kanji_total

        //Send second arguments
        //srs-distribution
        $q2 = file_get_contents('https://www.wanikani.com/api/user/' . $key . '/srs-distribution');
        $q2 = json_decode($q2, true);
        // Setup PHP Variables

        $requested_information_apprentice_radicals = $q2['requested_information']['apprentice']['radicals'];//requested_information_apprentice_radicals
        $requested_information_apprentice_kanji = $q2['requested_information']['apprentice']['kanji'];//requested_information_apprentice_kanji
        $requested_information_apprentice_vocabulary = $q2['requested_information']['apprentice']['vocabulary'];//requested_information_apprentice_vocabulary
        $requested_information_apprentice_total = $q2['requested_information']['apprentice']['total'];//requested_information_apprentice_total

        $requested_information_guru_radicals = $q2['requested_information']['guru']['radicals'];//requested_information_guru_radicals
        $requested_information_guru_kanji = $q2['requested_information']['guru']['kanji'];//requested_information_guru_kanji
        $requested_information_guru_vocabulary = $q2['requested_information']['guru']['vocabulary'];//requested_information_guru_vocabulary
        $requested_information_guru_total = $q2['requested_information']['guru']['total'];//requested_information_guru_total

        $requested_information_master_radicals = $q2['requested_information']['master']['radicals'];//requested_information_master_radicals
        $requested_information_master_kanji = $q2['requested_information']['master']['kanji'];//requested_information_master_kanji
        $requested_information_master_vocabulary = $q2['requested_information']['master']['vocabulary'];//requested_information_master_vocabulary
        $requested_information_master_total = $q2['requested_information']['master']['total'];//requested_information_master_total

        $requested_information_enlighten_radicals = $q2['requested_information']['enlighten']['radicals'];//requested_information_enlightened_radicals
        $requested_information_enlighten_kanji = $q2['requested_information']['enlighten']['kanji'];//requested_information_enlightened_kanji
        $requested_information_enlighten_vocabulary = $q2['requested_information']['enlighten']['vocabulary'];//requested_information_enlightened_vocabulary
        $requested_information_enlighten_total = $q2['requested_information']['enlighten']['total'];//requested_information_enlightened_total

        $requested_information_burned_radicals = $q2['requested_information']['burned']['radicals'];//requested_information_burned_radicals
        $requested_information_burned_kanji = $q2['requested_information']['burned']['kanji'];//requested_information_burned_kanji
        $requested_information_burned_vocabulary = $q2['requested_information']['burned']['vocabulary'];//requested_information_burned_vocabulary
        $requested_information_burned_total = $q2['requested_information']['burned']['total'];//requested_information_burned_total

        //Send Third argument
        //critical-items/75
        $q3 = file_get_contents('https://www.wanikani.com/api/user/' . $key . '/critical-items/75');
        $q3 = json_decode($q3, true);

        $requested_information_type = $q3['requested_information'][0]['type'];//requested_information[0]_type
        //if type is kanji then {
        if ($requested_information_type === 'kanji'){
        $requested_information_character = $q3['requested_information'][0]['character'];//requested_information[0]_character
        $requested_information_meaning = $q3['requested_information'][0]['meaning'];//requested_information[0]_meaning
        $requested_information_onyomi = $q3['requested_information'][0]['onyomi'];//requested_information[0]_onyomi
        $requested_information_kunyomi = $q3['requested_information'][0]['kunyomi'];//requested_information[0]_kunyomi
        $requested_information_important_reading = $q3['requested_information'][0]['important_reading'];//requested_information[0]_important reading
        $requested_information_percentage = $q3['requested_information'][0]['percentage'];//requested_information[0]_percentage
        $requested_information_kana = 'null';
        }
        // }

        //if type is vocabulary then {
        if ($requested_information_type === 'vocabulary'){
        $requested_information_character = $q3['requested_information'][0]['character'];//requested_information[0]_character
        $requested_information_meaning = $q3['requested_information'][0]['meaning'];//requested_information[0]_meaning
        $requested_information_kana = $q3['requested_information'][0]['kana'];//requested_information[0]_kana
        $requested_information_kunyomi = 'null';
        $requested_information_onyomi = 'null';
        $requested_information_important_reading = 'null';
        $requested_information_percentage = $q3['requested_information'][0]['percentage'];//requested_information[0]_percentage

        }
        //}

        if ($requested_information_type === 'radical'){
        $requested_information_character = 'null';
        $requested_information_meaning = 'null';
        $requested_information_kana = 'null';
        $requested_information_kunyomi = 'null';
        $requested_information_onyomi = 'null';
        $requested_information_important_reading = 'null';
        $requested_information_percentage = 'null';

        }

        //Standardize Variables!
        //Query 1
        if ($user_information_username === null) { $user_information_username = 'null'; };
        if ($user_information_gravatar === null) { $user_information_gravatar = 'null'; };
        if ($user_information_level === null) { $user_information_level = 'null'; };
        if ($requested_information_radicals_progress === null) { $requested_information_radicals_progress = 'null'; };
        if ($requested_information_radicals_total === null) { $requested_information_radicals_total = 'null'; };
        if ($requested_information_kanji_progress === null) { $requested_information_kanji_progress = 'null'; };
        if ($requested_information_kanji_total === null) { $requested_information_kanji_total = 'null'; };
        //Query 2
        if ($requested_information_apprentice_radicals === null) { $requested_information_apprentice_radicals = 'null'; };
        if ($requested_information_apprentice_kanji === null) { $requested_information_apprentice_kanji = 'null'; };
        if ($requested_information_apprentice_vocabulary === null) { $requested_information_apprentice_vocabulary = 'null'; };
        if ($requested_information_apprentice_total === null) { $requested_information_apprentice_total = 'null'; };

        if ($requested_information_guru_radicals === null) { $requested_information_guru_radicals = 'null';};
        if ($requested_information_guru_kanji === null) { $requested_information_guru_kanji = 'null';};
        if ($requested_information_guru_vocabulary === null) { $requested_information_guru_vocabulary = 'null';};
        if ($requested_information_guru_total === null) { $requested_information_guru_total = 'null';};

        if ($requested_information_master_radicals === null) { $requested_information_master_radicals = 'null';};
        if ($requested_information_master_kanji === null) { $requested_information_master_kanji = 'null';};
        if ($requested_information_master_vocabulary === null) { $requested_information_master_vocabulary = 'null';};
        if ($requested_information_master_total === null) { $requested_information_master_total = 'null';};

        if ($requested_information_enlighten_radicals === null) { $requested_information_enlighten_radicals = 'null';};
        if ($requested_information_enlighten_kanji === null) { $requested_information_enlighten_kanji = 'null';};
        if ($requested_information_enlighten_vocabulary === null) { $requested_information_enlighten_vocabulary = 'null';};
        if ($requested_information_enlighten_total === null) { $requested_information_enlighten_total = 'null';};

        if ($requested_information_burned_radicals === null) { $requested_information_burned_radicals = 'null';};
        if ($requested_information_burned_kanji === null) { $requested_information_burned_kanji = 'null';};
        if ($requested_information_burned_vocabulary === null) { $requested_information_burned_vocabulary = 'null';};
        if ($requested_information_burned_total === null) { $requested_information_burned_total = 'null';};

        //Query 3
        if ($requested_information_type === null){ $requested_information_type = 'null';};
        if ($requested_information_character === null){ $requested_information_character = 'null';};
        if ($requested_information_meaning === null){ $requested_information_meaning = 'null';};
        if ($requested_information_onyomi === null){ $requested_information_onyomi = 'null';};
        if ($requested_information_kunyomi === null){ $requested_information_kunyomi = 'null';};
        if ($requested_information_important_reading === null){ $requested_information_important_reading = 'null';};
        if ($requested_information_percentage === null){ $requested_information_percentage = 'null';};
        if ($requested_information_kana === null){ $requested_information_kana = 'null';};


        //Only Delete the row if all 3 querys return true
        //For now delete row associated with key as updating is not possible
        if ($user_information_username === "null"){
        //  $sql_query = 'SELECT api_key FROM wanikani WHERE user_information_username = "null" ';

        //  $stmt = $db->prepare($sql_query);
        //  $stmt->execute();

        //  $badapikey = $stmt->fetchAll();
          $badapikey = $key;
          $db->delete('wanikani', array('api_key' => $badapikey));
        }else {
        if ($user_error === "403 Forbidden (Rate Limit Exceeded)"){

        }else{
        $db->delete('wanikani', array('api_key' => $key));

          //Save Variables to SQL (huge list)
          //Variables
          $vals = array($key, $user_information_username, $user_information_gravatar, $user_information_level, $requested_information_radicals_progress, $requested_information_radicals_total, $requested_information_kanji_progress, $requested_information_kanji_total, $requested_information_apprentice_radicals, $requested_information_apprentice_kanji, $requested_information_apprentice_vocabulary, $requested_information_apprentice_total, $requested_information_guru_radicals, $requested_information_guru_kanji, $requested_information_guru_vocabulary, $requested_information_guru_total, $requested_information_master_radicals, $requested_information_master_kanji, $requested_information_master_vocabulary, $requested_information_master_total, $requested_information_enlighten_radicals, $requested_information_enlighten_kanji, $requested_information_enlighten_vocabulary, $requested_information_enlighten_total, $requested_information_burned_radicals, $requested_information_burned_kanji, $requested_information_burned_vocabulary, $requested_information_burned_total, $requested_information_type, $requested_information_character, $requested_information_meaning, $requested_information_onyomi, $requested_information_kunyomi, $requested_information_important_reading, $requested_information_percentage, $requested_information_kana);
          // Database executuion
          $db->execute('INSERT INTO wanikani (api_key, user_information_username, user_information_gravatar, user_information_level, requested_information_radicals_progress, requested_information_radicals_total, requested_information_kanji_progress, requested_information_kanji_total, requested_information_apprentice_radicals, requested_information_apprentice_kanji, requested_information_apprentice_vocabulary, requested_information_apprentice_total, requested_information_guru_radicals, requested_information_guru_kanji, requested_information_guru_vocabulary, requested_information_guru_total, requested_information_master_radicals, requested_information_master_kanji, requested_information_master_vocabulary, requested_information_master_total, requested_information_enlightened_radicals, requested_information_enlightened_kanji, requested_information_enlightened_vocabulary, requested_information_enlightened_total, requested_information_burned_radicals, requested_information_burned_kanji, requested_information_burned_vocabulary, requested_information_burned_total, requested_information_type, requested_information_character, requested_information_meaning, requested_information_onyomi, requested_information_kunyomi, requested_information_important_reading, requested_information_percentage, requested_information_kana) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', $vals);
        }
        }
          //sleep(3);
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
         $i += 1;
       }

         return t('Successfully Updated ' . sizeof($apiKeys) . ' Accounts!');
       }
}
