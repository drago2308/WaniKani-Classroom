<?php
namespace Concrete\Package\RailgunPrototype;

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;
use BlockType;
use Core;

defined('C5_EXECUTE') or die (_("Access Denied."));

class Controller extends Package {

    protected $pkgHandle = 'railgun_prototype';
    protected $appVersionRequired = '5.7.1';
    protected $pkgVersion = '1.1.0';

    public function getPackageDescription(){
        return t("Unparraelled Performance, HTTP/2, Modular By Design, Hotswap Core Upgradeablility Built In");
    }

    public function getPackageName(){
        return t("Railgun Prototype");
    }

    public function install(){
        $pkg = parent::install();
        Theme::add('railgun_prototype', $pkg);
    }

    public function on_start(){
        //Add Stuff to asset Package: Experimental Saving Space (google likes it???)
        //Incude the settings
        include('packages/railgun_prototype/settings.php');
        if ($combineAndMinify){
        //Setup the asset Instance
        $al = \Concrete\Core\Asset\AssetList::getInstance();
        // 'Type of asset', 'name of asset', 'place or asset eg. themes/js/design-script.js', 'array() for options', 'package handle';
        // HHHHEEERE WE GOO! よーし
        if ($jQuery3Migrate){
        $al->register(
          'javascript', 'jquery3migrate', $versionPathAssets . '/plugins/jquery3/js/jquery3migrate.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($jQuery3){
        $al->register(
          'javascript', 'jquery3', $versionPathAssets . '/plugins/jquery3/js/jquery3.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($jQuery3slim){
        $al->register(
          'javascript', 'jquery3slim', $versionPathAssets . '/plugins/jquery3slim/js/jquery3slim.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($jQuery2){
        $al->register(
          'javascript', 'jquery2', $versionPathAssets . '/plugins/jquery2/js/jquery2.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($bootstrap4){
        $al->register(
          'javascript', 'tether', $versionPathAssets . '/plugins/bootstrap4' . $bootstrap4ver . '/js/tether.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        $al->register(
          'javascript', 'bootstrap4', $versionPathAssets . '/plugins/bootstrap4' . $bootstrap4ver . '/js/bootstrap.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($bootstrap3){
        $al->register(
          'javascript', 'tether', $versionPathAssets . '/plugins/bootstrap3/js/tether.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        $al->register(
          'javascript', 'bootstrap3', $versionPathAssets . '/plugins/bootstrap3/js/bootstrap.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($animeJS){
        $al->register(
          'javascript', 'animejs', $versionPathAssets . '/plugins/animejs/js/anime.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($materialRipple){
        $al->register(
          'javascript', 'material', $versionPathAssets . '/plugins/material_ripple/js/material.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($scrollreveal){
        $al->register(
          'javascript', 'scrollreveal', $versionPathAssets . '/plugins/scroll_reveal/js/scrollreveal.min.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        // Finally The Custom Script
        $al->register(
          'javascript', 'design-script', 'themes/railgun_prototype/js/design-script.js', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );


        if ($boostrap4){
        $al->register(
          'css', 'bootstrap4', $versionPathAssets . '/plugins/bootstrap4' . $bootstrap4ver .'/css/bootstrap.min.css', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($boostrap3){
        $al->register(
          'css', 'bootstrap3', $versionPathAssets . '/plugins/bootstrap3/css/bootstrap.min.css', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($materialRipple){
        $al->register(
          'css', 'material', $versionPathAssets . '/plugins/material_ripple/css/ripple.css', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        if ($scrollreveal){
        $al->register(
          'css', 'scrollreveal', $versionPathAssets . '/plugins/scroll_reveal/css/scrollreveal.css', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        }
        // Finally The Custom Style
        $al->register(
          'css', 'design-style', 'themes/railgun_prototype/css/design-style.css', array('minify' => true, 'combine' => true), 'railgun_prototype'
        );
        // TA BUA DA DAN

        $al->registerGroup('railgun_prototype', array(
        //$jQuery3slim ? array('javascript', 'jquery3slim') : null,
        //$jQuery3migrate ? array('javascript', 'jquery3migrate') : null,
        //$jQuery3 ? array('javascript', 'jquery3') : null,
        //$bootstrap3 ? array('javascript', 'tether') : null,
        //$bootstrap4 ? array('javascript', 'tether') : null,
        //$bootstrap4 ? array('javascript', 'bootstrap4') : null,
        //$bootstrap3 ? array('javascript', 'bootstrap3') : null,
        $animeJS ? array('javascript', 'animejs') : null,
        $materialRipple ? array('javascript', 'material') : null,
        $scrollreveal ? array('javascript', 'scrollreveal') : null,
        //array('javascript', 'design-script'),

        //$bootstrap4 ? array('css', 'bootstrap4') : null,
        //$bootstrap3 ? array('css', 'bootstrap3') : null,
        $materialRipple ? array('css', 'material') : null,
        $scrollreveal ? array('css', 'scrollreveal') : null,
        //array('css', 'design-style')
        ));
        //OLD
        /*
        $al->registerGroup('railgun_prototype', array(
        $jQuery3slim ? array('javascript', 'jquery3slim') : null,
        if($jQuery3migrate) { array('javascript', 'jquery3migrate')},
        if($jQuery3) { array('javascript', 'jquery3')},
        if($bootstrap3 || $bootstrap4) { array('javascript', 'tether')},
        if($bootstrap4) { array('javascript', 'bootstrap4')},
        if($bootstrap3) { array('javascript', 'bootstrap3')},
        if($animeJS) { array('javascript', 'animejs')},
        if($materialRipple) { array('javascript', 'material')},
        if($scrollreveal) { array('javascript', 'scrollreveal')},
          array('javascript', 'design-script'),

        if($bootstrap4) { array('css', 'bootstrap4')},
        if($bootstrap3) { array('css', 'bootstrap3')},
        if($materialRipple) { array('css', 'material')},
        if($scrollreveal) { array('css', 'scrollreveal')},
          array('css', 'design-style')
        ));*/
      }
    }


}
