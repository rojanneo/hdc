<?php   
class HDC_Faq_Block_Detail extends Mage_Core_Block_Template{   


public function __construct()
{
	$faq_id = $this->getRequest()->getParam('id');
	$dataset = Mage::getModel('faq/faq')->load($faq_id);
	$this->setDataset($dataset);
}


}