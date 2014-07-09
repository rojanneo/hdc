<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table events(event_id int not null auto_increment, event_name varchar(255),
event_address text, event_start_date date, event_end_date date, event_link text, primary key(event_id));		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 