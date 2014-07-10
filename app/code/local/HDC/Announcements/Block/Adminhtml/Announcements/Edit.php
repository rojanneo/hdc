<?php
	
class HDC_Announcements_Block_Adminhtml_Announcements_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "announcement_id";
				$this->_blockGroup = "announcements";
				$this->_controller = "adminhtml_announcements";
				$this->_updateButton("save", "label", Mage::helper("announcements")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("announcements")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("announcements")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("announcements_data") && Mage::registry("announcements_data")->getId() ){

				    return Mage::helper("announcements")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("announcements_data")->getId()));

				} 
				else{

				     return Mage::helper("announcements")->__("Add Item");

				}
		}

		protected function _prepareLayout() {
    parent::_prepareLayout();
    if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
        $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
    }
}
}