<?php
class HDC_Whatpeoplesay_Block_Onlinediscussions extends Mage_Core_Block_Template{

	public function __construct()
	{
		parent::__construct();
		$dataset = Mage::getModel('whatpeoplesay/whatpeoplesay')->getCollection()->addFieldToFilter('type', 'online discussions');
		$this->setDatasets($dataset);
	}
}
?>