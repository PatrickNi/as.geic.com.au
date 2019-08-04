<?php
define('FRONTEND_PATH', dirname(__FILE__));
set_include_path(get_include_path() . PATH_SEPARATOR . FRONTEND_PATH . '/lib' . PATH_SEPARATOR . FRONTEND_PATH . '/tpl' . PATH_SEPARATOR . FRONTEND_PATH . '/config'. PATH_SEPARATOR . FRONTEND_PATH . '/include');


require_once 'define.php';
include_once FUNC_BASE;
include_once FUNC_BASE_CLIENT;
var_export(get_country());

