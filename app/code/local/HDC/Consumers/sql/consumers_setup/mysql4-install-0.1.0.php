<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table consumers(consumer_id int not null auto_increment, consumer_name varchar(255), consumer_address text, consumer_apt_ste varchar(255), consumer_email text, consumer_state varchar(255), consumer_zip varchar(255), consumer_phone varchar(255), consumer_fax varchar(255), primary key(consumer_id));

SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 