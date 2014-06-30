<?php
class HDC_Whatpeoplesay_Model_Mysql4_Whatpeoplesay extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("whatpeoplesay/whatpeoplesay", "post_id");
    }
}