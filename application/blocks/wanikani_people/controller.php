<?php

namespace Application\Block\WanikaniPeople;

use Concrete\Core\Block\BlockController;
use Core;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController
{

    protected $btTable = "btWanikaniPeople";
    protected $btInterfaceWidth = "350";
    protected $btInterfaceHeight = "240";
    protected $btDefaultSet = 'wanikani';

    public function getBlockTypeName()
    {
        return t('Lists People from WaniKani');
    }

    public function validate($data)
    {
        $e = Core::make('error');
        if (!$data['wanikani_type']) {
            $e->add(t('You must put something in the Type'));
        }
        return $e;
    }

    public function getBlockTypeDescription()
    {
        return t('List People From WaniKani Classroom');
    }

    public function save($data)
    {
      //  $data['get_price'] = intval($data['get_price']);
      //  $data['get_url'] = intval($data['get_url']);
      //  $data['get_address'] = intval($data['get_address']);
      //  $data['get_quick_info'] = intval($data['get_quick_info']);
      //  $data['get_buttons'] = intval($data['get_buttons']);
      //  $data['show_agent'] = intval($data['show_agent']);
      //  $data['show_agent_2'] = intval($data['show_agent_2']);
      //  $data['show_agency'] = intval($data['show_agency']);
        $data['search'] = intval($data['search']);
        parent::save($data);
    }
}
