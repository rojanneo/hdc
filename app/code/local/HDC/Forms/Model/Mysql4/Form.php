<?php
class HDC_Forms_Model_Mysql4_Form extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("forms/form", "form_id");
    }
}