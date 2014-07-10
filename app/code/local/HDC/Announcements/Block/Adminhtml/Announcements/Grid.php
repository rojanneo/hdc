<?php

class HDC_Announcements_Block_Adminhtml_Announcements_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("announcementsGrid");
				$this->setDefaultSort("announcement_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("announcements/announcements")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("announcement_id", array(
				"header" => Mage::helper("announcements")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "announcement_id",
				));
                
				$this->addColumn("announcement_title", array(
				"header" => Mage::helper("announcements")->__("Title"),
				"index" => "announcement_title",
				));
				$this->addColumn("announcement_text", array(
				"header" => Mage::helper("announcements")->__("Announcement"),
				"index" => "announcement_text",
				));
				$this->addColumn("enabled", array(
				"header" => Mage::helper("announcements")->__("Shown In Frontend"),
				"index" => "enabled",
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
			$this->setMassactionIdField('announcement_id');
			$this->getMassactionBlock()->setFormFieldName('announcement_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_announcements', array(
					 'label'=> Mage::helper('announcements')->__('Remove Announcements'),
					 'url'  => $this->getUrl('*/adminhtml_announcements/massRemove'),
					 'confirm' => Mage::helper('announcements')->__('Are you sure?')
				));
			return $this;
		}
		
		static public function getOptionArray1()
		{
           $data_array=array(); 
			$data_array['0']='No';
			$data_array['1']='Yes';
            return($data_array);
		}
		static public function getValueArray1()
		{
            $data_array=array();
			foreach(HDC_Announcements_Block_Adminhtml_Announcements_Grid::getOptionArray1() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}	

}