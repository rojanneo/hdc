<?php
class HDC_Consumers_Model_Mysql4_Consumer extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("consumers/consumer", "consumer_id");
    }
}