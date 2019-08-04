<?php
require_once dirname(__FILE__).'/init.php';


try {
	
	set_cookie(true);
	header('Location: index.php');
	exit;	
}
catch(Exception $e) {
	echo $e->getMessage();
	exit(1);
}


