<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table faq(faq_id int not null auto_increment, faq_question text, faq_answer text, faq_keywords text, primary key(faq_id));		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 