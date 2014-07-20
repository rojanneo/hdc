<?php

class HDC_Forms_Block_Adminhtml_Form_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("formGrid");
				$this->setDefaultSort("form_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("forms/form")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("form_id", array(
				"header" => Mage::helper("forms")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "form_id",
				));
                
				$this->addColumn("form_name", array(
				"header" => Mage::helper("forms")->__("Title"),
				"index" => "form_name",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('form_id');
			$this->getMassactionBlock()->setFormFieldName('form_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_form', array(
					 'label'=> Mage::helper('forms')->__('Remove Form'),
					 'url'  => $this->getUrl('*/adminhtml_form/massRemove'),
					 'confirm' => Mage::helper('forms')->__('Are you sure?')
				));
			return $this;
		}
			

}