<?php
die('here');
class HDC_Announcements_Block_Announcement extends Mage_Core_Block_Template{

	public function __construct()
	{
		parent::__construct();
		$count = Mage::getStoreConfig('announcements/general/visible_count');
		echo $count;die;
		$dataset = Mage::getModel('announcements/announcements')->getCollection()->addFieldToFilter('enabled',1);
		$this->setDatasets($dataset);
	}
}
?>