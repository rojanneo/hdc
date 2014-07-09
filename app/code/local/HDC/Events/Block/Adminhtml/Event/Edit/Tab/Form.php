<?php
class HDC_Events_Block_Adminhtml_Event_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("events_form", array("legend"=>Mage::helper("events")->__("Item information")));

				
						$fieldset->addField("event_name", "text", array(
						"label" => Mage::helper("events")->__("Event Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "event_name",
						));
					
						$fieldset->addField("event_address", "text", array(
						"label" => Mage::helper("events")->__("Address"),					
						"name" => "event_address",
						));
					
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('event_start_date', 'date', array(
						'label'        => Mage::helper('events')->__('Start Date'),
						'name'         => 'event_start_date',					
						"class" => "required-entry",
						"required" => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('event_end_date', 'date', array(
						'label'        => Mage::helper('events')->__('End Date'),
						'name'         => 'event_end_date',
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));
						$fieldset->addField("event_link", "text", array(
						"label" => Mage::helper("events")->__("Url"),					
						
						"name" => "event_link",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getEventData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getEventData());
					Mage::getSingleton("adminhtml/session")->setEventData(null);
				} 
				elseif(Mage::registry("event_data")) {
				    $form->setValues(Mage::registry("event_data")->getData());
				}
				return parent::_prepareForm();
		}
}
