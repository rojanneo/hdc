<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table testimonials(testimonial_id int not null auto_increment, testimonial_name text, testimonial_address text, 
testimonial_email text, testimonial_comment longtext, testimonial_show varchar(100), testimonial_date date,
primary key(testimonial_id));
		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 