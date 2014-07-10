<?php

class HDC_Announcements_Adminhtml_AnnouncementsController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("announcements/announcements")->_addBreadcrumb(Mage::helper("adminhtml")->__("Announcements  Manager"),Mage::helper("adminhtml")->__("Announcements Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Announcements"));
			    $this->_title($this->__("Manager Announcements"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Announcements"));
				$this->_title($this->__("Announcements"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("announcements/announcements")->load($id);
				if ($model->getId()) {
					Mage::register("announcements_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("announcements/announcements");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Announcements Manager"), Mage::helper("adminhtml")->__("Announcements Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Announcements Description"), Mage::helper("adminhtml")->__("Announcements Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("announcements/adminhtml_announcements_edit"))->_addLeft($this->getLayout()->createBlock("announcements/adminhtml_announcements_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("announcements")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Announcements"));
		$this->_title($this->__("Announcements"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("announcements/announcements")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("announcements_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("announcements/announcements");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Announcements Manager"), Mage::helper("adminhtml")->__("Announcements Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Announcements Description"), Mage::helper("adminhtml")->__("Announcements Description"));


		$this->_addContent($this->getLayout()->createBlock("announcements/adminhtml_announcements_edit"))->_addLeft($this->getLayout()->createBlock("announcements/adminhtml_announcements_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					if($post_data['enabled'] == 1)
					{
						$collection = Mage::getModel('announcements/announcements')->getCollection();
						echo '<pre>';
						foreach($collection as $announcement)
						{
							$data = array();
							$data['enabled'] = 0;
							$announcement->addData($data);
							$announcement->save();
						}
					}

					try {

						

						$model = Mage::getModel("announcements/announcements")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Announcements was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setAnnouncementsData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setAnnouncementsData($this->getRequest()->getPost());
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
						$model = Mage::getModel("announcements/announcements");
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
				$ids = $this->getRequest()->getPost('announcement_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("announcements/announcements");
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
			$fileName   = 'announcements.csv';
			$grid       = $this->getLayout()->createBlock('announcements/adminhtml_announcements_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'announcements.xml';
			$grid       = $this->getLayout()->createBlock('announcements/adminhtml_announcements_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
