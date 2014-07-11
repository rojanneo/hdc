<?php
	
class HDC_Photogallery_Block_Adminhtml_Photogallery_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "photo_id";
				$this->_blockGroup = "photogallery";
				$this->_controller = "adminhtml_photogallery";
				$this->_updateButton("save", "label", Mage::helper("photogallery")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("photogallery")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("photogallery")->__("Save And Continue Edit"),
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
				if( Mage::registry("photogallery_data") && Mage::registry("photogallery_data")->getId() ){

				    return Mage::helper("photogallery")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("photogallery_data")->getId()));

				} 
				else{

				     return Mage::helper("photogallery")->__("Add Item");

				}
		}
}