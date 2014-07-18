<?php
class HDC_Faq_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
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

    public function faqDetailAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function ajaxSearchAction()
    {
        $question = $this->getRequest()->getParam('question');
        $keywords = explode(' ',$question);
        $faq_ids = array();
        $faqModel = Mage::getModel('faq/faq')->getCollection();
        foreach ($keywords as $keyword)
        {
             $faqModel = Mage::getModel('faq/faq')->getCollection();
            $faqModel->addFieldToFilter('faq_keywords',array('like'=>'%'.$keyword.'%'));
            foreach($faqModel as $faq)
            {
                array_push($faq_ids, $faq->getFaqId());
                $faq_ids = array_unique($faq_ids);
            }

        }

        if(count($faq_ids) > 0)
        {

        $model = Mage::getModel('faq/faq')->getCollection()->addFieldToFilter('faq_id',array('in'=>$faq_ids));
        $li_array = array();
        $data_array = array();
        foreach($model as $faq)
        {
            $data_array['id'] = $faq->getFaqId();
            $data_array['question'] = $faq->getFaqQuestion();

            array_push($li_array,$data_array);
        }
        echo(json_encode($li_array));
        }
        else
        {
            echo '<p>No results found</p>';
        }
    }
}