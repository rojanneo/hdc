<?php

class HDC_Forms_Adminhtml_FormController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("forms/form")->_addBreadcrumb(Mage::helper("adminhtml")->__("Form  Manager"),Mage::helper("adminhtml")->__("Form Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Forms"));
			    $this->_title($this->__("Manager Form"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Forms"));
				$this->_title($this->__("Form"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("forms/form")->load($id);
				if ($model->getId()) {
					Mage::register("form_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("forms/form");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Form Manager"), Mage::helper("adminhtml")->__("Form Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Form Description"), Mage::helper("adminhtml")->__("Form Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("forms/adminhtml_form_edit"))->_addLeft($this->getLayout()->createBlock("forms/adminhtml_form_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("forms")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Forms"));
		$this->_title($this->__("Form"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("forms/form")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("form_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("forms/form");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Form Manager"), Mage::helper("adminhtml")->__("Form Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Form Description"), Mage::helper("adminhtml")->__("Form Description"));


		$this->_addContent($this->getLayout()->createBlock("forms/adminhtml_form_edit"))->_addLeft($this->getLayout()->createBlock("forms/adminhtml_form_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{
			$post_data=$this->getRequest()->getPost();

				if ($post_data) {

					try {

						
				 //save image
		try{

{

	//unset($post_data['form_file']);

	if (isset($_FILES)){

		if ($_FILES['form_file']['name']) {

			if($this->getRequest()->getParam("id")){
				$model = Mage::getModel("forms/form")->load($this->getRequest()->getParam("id"));
				if($model->getData('form_file')){
						$io = new Varien_Io_File();
						$io->rm(Mage::getBaseDir('media').DS.implode(DS,explode('/',$model->getData('form_file'))));	
				}
			}
						$path = Mage::getBaseDir('media') . DS . 'forms' . DS .'form'.DS;
						$uploader = new Varien_File_Uploader('form_file');
						$uploader->setAllowedExtensions(array('pdf','doc'));
						$uploader->setAllowRenameFiles(true);
						$uploader->setFilesDispersion(false);
						$destFile = $path.$_FILES['form_file']['name'];
						$filename = $uploader->save($path);
						//var_dump($filename);die;

						$post_data['form_file']='forms/form/'.$filename['file'];
		}
    }
}

        } catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
        }
//save image


						$model = Mage::getModel("forms/form")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Form was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setFormData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setFormData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("forms/form");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('form_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("forms/form");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'form.csv';
			$grid       = $this->getLayout()->createBlock('forms/adminhtml_form_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'form.xml';
			$grid       = $this->getLayout()->createBlock('forms/adminhtml_form_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
