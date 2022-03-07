<?php
require_once dirname(__FILE__).'/../init.php';
include_once CLASS_TEMPLATE;
include_once FUNC_BASE_CLIENT;

try {
    
    //user login
    $tpl = new Template;  
    $tpl->assign('pagetype', 'contactus');
    $tpl->assign('code', $_REQUEST['code']);
    $tpl->display('us.tpl');
}
catch(Exception $e) {
    echo $e->getMessage();
    exit(1);
}


