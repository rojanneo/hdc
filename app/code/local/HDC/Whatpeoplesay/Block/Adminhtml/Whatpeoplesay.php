<?php


class HDC_Whatpeoplesay_Block_Adminhtml_Whatpeoplesay extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_whatpeoplesay";
	$this->_blockGroup = "whatpeoplesay";
	$this->_headerText = Mage::helper("whatpeoplesay")->__("Whatpeoplesay Manager");
	$this->_addButtonLabel = Mage::helper("whatpeoplesay")->__("Add New Item");
	parent::__construct();
	
	}

}