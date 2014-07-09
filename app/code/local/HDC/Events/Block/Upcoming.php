<?php
class HDC_Events_Block_Upcoming extends Mage_Core_Block_Template{

	public function __construct()
	{
		parent::__construct();
		$dataset = Mage::getModel('events/event')->getCollection();
		$this->setDatasets($dataset);
	}
}
?>