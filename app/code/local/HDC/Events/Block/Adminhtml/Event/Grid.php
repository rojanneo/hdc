<?php

class HDC_Events_Block_Adminhtml_Event_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("eventGrid");
				$this->setDefaultSort("event_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("events/event")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("event_id", array(
				"header" => Mage::helper("events")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "event_id",
				));
                
				$this->addColumn("event_name", array(
				"header" => Mage::helper("events")->__("Event Name"),
				"index" => "event_name",
				));
				$this->addColumn("event_address", array(
				"header" => Mage::helper("events")->__("Address"),
				"index" => "event_address",
				));
					$this->addColumn('event_start_date', array(
						'header'    => Mage::helper('events')->__('Start Date'),
						'index'     => 'event_start_date',
						'type'      => 'date',
					));
					$this->addColumn('event_end_date', array(
						'header'    => Mage::helper('events')->__('End Date'),
						'index'     => 'event_end_date',
						'type'      => 'date',
					));
				$this->addColumn("event_link", array(
				"header" => Mage::helper("events")->__("Url"),
				"index" => "event_link",
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
			$this->setMassactionIdField('event_id');
			$this->getMassactionBlock()->setFormFieldName('event_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_event', array(
					 'label'=> Mage::helper('events')->__('Remove Event'),
					 'url'  => $this->getUrl('*/adminhtml_event/massRemove'),
					 'confirm' => Mage::helper('events')->__('Are you sure?')
				));
			return $this;
		}
			

}