<?php

namespace Concrete\Package\RailgunPrototype\Theme\RailgunPrototype;

use Concrete\Core\Area\Layout\Preset\Provider\ThemeProviderInterface;
use User;
use Loader;

class PageTheme extends \Concrete\Core\Page\Theme\Theme implements ThemeProviderInterface
{
    public function registerAssets()
    {
        include('packages/railgun_prototype/settings.php');

        //$this->requireAsset('css', 'font-awesome');
        $this->providesAsset('javascript', 'jquery');
        if ($combineAndMinify){
        $this->requireAsset('railgun_prototype');
        }
        // Chose what Bootstrap to use depending if logged in or not
        $u = new User();
        if ($u->isLoggedIn()){

            //$this->requireAsset('javascript', 'jquery');
        }else {
          //$this->providesAsset('javascript', 'jquery');
        }
        $this->providesAsset('javascript', 'bootstrap/*');
        $this->providesAsset('css', 'bootstrap/*');
    }

    protected $pThemeGridFrameworkHandle = 'bootstrap3';

    public function getThemeName()
    {
        return t('Railgun Prototype');
    }

    public function getThemeDescription()
    {
        return t('Railgun Like Performance optimized for HTTP/2 and Cloudflare Railgun, Bootstrap4a6 Based, Jquery3 Supported');
    }

    public function getThemeAreaLayoutPresets()
    {
        $presets = array(
            array(
                'handle' => 'left_sidebar',
                'name' => 'Left Sidebar',
                'container' => '<div class="row"></div>',
                'columns' => array(
                    '<div class="col-sm-4"></div>',
                    '<div class="col-sm-8"></div>'
                ),
            ),
            array(
                'handle' => 'right_sidebar',
                'name' => 'Right Sidebar',
                'container' => '<div class="row"></div>',
                'columns' => array(
                    '<div class="col-sm-8"></div>',
                    '<div class="col-sm-4"></div>'
                ),
            ),
					array(
                'handle' => '3_piece',
                'name' => '3 Piece',
                'container' => '<div class="row"></div>',
                'columns' => array(
                    '<div class="col-sm-4"></div>',
                    '<div class="col-sm-4"></div>',
										'<div class="col-sm-4"></div>'
                ),
            )
        );
        return $presets;
    }
}
