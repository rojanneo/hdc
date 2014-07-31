<?php
class HDC_Consumers_Block_Adminhtml_Consumer_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("consumers_form", array("legend"=>Mage::helper("consumers")->__("Item information")));

				
						$fieldset->addField("consumer_name", "text", array(
						"label" => Mage::helper("consumers")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "consumer_name",
						"readonly"=>true,
						));
					
						$fieldset->addField("consumer_email", "text", array(
						"label" => Mage::helper("consumers")->__("Email"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "consumer_email",
						"readonly"=>true,
						));
					
						$fieldset->addField("consumer_address", "text", array(
						"label" => Mage::helper("consumers")->__("Address"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "consumer_address",
						"readonly"=>true,
						));

						$fieldset->addField("consumer_apt_ste", "text", array(
						"label" => Mage::helper("consumers")->__("Apt/Ste"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "consumer_apt_ste",
						"readonly"=>true,
						));
					
						$fieldset->addField("consumer_state", "text", array(
						"label" => Mage::helper("consumers")->__("State"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "consumer_state",
						"readonly"=>true,
						));
					
						$fieldset->addField("consumer_zip", "text", array(
						"label" => Mage::helper("consumers")->__("Zip"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "consumer_zip",
						"readonly"=>true,
						));
					
						$fieldset->addField("consumer_phone", "text", array(
						"label" => Mage::helper("consumers")->__("Phone"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "consumer_phone",
						"readonly"=>true,
						));
					
						$fieldset->addField("consumer_fax", "text", array(
						"label" => Mage::helper("consumers")->__("Fax"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "consumer_fax",
						"readonly"=>true,
						));
					
						
					

				if (Mage::getSingleton("adminhtml/session")->getConsumerData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getConsumerData());
					Mage::getSingleton("adminhtml/session")->setConsumerData(null);
				} 
				elseif(Mage::registry("consumer_data")) {
				    $form->setValues(Mage::registry("consumer_data")->getData());
				}
				return parent::_prepareForm();
		}
}
