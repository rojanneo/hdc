<?php
class HDC_Forms_Block_Adminhtml_Form_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("forms_form", array("legend"=>Mage::helper("forms")->__("Item information")));

				
						$fieldset->addField("form_name", "text", array(
						"label" => Mage::helper("forms")->__("Title"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "form_name",
						));
									
						$fieldset->addField('form_file', 'file', array(
						'label' => Mage::helper('forms')->__('File'),
						'name' => 'form_file',
						));

				if (Mage::getSingleton("adminhtml/session")->getFormData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getFormData());
					Mage::getSingleton("adminhtml/session")->setFormData(null);
				} 
				elseif(Mage::registry("form_data")) {
				    $form->setValues(Mage::registry("form_data")->getData());
				}
				return parent::_prepareForm();
		}
}
