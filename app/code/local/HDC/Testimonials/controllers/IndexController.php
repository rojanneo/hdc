<?php
class HDC_Testimonials_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Testimonials"));
/*	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("titlename", array(
                "label" => $this->__("Titlename"),
                "title" => $this->__("Titlename")
		   ));
*/
      $this->renderLayout(); 
    }
     
	
	public function formPostAction()
	{
		$formId = 'testimonials';
		$post_data = $this->getRequest()->getPost();
		$captchaText = $post_data['captcha'][$formId];
        $captchaModel = Mage::helper('captcha')->getCaptcha($formId);
        if ($captchaModel->isRequired()) {
            if (!$captchaModel->isCorrect($captchaText)) {
				Mage::getSingleton("core/session")->addError('Incorrect Captcha');
				$this->_redirect("testimonials");
            }
			else
			{
				$post_data['testimonial_date']=now();
		$post_data['testimonial_show'] = 'no';
		try {

						

						$model = Mage::getModel("testimonials/testimonial")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("core/session")->addSuccess(Mage::helper("adminhtml")->__("Testimonial was successfully saved"));
						Mage::getSingleton("core/session")->setTestimonialData(false);

						
						$this->_redirect("testimonials");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("core/session")->addError($e->getMessage());
						Mage::getSingleton("core/session")->setTestimonialData($this->getRequest()->getPost());
						$this->_redirect("testimonials");
						//$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}
			
			}
			}
		//var_dump($post_data);die;
		

				
	}
}