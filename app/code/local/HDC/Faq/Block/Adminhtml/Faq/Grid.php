<?php

class HDC_Faq_Block_Adminhtml_Faq_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("faqGrid");
				$this->setDefaultSort("faq_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("faq/faq")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("faq_id", array(
				"header" => Mage::helper("faq")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "faq_id",
				));
                
				$this->addColumn("faq_question", array(
				"header" => Mage::helper("faq")->__("Question"),
				"index" => "faq_question",
				));
				$this->addColumn("faq_answer", array(
				"header" => Mage::helper("faq")->__("Answer"),
				"index" => "faq_answer",
				));
				$this->addColumn("faq_keywords", array(
				"header" => Mage::helper("faq")->__("Keywords (Comma Seperated)"),
				"index" => "faq_keywords",
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
			$this->setMassactionIdField('faq_id');
			$this->getMassactionBlock()->setFormFieldName('faq_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_faq', array(
					 'label'=> Mage::helper('faq')->__('Remove Faq'),
					 'url'  => $this->getUrl('*/adminhtml_faq/massRemove'),
					 'confirm' => Mage::helper('faq')->__('Are you sure?')
				));
			return $this;
		}
			

}