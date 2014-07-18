<?php
class HDC_Faq_Block_Adminhtml_Faq_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("faq_form", array("legend"=>Mage::helper("faq")->__("Item information")));

				
						$fieldset->addField("faq_question", "editor", array(
						"label" => Mage::helper("faq")->__("Question"),					
						"class" => "required-entry",
						"required" => true,
						'style'     => 'height:15em',
					    'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
					    'wysiwyg'   => true,
						"name" => "faq_question",
						));
					
						$fieldset->addField("faq_answer", "editor", array(
						"label" => Mage::helper("faq")->__("Answer"),					
						"class" => "required-entry",
						"required" => true,
						'style'     => 'height:15em',
					    'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
					    'wysiwyg'   => true,
						"name" => "faq_answer",
						));
					
						$fieldset->addField("faq_keywords", "text", array(
						"label" => Mage::helper("faq")->__("Keywords (Comma Seperated)"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "faq_keywords",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getFaqData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getFaqData());
					Mage::getSingleton("adminhtml/session")->setFaqData(null);
				} 
				elseif(Mage::registry("faq_data")) {
				    $form->setValues(Mage::registry("faq_data")->getData());
				}
				return parent::_prepareForm();
		}
}
