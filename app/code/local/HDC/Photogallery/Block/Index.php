<?php   
class HDC_Photogallery_Block_Index extends Mage_Core_Block_Template{   

public function __construct()
{
	parent::__construct();
	$collection = Mage::getModel('photogallery/photogallery')->getCollection();
	$this->setDatasets($collection);
}



}