<?php

namespace Application\Block\WanikaniAddapi;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Page\Page;
use Core;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController
{

    protected $btTable = "btAddApi";
    protected $btInterfaceWidth = "350";
    protected $btInterfaceHeight = "240";
    protected $btDefaultSet = 'wanikani';

    public function getBlockTypeName()
    {
        return t('Add Api Button');
    }

    public function validate($data)
    {
        /*$e = Core::make('error');
        if (!$data['property_state']) {
            $e->add(t('You must put something in the State'));
        }
        return $e;*/
    }

    public function getBlockTypeDescription()
    {
        return t('Adds Option for user API addition');
    }

    public function save($data)
    {
        parent::save($data);
    }

    public function view(){

      //$this->set('linkURL', $this->getLinkURL());
    }

    /**
     * @return int
     */
/*    public function getInternalLinkCID()
    {
        return $this->link;
    }
*/
    /**
     * @return string
     */
  /*  public function getLinkURL()
    {
       $linkUrl = '';
            $linkToC = Page::getByID($this->link);
            if (is_object($linkToC) && !$linkToC->isError()) {
                $linkUrl = $linkToC->getCollectionLink();
            }

        return $linkUrl;
    }
    */
}
