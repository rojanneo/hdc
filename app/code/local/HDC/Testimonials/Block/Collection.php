<?php   
class HDC_Testimonials_Block_Collection extends Mage_Core_Block_Template{   

public function __construct()
    {
        parent::__construct();
		$validationRequired = Mage::getStoreConfig('testimonial/general/validate');     
		if($validationRequired)
        $collection = Mage::getModel('testimonials/testimonial')->getCollection()->addFieldToFilter('testimonial_show','yes');
		else
		$collection = Mage::getModel('testimonials/testimonial')->getCollection();
		//var_dump($collection);
        $this->setCollection($collection);
    }
 
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
 
        $pager = $this->getLayout()->createBlock('page/html_pager', 'testimonials.pager');
        $pager->setAvailableLimit(array(5=>5,10=>10,20=>20,'all'=>'all'));
        $pager->setCollection($this->getCollection());
		$pager->setShowAmounts(false);
		$pager->setShowPerPage(false);
		$pager->setTemplate('testimonials/pager.phtml');
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }
 
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

}