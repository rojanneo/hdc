<?php

class HDC_Whatpeoplesay_Block_Adminhtml_Whatpeoplesay_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("whatpeoplesayGrid");
				$this->setDefaultSort("post_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("whatpeoplesay/whatpeoplesay")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("post_id", array(
				"header" => Mage::helper("whatpeoplesay")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "post_id",
				));
                
				$this->addColumn("title", array(
				"header" => Mage::helper("whatpeoplesay")->__("Title"),
				"index" => "title",
				));
						$this->addColumn('type', array(
						'header' => Mage::helper('whatpeoplesay')->__('Type'),
						'index' => 'type',
						'type' => 'options',
						'options'=>HDC_Whatpeoplesay_Block_Adminhtml_Whatpeoplesay_Grid::getOptionArray1(),				
						));
						
				$this->addColumn("link", array(
				"header" => Mage::helper("whatpeoplesay")->__("Url"),
				"index" => "link",
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
			$this->setMassactionIdField('post_id');
			$this->getMassactionBlock()->setFormFieldName('post_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_whatpeoplesay', array(
					 'label'=> Mage::helper('whatpeoplesay')->__('Remove Whatpeoplesay'),
					 'url'  => $this->getUrl('*/adminhtml_whatpeoplesay/massRemove'),
					 'confirm' => Mage::helper('whatpeoplesay')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray1()
		{
           $data_array=array(); 
			$data_array['blogs']='Blogs';
			$data_array['online discussions']='Online Discussions';
			$data_array['videos']='Videos';
            return($data_array);
		}
		static public function getValueArray1()
		{
            $data_array=array();
			foreach(HDC_Whatpeoplesay_Block_Adminhtml_Whatpeoplesay_Grid::getOptionArray1() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}