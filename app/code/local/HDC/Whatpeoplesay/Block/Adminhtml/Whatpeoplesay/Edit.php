<?php
	
class HDC_Whatpeoplesay_Block_Adminhtml_Whatpeoplesay_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "post_id";
				$this->_blockGroup = "whatpeoplesay";
				$this->_controller = "adminhtml_whatpeoplesay";
				$this->_updateButton("save", "label", Mage::helper("whatpeoplesay")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("whatpeoplesay")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("whatpeoplesay")->__("Save And Continue Edit"),
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
				if( Mage::registry("whatpeoplesay_data") && Mage::registry("whatpeoplesay_data")->getId() ){

				    return Mage::helper("whatpeoplesay")->__("Edit Link '%s'", $this->htmlEscape(Mage::registry("whatpeoplesay_data")->getId()));

				} 
				else{

				     return Mage::helper("whatpeoplesay")->__("Add New Link");

				}
		}
}