<?php
class HDC_Announcements_Block_Adminhtml_Announcements_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("announcements_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("announcements")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("announcements")->__("Item Information"),
				"title" => Mage::helper("announcements")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("announcements/adminhtml_announcements_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
