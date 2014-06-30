<?php
class HDC_Whatpeoplesay_Block_Adminhtml_Whatpeoplesay_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("whatpeoplesay_form", array("legend"=>Mage::helper("whatpeoplesay")->__("Link information")));

				
						$fieldset->addField("title", "text", array(
						"label" => Mage::helper("whatpeoplesay")->__("Title"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "title",
						));
									
						 $fieldset->addField('type', 'select', array(
						'label'     => Mage::helper('whatpeoplesay')->__('Type'),
						'values'   => HDC_Whatpeoplesay_Block_Adminhtml_Whatpeoplesay_Grid::getValueArray1(),
						'name' => 'type',					
						"class" => "required-entry",
						"required" => true,
						));
						$fieldset->addField("description", "textarea", array(
						"label" => Mage::helper("whatpeoplesay")->__("Description"),
						"name" => "description",
						));
					
						$fieldset->addField("link", "text", array(
						"label" => Mage::helper("whatpeoplesay")->__("Url"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "link",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getWhatpeoplesayData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getWhatpeoplesayData());
					Mage::getSingleton("adminhtml/session")->setWhatpeoplesayData(null);
				} 
				elseif(Mage::registry("whatpeoplesay_data")) {
				    $form->setValues(Mage::registry("whatpeoplesay_data")->getData());
				}
				return parent::_prepareForm();
		}
}
