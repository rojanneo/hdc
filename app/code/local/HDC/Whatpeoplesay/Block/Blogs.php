<?php
class HDC_Whatpeoplesay_Block_Blogs extends Mage_Core_Block_Template{

	public function __construct()
	{
		parent::__construct();
		$dataset = Mage::getModel('whatpeoplesay/whatpeoplesay')->getCollection()->addFieldToFilter('type', 'blogs');
		$this->setDatasets($dataset);
	}
}
?>