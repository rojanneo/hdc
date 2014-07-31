<?php

class HDC_Consumers_Block_Adminhtml_Consumer_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("consumerGrid");
				$this->setDefaultSort("consumer_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("consumers/consumer")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("consumer_id", array(
				"header" => Mage::helper("consumers")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "consumer_id",
				));
                
				$this->addColumn("consumer_name", array(
				"header" => Mage::helper("consumers")->__("Name"),
				"index" => "consumer_name",
				));
				$this->addColumn("consumer_email", array(
				"header" => Mage::helper("consumers")->__("Email"),
				"index" => "consumer_email",
				));
				$this->addColumn("consumer_address", array(
				"header" => Mage::helper("consumers")->__("Address"),
				"index" => "consumer_address",
				));
				$this->addColumn("consumer_apt_ste", array(
				"header" => Mage::helper("consumers")->__("Apt/Ste"),
				"index" => "consumer_apt_ste",
				));
				$this->addColumn("consumer_state", array(
				"header" => Mage::helper("consumers")->__("State"),
				"index" => "consumer_state",
				));
				$this->addColumn("consumer_zip", array(
				"header" => Mage::helper("consumers")->__("Zip"),
				"index" => "consumer_zip",
				));
				$this->addColumn("consumer_phone", array(
				"header" => Mage::helper("consumers")->__("Phone"),
				"index" => "consumer_phone",
				));
				$this->addColumn("consumer_fax", array(
				"header" => Mage::helper("consumers")->__("Fax"),
				"index" => "consumer_fax",
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
			$this->setMassactionIdField('consumer_id');
			$this->getMassactionBlock()->setFormFieldName('consumer_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_consumer', array(
					 'label'=> Mage::helper('consumers')->__('Remove Consumer'),
					 'url'  => $this->getUrl('*/adminhtml_consumer/massRemove'),
					 'confirm' => Mage::helper('consumers')->__('Are you sure?')
				));
			return $this;
		}
			

}