<?php
class HDC_Photogallery_Block_Adminhtml_Photogallery_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("photogallery_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("photogallery")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("photogallery")->__("Item Information"),
				"title" => Mage::helper("photogallery")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("photogallery/adminhtml_photogallery_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
