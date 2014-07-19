<?php

class HDC_Testimonials_Block_Adminhtml_Testimonial_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("testimonialGrid");
				$this->setDefaultSort("testimonial_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("testimonials/testimonial")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("testimonial_id", array(
				"header" => Mage::helper("testimonials")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "testimonial_id",
				));
                
				$this->addColumn("testimonial_name", array(
				"header" => Mage::helper("testimonials")->__("Name"),
				"index" => "testimonial_name",
				));
				$this->addColumn("testimonial_address", array(
				"header" => Mage::helper("testimonials")->__("Address"),
				"index" => "testimonial_address",
				));
				$this->addColumn("testimonial_email", array(
				"header" => Mage::helper("testimonials")->__("Email"),
				"index" => "testimonial_email",
				));
						$this->addColumn('testimonial_show', array(
						'header' => Mage::helper('testimonials')->__('Show in frontend'),
						'index' => 'testimonial_show',
						'type' => 'options',
						'options'=>HDC_Testimonials_Block_Adminhtml_Testimonial_Grid::getOptionArray4(),				
						));
						
					$this->addColumn('testimonial_date', array(
						'header'    => Mage::helper('testimonials')->__('Date'),
						'index'     => 'testimonial_date',
						'type'      => 'date',
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
			$this->setMassactionIdField('testimonial_id');
			$this->getMassactionBlock()->setFormFieldName('testimonial_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_testimonial', array(
					 'label'=> Mage::helper('testimonials')->__('Remove Testimonial'),
					 'url'  => $this->getUrl('*/adminhtml_testimonial/massRemove'),
					 'confirm' => Mage::helper('testimonials')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray4()
		{
            $data_array=array(); 
			$data_array['yes']='Yes';
			$data_array['no']='No';
            return($data_array);
		}
		static public function getValueArray4()
		{
            $data_array=array();
			foreach(HDC_Testimonials_Block_Adminhtml_Testimonial_Grid::getOptionArray4() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}