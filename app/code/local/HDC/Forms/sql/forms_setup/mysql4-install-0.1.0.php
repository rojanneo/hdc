<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table forms(form_id int not null auto_increment, form_name text, form_file text, primary key(form_id));
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 