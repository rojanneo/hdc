<?php


class HDC_Consumers_Block_Adminhtml_Consumer extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_consumer";
	$this->_blockGroup = "consumers";
	$this->_headerText = Mage::helper("consumers")->__("Consumer Manager");
	$this->_addButtonLabel = Mage::helper("consumers")->__("Add New Item");
	parent::__construct();
	
	}

}