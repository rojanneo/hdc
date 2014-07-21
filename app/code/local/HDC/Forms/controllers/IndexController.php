<?php
class HDC_Forms_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Titlename"));
	       
      $this->renderLayout(); 
	  
    }
	
	public function downloadAction()
	{

		$filename = $this->getRequest()->getParam('filename');
        
        $file = Mage::getBaseDir('media').DS.'forms'.DS.'form'.DS.$filename;
        $content =  array(
            'type'  => 'filename',
            'value' => $file,
            'rm'    => false // can delete file after use
        );
        
        $this->_prepareDownloadResponse($filename, $content);
	}
}