<?php

define('FRONTEND_PATH', dirname(__FILE__));
set_include_path(get_include_path() . PATH_SEPARATOR . FRONTEND_PATH . '/lib' . PATH_SEPARATOR . FRONTEND_PATH . '/tpl' . PATH_SEPARATOR . FRONTEND_PATH . '/config'. PATH_SEPARATOR . FRONTEND_PATH . '/include');


require_once 'define.php';
require_once 'Smarty/Smarty.class.php';
require_once FUNC_DB_SOURCE;
require_once FUNC_BASE;

try {

    //check host ->include db config
    switch ($_SERVER['HTTP_HOST']) {
		case 'as.geic.com.au':
		case 'www.as.geic.com.au':
			include_once DEFINE_DB_WWW;
        default:                
            include_once DEFINE_DB_DEV;
            break;    
    }
/*
    //db connect
    $CONN = open_connect();
    if (!$CONN)
        throw new Exception("Connect DB error");
 */
	//get user
	$T_USER  = get_user();
	$T_EMAIL = get_email();
	$T_STEPS = get_steps($T_USER);
	if (isset($_REQUEST['ref']) && $_REQUEST['ref'] > 0) {
		setcookie('_ref', $_REQUEST['ref'], 0, '/');
	}
} 
catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}

