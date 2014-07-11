<?php
class HDC_Photogallery_Model_Mysql4_Photogallery extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("photogallery/photogallery", "photo_id");
    }
}