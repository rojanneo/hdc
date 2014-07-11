<?php

class HDC_Photogallery_Block_Adminhtml_Photogallery_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("photogalleryGrid");
				$this->setDefaultSort("photo_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("photogallery/photogallery")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("photo_id", array(
				"header" => Mage::helper("photogallery")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "photo_id",
				));
                
				$this->addColumn("photo_caption", array(
				"header" => Mage::helper("photogallery")->__("Caption"),
				"index" => "photo_caption",
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
			$this->setMassactionIdField('photo_id');
			$this->getMassactionBlock()->setFormFieldName('photo_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_photogallery', array(
					 'label'=> Mage::helper('photogallery')->__('Remove Photogallery'),
					 'url'  => $this->getUrl('*/adminhtml_photogallery/massRemove'),
					 'confirm' => Mage::helper('photogallery')->__('Are you sure?')
				));
			return $this;
		}
			

}