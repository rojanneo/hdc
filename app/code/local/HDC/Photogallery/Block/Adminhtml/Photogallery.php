<?php


class HDC_Photogallery_Block_Adminhtml_Photogallery extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_photogallery";
	$this->_blockGroup = "photogallery";
	$this->_headerText = Mage::helper("photogallery")->__("Photogallery Manager");
	$this->_addButtonLabel = Mage::helper("photogallery")->__("Add New Item");
	parent::__construct();
	
	}

}