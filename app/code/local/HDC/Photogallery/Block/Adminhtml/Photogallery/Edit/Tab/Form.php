<?php
class HDC_Photogallery_Block_Adminhtml_Photogallery_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("photogallery_form", array("legend"=>Mage::helper("photogallery")->__("Item information")));

								
						$fieldset->addField('photo', 'image', array(
						'label' => Mage::helper('photogallery')->__('Photo'),
						'name' => 'photo',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("photo_caption", "text", array(
						"label" => Mage::helper("photogallery")->__("Caption"),
						"name" => "photo_caption",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getPhotogalleryData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getPhotogalleryData());
					Mage::getSingleton("adminhtml/session")->setPhotogalleryData(null);
				} 
				elseif(Mage::registry("photogallery_data")) {
				    $form->setValues(Mage::registry("photogallery_data")->getData());
				}
				return parent::_prepareForm();
		}
}
