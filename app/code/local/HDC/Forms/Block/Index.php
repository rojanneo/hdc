<?php   
class HDC_Forms_Block_Index extends Mage_Core_Block_Template{   



public function __construct()
{
	$dataset = Mage::getModel('forms/form')->getCollection();
	$this->setDataset($dataset);
}

}