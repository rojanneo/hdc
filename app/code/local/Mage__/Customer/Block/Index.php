<?php   
class Mage_Customer_Block_Index extends Mage_Catalog_Block_Product_List {
    protected $_productCollection;

protected function _getProductCollection() {
    if (is_null($this->_productCollection)) {
        $collection = Mage::getModel('catalog/product')
            ->getCollection('*')
            ->addAttributeToSelect('*');
        Mage::getModel('catalog/layer')->prepareProductCollection($collection);
        $this->_productCollection = $collection;
    }
    return parent::_getProductCollection();
}


}