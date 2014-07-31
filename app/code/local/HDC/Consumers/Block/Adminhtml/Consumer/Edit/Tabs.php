<?php
class HDC_Consumers_Block_Adminhtml_Consumer_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("consumer_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("consumers")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("consumers")->__("Item Information"),
				"title" => Mage::helper("consumers")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("consumers/adminhtml_consumer_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
