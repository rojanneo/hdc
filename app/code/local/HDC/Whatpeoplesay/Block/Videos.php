<?php
class HDC_Whatpeoplesay_Block_Videos extends Mage_Core_Block_Template{

	public function __construct()
	{
		parent::__construct();
		$dataset = Mage::getModel('whatpeoplesay/whatpeoplesay')->getCollection()->addFieldToFilter('type', 'videos');
		$this->setDatasets($dataset);
	}
}
?>