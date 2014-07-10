<?php
class HDC_Announcements_Model_Mysql4_Announcements extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("announcements/announcements", "announcement_id");
    }
}