<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table if not exists photogallery(photo_id int not null auto_increment, photo text, photo_caption varchar(255), primary key(photo_id));
		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 