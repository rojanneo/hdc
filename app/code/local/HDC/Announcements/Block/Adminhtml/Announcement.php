<?php


class HDC_Announcements_Block_Adminhtml_Announcements extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_announcements";
	$this->_blockGroup = "announcements";
	$this->_headerText = Mage::helper("announcements")->__("Announcements Manager");
	$this->_addButtonLabel = Mage::helper("announcements")->__("Add New Item");
	parent::__construct();
	
	}

}