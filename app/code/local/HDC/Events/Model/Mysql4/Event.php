<?php
class HDC_Events_Model_Mysql4_Event extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("events/event", "event_id");
    }
}