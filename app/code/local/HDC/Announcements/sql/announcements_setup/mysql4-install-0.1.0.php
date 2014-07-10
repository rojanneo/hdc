<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table announcements(announcement_id int not null auto_increment, announcement_title varchar(255), announcement_text longtext, primary key(announcement_id ));		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 