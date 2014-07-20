<?php


class HDC_Forms_Block_Adminhtml_Form extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_form";
	$this->_blockGroup = "forms";
	$this->_headerText = Mage::helper("forms")->__("Form Manager");
	$this->_addButtonLabel = Mage::helper("forms")->__("Add New Item");
	parent::__construct();
	
	}

}