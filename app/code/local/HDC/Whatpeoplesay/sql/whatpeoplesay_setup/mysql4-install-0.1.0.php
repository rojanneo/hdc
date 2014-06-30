<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table what_people_say(post_id int not null auto_increment, title varchar(255), type varchar(255), description text, link text, primary key(post_id));
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 