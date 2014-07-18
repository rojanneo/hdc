<?php
class HDC_Customer_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      if(!Mage::getSingleton('customer/session')->isLoggedIn())
	  {
		//Mage::getSingleton('core/session')->addError('You need to be logged in to view this page');
		$this->_redirect('');
	  }
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Titlename"));
	    //     $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
     //  $breadcrumbs->addCrumb("home", array(
     //            "label" => $this->__("Home Page"),
     //            "title" => $this->__("Home Page"),
     //            "link"  => Mage::getBaseUrl()
		   // ));

     //  $breadcrumbs->addCrumb("titlename", array(
     //            "label" => $this->__("Titlename"),
     //            "title" => $this->__("Titlename")
		   // ));

      $this->renderLayout(); 
	  
    }

    public function pricingAction()
    {
	  if(!Mage::getSingleton('customer/session')->isLoggedIn())
	  {
		//Mage::getSingleton('core/session')->addError('You need to be logged in to view this page');
		$this->_redirect('');
	  }
      $this->loadLayout();
      $this->renderLayout();
    }
}