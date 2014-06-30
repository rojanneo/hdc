<?php
class HDC_Whatpeoplesay_Block_Adminhtml_Whatpeoplesay_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("whatpeoplesay_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("whatpeoplesay")->__("Link"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("whatpeoplesay")->__("Link Information"),
				"title" => Mage::helper("whatpeoplesay")->__("Link Information"),
				"content" => $this->getLayout()->createBlock("whatpeoplesay/adminhtml_whatpeoplesay_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
