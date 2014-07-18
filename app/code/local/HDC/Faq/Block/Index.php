<?php   
class HDC_Faq_Block_Index extends Mage_Core_Block_Template{   



public function __construct()
{
	$model = Mage::getModel('faq/faq')->getCollection();
	$this->setDataset($model);
}

}