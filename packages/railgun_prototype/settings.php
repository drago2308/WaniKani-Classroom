
<?php defined('C5_EXECUTE') or die("Access Denied.");

//--------------------------------------------------------------------------------//
//				|| Railgun Prototype Settings || Version 1.1.0 ||
//				|| Code by Drew Hutton || 27.1.2017 (c) || Updated 27.1.2017 ||
//
//				Purpose of this is to create a truly developer friendly concrete 5 theme that
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


// Start Setttings To be edited by developers

// Defaults are as follows
// Use latest version in versions file
// Jquery 3
// Bootstrap 4a5
// Plugins Disabled


//GLOBAL Settings (these settings are experimental)

$optimizeForHTTP2 = true;
$optimizeForHTTP1 = false;
$combineAndMinify = true;

// Version (find latest if not user defined)

$version = '1.0.0';
$useDefinedVersion = true;
$versionsInstalled = array();

if ($useDefinedVersion == false){
  foreach(glob('packages/railgun_prototype/core/*', GLOB_ONLYDIR) as $dir) {
    $dir = str_replace('packages/railgun_prototype/core/', '', $dir);
    array_push($versionsInstalled,$dir);
}
if ($versionsInstalled[0] != null){
    $version = $versionsInstalled[sizeof($versionsInstalled) - 1];
}else{
  $version = '1.0.0';
}
//Reset Array
$versionsInstalled = [];
}else {
  $version = $version;
}

//Setup the version path
$versionPath = 'packages/railgun_prototype/core/' . $version;
$versionPathAssets = 'core/' . $version;

//Testing Purposes
//echo ($versionPath);

//Font
$font = 'Source+Sans+Pro';
//URL
$baseURL = 'http://www.website.com.au/';
//Bootstrap Switch and version (text after 4 eg. boostrap4XX)
$bootstrap4 = true;
$bootstrap4ver = 'a5';
$bootstrap3 = false;

//Jquery
$jQuery2 = true;
$jQuery3 = false;
$jQuery3Slim = false;
$jQuery3Migrate = false;

$useJQuery2OnEditMode = true;

// Plugins

//Anime JS switch
$animeJS = false;

//Material Design Ripple
$materialRipple = false;

//Off Canvas
$offcanvas = false;

//Scroll Reveal
$scrollreveal = false;



//---------------------------------------------------------------------------------//
