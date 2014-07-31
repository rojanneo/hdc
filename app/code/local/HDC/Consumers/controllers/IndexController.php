<?php
class HDC_Consumers_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {

    }

    public function createPostAction()
    {
		$formId = 'consumers';
		$post_data = $this->getRequest()->getPost();
		$captchaText = $post_data['captcha'][$formId];
        $captchaModel = Mage::helper('captcha')->getCaptcha($formId);
        if ($captchaModel->isRequired()) {
            if (!$captchaModel->isCorrect($captchaText)) {
				Mage::getSingleton("core/session")->addError('Incorrect Captcha');
				$this->_redirect("customer/account/create");
            }
			else
			{    	if ($post_data) {

					try {
						$model = Mage::getModel("consumers/consumer")
						->setData($post_data)
						->save();

						Mage::getSingleton("core/session")->addSuccess(Mage::helper("adminhtml")->__("Consumer was successfully saved"));
						Mage::getSingleton("core/session")->setConsumerData(false);
						$this->_redirect("customer/account/create");
					} 
					catch (Exception $e) {
						Mage::getSingleton("core/session")->addError($e->getMessage());
						Mage::getSingleton("core/session")->setConsumerData($this->getRequest()->getPost());
						$this->_redirect("customer/account/create");
					return;
					}

				}
			}
		}
    }
      
}