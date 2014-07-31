<?php
	
class HDC_Consumers_Block_Adminhtml_Consumer_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "consumer_id";
				$this->_blockGroup = "consumers";
				$this->_controller = "adminhtml_consumer";
				$this->_updateButton("save", "label", Mage::helper("consumers")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("consumers")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("consumers")->__("Save And Continue Edit"),
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
				if( Mage::registry("consumer_data") && Mage::registry("consumer_data")->getId() ){

				    return Mage::helper("consumers")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("consumer_data")->getId()));

				} 
				else{

				     return Mage::helper("consumers")->__("Add Item");

				}
		}
}