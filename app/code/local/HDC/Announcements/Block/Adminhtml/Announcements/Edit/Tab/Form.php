<?php
class HDC_Announcements_Block_Adminhtml_Announcements_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("announcements_form", array("legend"=>Mage::helper("announcements")->__("Item information")));

				
						$fieldset->addField("announcement_title", "text", array(
						"label" => Mage::helper("announcements")->__("Title"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "announcement_title",
						));
					
						$fieldset->addField("announcement_text", "editor", array(
						"label" => Mage::helper("announcements")->__("Announcement"),					
						"class" => "required-entry",
						"required" => true,
						'style'     => 'height:15em',
					    'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
					    'wysiwyg'   => true,
						"name" => "announcement_text",
						));
						 $fieldset->addField('enabled', 'select', array(
						'label'     => Mage::helper('whatpeoplesay')->__('Show In Frontend'),
						'values'   => HDC_Announcements_Block_Adminhtml_Announcements_Grid::getValueArray1(),
						'name' => 'enabled',					
						"class" => "required-entry",
						"required" => true,
						));
					

				if (Mage::getSingleton("adminhtml/session")->getAnnouncementsData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getAnnouncementsData());
					Mage::getSingleton("adminhtml/session")->setAnnouncementsData(null);
				} 
				elseif(Mage::registry("announcements_data")) {
				    $form->setValues(Mage::registry("announcements_data")->getData());
				}
				return parent::_prepareForm();
		}
}
