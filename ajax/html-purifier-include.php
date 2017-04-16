<?php 
	
	require './HTMLpurifier/library/HTMLPurifier.includes.php';
	require './HTMLpurifier/library/HTMLPurifier.autoload.php';

	$config = HTMLPurifier_Config::createDefault();
	$purifier = new HTMLPurifier($config);

?>