<?php
class HDC_Testimonials_Block_Adminhtml_Testimonial_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("testimonials_form", array("legend"=>Mage::helper("testimonials")->__("Item information")));

				
						$fieldset->addField("testimonial_name", "text", array(
						"label" => Mage::helper("testimonials")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimonial_name",
						"readonly"=>true,
						));
					
						$fieldset->addField("testimonial_address", "text", array(
						"label" => Mage::helper("testimonials")->__("Address"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimonial_address",
						"readonly"=>true,						
						));
					
						$fieldset->addField("testimonial_email", "text", array(
						"label" => Mage::helper("testimonials")->__("Email"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimonial_email",
						"readonly"=>true,
						));
					
						$fieldset->addField("testimonial_comment", "textarea", array(
						"label" => Mage::helper("testimonials")->__("Comment"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimonial_comment",
						"readonly"=>true,
						));
									
						 $fieldset->addField('testimonial_show', 'select', array(
						'label'     => Mage::helper('testimonials')->__('Show in frontend'),
						'values'   => HDC_Testimonials_Block_Adminhtml_Testimonial_Grid::getValueArray4(),
						'name' => 'testimonial_show',					
						"class" => "required-entry",
						"required" => true,
						));
						$dateFormatIso = Mage::app()->getLocale()->getDateFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('testimonial_date', 'date', array(
						'label'        => Mage::helper('testimonials')->__('Date'),
						'name'         => 'testimonial_date',					
						"class" => "required-entry",
						"required" => true,
						'time' => false,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso,
						"readonly"=>true,
						));

				if (Mage::getSingleton("adminhtml/session")->getTestimonialData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getTestimonialData());
					Mage::getSingleton("adminhtml/session")->setTestimonialData(null);
				} 
				elseif(Mage::registry("testimonial_data")) {
				    $form->setValues(Mage::registry("testimonial_data")->getData());
				}
				return parent::_prepareForm();
		}
}
