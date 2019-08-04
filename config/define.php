<?php
//function
define('FUNC_DB_SOURCE', 'db.mysql.php');
define('FUNC_BASE', 'base.php');
define('FUNC_BASE_CLIENT', 'base_client.php');
define('FUNC_RECAPTCHA', 'recaptchalib.php');

//class
define('CLASS_TEMPLATE', 'template.class.php');

//configuration
define('DEFINE_DB_WWW', 'define_www.php');
define('DEFINE_DB_DEV', 'define_dev.php');

//cookie
define('COOKIE_USER', '_uid');
define('COOKIE_EXPIRED', 3600*24);

//smarty path
define('SMARTY_TPL_PATH', FRONTEND_PATH.'/tpl');
define('SMARTY_CPL_PATH', FRONTEND_PATH.'/tpl/complier');
define('SMARTY_CFG_PATH', FRONTEND_PATH.'/tpl/config');
define('SMARTY_CAH_PATH', FRONTEND_PATH.'/tpl/cache');


//API
define('AS_API', 'http://60.229.252.229:8080/dataapi/');
define('AS_ACTION_REG', 'reg.php');
define('AS_ACTION_WXP', 'exp.php');
define('AS_ACTION_EDU', 'edu.php');
define('AS_ACTION_IELTS', 'ielts.php');
define('AS_ACTION_SETTING', 'setting.php');


//Google Recaptcha KEY
define('GOOGLE_RECAPTCHA_PUB', '6Ld9ce8SAAAAAIAR3cRlEMbhjCI22k9S9FdG7dzf');
define('GOOGLE_RECAPTCHA_PRI', '6Ld9ce8SAAAAAPjfZpyK29FMrM1ZnZEPkoyZxnTz');


//GLOBAL Var
$URI_BACK = array(1=>'client/confirm.php', 2=>'index.php');
$client_type_arr = array('留学(Study)'=>'study','移民(Visa)'=>'immi');
$client_type_arr['贷款(Home Loan)'] = 'homeloan';
$client_type_arr['法律(Legal)'] = 'legal';
